console.log('loaded')
const addmod = document.getElementById("btn_mod1");



addmod.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clcked");
    openPopup("addmod");
    console.log("hello");

} )


const edit = document.getElementById("edit_btn");


edit.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("editmod");
}
)

const remove = document.getElementById("remove_btn");


remove.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("removemod");
}
)