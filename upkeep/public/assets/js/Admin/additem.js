const additem = document.getElementById("add_item");



additem.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clcked");
    openPopup("additem");
 

} )