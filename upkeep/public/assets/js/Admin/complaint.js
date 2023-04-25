const remove = document.getElementById("delete_btn");


remove.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("remove_complaint");
}
)