// Get all DOM and store in variable
const deleteMsg = document.querySelector(".deleteMsg");
const overlay = document.querySelector(".overlayview");
// const btnCloseModal = document.querySelector(".closebtn");
const btnCloseModal1 = document.querySelector(".closebtn1");
const deleteConfirmation = document.querySelector(".deletebtn");
const confirmation = document.querySelector("confirmbtn");


// Show Modal function const showModal
const deleteMsgFunc = function () {
    console.log("button clicked");
    deleteMsg.classList.remove("hidden");
    overlay.classList.remove("hidden");
}; 

// Close Modal function
const closeModal = function () {
    console.log("button clicked");
    deleteMsg.classList.add("hidden");
    overlay.classList.add("hidden");
    // removeEvent();
};


// show modal click event
deleteConfirmation.addEventListener("click", deleteMsgFunc);




// close modal click
// btnCloseModal.addEventListener("click", closeModal);
btnCloseModal1.addEventListener("click", closeModal);

overlay.addEventListener("click", closeModal);

confirmation.addEventListener("click", closeModal);

function ajax_call(e){
    e.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById("email").value;

    const form = new FormData();
    form.append("name",name);
    form.append("email",email);
    
    // 1 initialize XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    console.log(xhr.readyState);

    // console.log(xhr);
    
    
    
    // 2 establish connection
    xhr.open('POST','http://localhost/Ajex/post.php');
    xhr.setRequestHeader("Content-Type","application/json");


    // 3 callback function

    /*out of fashion because this method call every state changes
    
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            console.log('Success');
        }
        else if(xhr.readyState == 4 && xhr.status == 403){
            console.log('Login first');
        }
        else if(xhr.readyState == 4 && xhr.status == 404){
            console.log('Page not found');
        }
    }

    onload method is called when state is 4
    onprogress method is called when state is 3*/

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            const json = JSON.parse(res);
            console.log(json);
        }
    }


    // 4 send request
    // const urlparams = new URLSearchParams(form);
    const data = {name:'kamal'};
    const json = JSON.stringify(data);
    xhr.send(json);
}