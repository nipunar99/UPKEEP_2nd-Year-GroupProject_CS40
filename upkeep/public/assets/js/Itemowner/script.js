const input = document.querySelector('.prompt')
const button = document.querySelector('.send')
const textarea = document.querySelector('.textArea')

var communicator = ''
button.onclick = () => {
    var prompt = input.value
    if(prompt != ''){
    console.log(prompt);

        bottomScroll();
        (textarea.innerHTML == '') ? communicator = 'You: ' : communicator = '\n\nYou: '
        textarea.innerHTML += communicator + prompt
        // use SSE to get server Events
        var source = new SSE(""+ROOT+"/Itemowner/request?prompt=" + prompt);
        input.value = ''
        input.focus()
        source.addEventListener('message', function (e) {
            if(e.data){
                if(e.data != '[DONE]'){
                    var tokens = JSON.parse(e.data).choices[0].text
                    textarea.innerHTML += tokens
                    // bottomScroll();
                }else{
                    console.log('Completed');
                }
            }
        })
        source.stream()
    }
}

function bottomScroll(){
    textarea.scrollIntoView(false)
    textarea.scrollTo(0, textarea.scrollHeight)
}