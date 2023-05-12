console.log('loaded')
const addmod = document.getElementById("add_mod");



addmod.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clcked");
    openPopup("addmod");
    const addModeratorBtn = document.getElementById("addModeratorbtn");
    addModeratorBtn.addEventListener('click',function(e){
            e.preventDefault();
            ajax_addModerator();
            closePopup("addmod");
        });

} )


const edit = document.querySelectorAll("#editor_btn");

console.log(edit);

edit.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        openPopup("editmod");
        data = JSON.parse(btn.closest('tr').dataset.userdetails);
        console.log(data);
        
        popups['editmod'].dataset.userid = data.user_id;
        popups['editmod'].querySelector('input#first_name').value = data.first_name;
        popups['editmod'].querySelector('input#last_name').value = data.last_name;
        popups['editmod'].querySelector('input#user_name').value = data.user_name;
        popups['editmod'].querySelector('input#email').value = data.email;
        popups['editmod'].querySelector('input#nic').value = data.nic;
        popups['editmod'].querySelector('input#mobile_no').value = data.mobile_no;
        popups['editmod'].querySelector('input#address').value = data.address;

        const updateAdministrativeBtn = document.getElementById("save_changes");
        updateAdministrativeBtn.addEventListener('click',function(e){
            e.preventDefault();
            ajax_updateAdminUsers(data.user_id);
            closePopup("editmod");
        });

    });
});


const remove = document.querySelectorAll("#remove_btn");

console.log(remove);

remove.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        console.log("clicked");
        openPopup("removemod");
        data = JSON.parse(btn.closest('tr').dataset.userdetails);
        popups['removemod'].dataset.userid = data.user_id;


        const removeAdministrativeBtn = document.getElementById("yes");
        removeAdministrativeBtn.addEventListener('click',function(e){
            e.preventDefault();
            ajax_removeAdminUsers(data.user_id);
            closePopup("removemod");
        });
        // data = JSON.parse(btn.closest('tr').dataset.remove_user);

       
    });
});


const adminadd = document.getElementById("add_admin");


adminadd.addEventListener('click',function(e){
    e.preventDefault();
    console.log("clicked");
    openPopup("addadmin");
    const addAdminBtn = document.getElementById("addAdminbtn");
    addAdminBtn.addEventListener('click',function(e){
            e.preventDefault();
            ajax_addAdmin();
            closePopup("addadmin");
        });
}
)