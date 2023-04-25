console.log('loaded')
const addmod = document.getElementById("add_mod");



addmod.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clcked");
    openPopup("addmod");
    console.log("hello");

} )


const edit = document.getElementById("editor_btn");


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

const adminadd = document.getElementById("add_admin");


adminadd.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("addadmin");
}
)