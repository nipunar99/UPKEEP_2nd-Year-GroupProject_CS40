var currentprompt = "";
// const input = document.querySelector('.prompt')
const disposeSteps = document.querySelector('#disposeSteps');
const reuseSteps = document.querySelector('#reuseSteps');
const textarea = document.querySelector('.textArea');

disposeSteps.onclick = () => {
    textarea.innerHTML += "<div class='reqestPrompt'><p>"+disposeSteps.innerHTML+"</p> </div>";

    generateAnswer(""+disposeSteps.innerHTML+". give me answer in more detail",1);
}

reuseSteps.onclick = () => {
    textarea.innerHTML += "<div class='reqestPrompt'><p>"+reuseSteps.innerHTML+"</p> </div>";

    generateAnswer(""+disposeSteps.innerHTML+". give me answer in more detail",2);
}

function generateAnswer(prompt,num) {
    // var prompt = input.value
    textarea.innerHTML += "<div class='responsePromot'><p class='reqestPrompt"+num+"'></p</div>"
    const reqestPrompt = document.querySelector(".reqestPrompt"+num+"");
    bottomScroll();

    if(prompt != ''){
    console.log(prompt);

        var source = new SSE(""+ROOT+"/Itemowner/request?prompt=" + prompt);

        source.addEventListener('message', function (e) {
            if(e.data){
                if(e.data != '[DONE]'){
                    var tokens = JSON.parse(e.data).choices[0].text
                    reqestPrompt.innerHTML += tokens
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