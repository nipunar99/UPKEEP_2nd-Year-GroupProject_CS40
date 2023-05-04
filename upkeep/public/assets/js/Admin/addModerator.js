document.getElementById("addModeratorbtn").addEventListener('click',ajax_addModerator);

function ajax_addModerator(e){
    // errocheckflag = 0;
    e.preventDefault();// ape form refresh wenna epa.
    // setSmallNull();
    const formModeratorDetails = document.getElementById("addModerator-details");

    // if(errocheckflag == 0){
        const form = new FormData(formModeratorDetails);
        form.append("action","addmoderator");// ubt wenama key value pair dgnna pluen form eken ena ewt amthraw

        // Ajax eke create kragnnw

        const xhr = new XMLHttpRequest(); //ajax request ekak create

        xhr.open("POST",""+ROOT+"/Admin/Addmoderator/addModeratorfunc",true);
        
        xhr.onload = function(){ // request success chech kranw
            if(xhr.status == 200){
                const res = xhr.responseText;
                console.log(res);
            }
        }

        xhr.send(form);
        
        // ajax_getItems();
        formModeratorDetails.reset();
        closePopup("addmod");

    // }
    
}