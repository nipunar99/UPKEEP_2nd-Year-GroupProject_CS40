const remove = document.querySelectorAll("#delete_btn");
const view = document.querySelectorAll("#view_btn");

console.log(remove);

remove.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        openPopup("remove_complaint");

        // data = btn.dataset.complaint;

        const removeComplaintBtn = document.getElementById("remove_complaintBtn");
        removeComplaintBtn.addEventListener('click',function(e){
            data = btn.dataset.userid;

            console.log(data);
            ajax_removeComplaint(data);
            closePopup("remove_complaint");
        });

    })

})

function ajax_removeComplaint(complaint_id){

    const form = new FormData();
    form.append("action","removecomplaint");
    form.append("complaint_id",complaint_id);
   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Complaints/removeComplaint");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);
}



view.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        console.log("clicked");
        openPopup("view_complaint");
    });
})


