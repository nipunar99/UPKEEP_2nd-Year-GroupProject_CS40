const remove = document.getElementById("delete_btn");
const view = document.getElementById("edit_btn");

remove.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("remove_complaint");
}
)




view.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("view_complaint");
}
)