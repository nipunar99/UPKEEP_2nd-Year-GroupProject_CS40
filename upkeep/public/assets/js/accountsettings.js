//BTN UI functionalities
window.addEventListener('DOMContentLoaded', function() {
    // Get all edit buttons
    const editBtns = document.querySelectorAll('.edit-btn');

    // Add click event listener to each edit button
    editBtns.forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            // Get the input field associated with the clicked edit button
            const inputField = document.getElementById(btn.dataset.input);

            // Toggle the input field between read-only and editable mode
            if (inputField.readOnly) {
                inputField.readOnly = false;
                inputField.focus();
                btn.innerHTML = '<i class="material-icons-sharp">done</i>';
            } else {
                inputField.readOnly = true;
                btn.innerHTML = '<i class="material-icons-sharp">edit</i>';
            }
        });
    });
});


////////////////////////
//  PROFILE SETTINGS  //
////////////////////////

// data handling
window.addEventListener('DOMContentLoaded', function() {
    loadData(user);

});


const profileSettingsForm = document.getElementById('profile-settings-form');
const saveChanges = document.getElementById('save_changes');
var updateProfilePic = document.getElementById('profile_picture_input');
const removeProfilePic = document.getElementById('remove_profile_picture');

function loadData(user){
    for(let key in user){
        if(user.hasOwnProperty(key)){
            let el = document.getElementById(key);
            if(el){
                if(el.id === 'profile_picture'){
                    if(user[key] === null){
                        el.src = ROOT+'/assets/images/profilepic/user.png';
                        removeProfilePic.ariaDisabled = true;
                        continue;
                    }else {
                        el.src = ROOT + '/assets/images/profilepic/' + user[key];
                        removeProfilePic.ariaDisabled = false;
                        continue;
                    }
                }
                el.value = user[key];
            }
        }
    }
    const inputFields = profileSettingsForm.querySelectorAll('input');

    console.log(profileSettingsForm);
    inputFields.forEach(input => {
        // Save the original value of the input field
        const originalValue = input.value;

        // Add event listener to detect changes in the input field
        input.addEventListener('input', () => {
            // Check if the input value has changed
            if (input.value !== originalValue) {
                // console.log(input.value, originalValue)
                // If the value has changed, mark the input as "dirty"
                input.dataset.dirty = true;
                saveChanges.ariaDisabled = false;

            } else {
                // If the value has not changed, mark the input as "undirty"
                delete input.dataset.dirty;
                saveChanges.ariaDisabled = true;
            }
        });
    });

}

saveChanges.addEventListener('click', function(e){
    e.preventDefault();
    clearErrorsForm(profileSettingsForm);
    console.log('save changes');
    data = new FormData();
    profileSettingsForm.querySelectorAll('input').forEach(input => {
        if(input.dataset.dirty){
            data.append(input.id, input.value);
        }
    });
    if(document.getElementById("profile_picture_input").files[0]) {
        data.append('profile_picture', document.getElementById('profile_picture_input').files[0]);
    }
    data.append('action', 'update_profile');

    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Accountsettings/updateProfile', true);

    xhr.onload = function(){
        // console.log(xhr.responseText);
        res=JSON.parse(xhr.responseText);
        if(xhr.status == 200){
            console.log(xhr.responseText);
            console.log(res);
            setTimeout(function(){
                openPopup('message');
                formSuccessfull('message', 'Successfull!', 'Your profile has been updated successfully.');
            }, 750);
            closePopup('message');
            loadData(res.user);
        }else{
            closePopup('message');
            for(let key in res){
                if(res.hasOwnProperty(key)){
                    let el = document.getElementById(key);
                    if(el){
                        showErrors(el, res[key]);
                    }
                }
            }
            // console.log(res);
        }
    }
    xhr.send(data);

});

updateProfilePic.addEventListener('change', function(e){
    e.preventDefault();
    data = new FormData();
    data.append('profile_picture', document.getElementById('profile_picture_input').files[0]);
    data.append('action', 'update_profile');

    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Accountsettings/updateProfile', true);

    const overlay = document.getElementById('overlay_div');

    xhr.onprogress = function(e){
        console.log(e);

            overlay.classList.toggle('hidden');

        // overlay.classList.toggle('hidden');
    }

    xhr.onload = function(){
        console.log(xhr.responseText);
        res=JSON.parse(xhr.responseText);
        if(xhr.status == 200){
            console.log(res);
            setTimeout(function(){
                loadData(res.user);
                overlay.classList.toggle('hidden');
            }, 750);
            loadData(res.user);
        }else{
            overlay.classList.toggle('hidden');
            showErrors(removeProfilePic, res.error);
            console.log(res);
        }
    }
    xhr.send(data);

});


removeProfilePic.addEventListener('click', function(e){
    e.preventDefault();
    data = new FormData();
    data.append('action', 'remove_profile_picture');

    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Accountsettings/removeProfilePicture', true);

    const overlay = document.getElementById('overlay_div');

    xhr.onprogress = function(e){
        overlay.classList.toggle('hidden');
    }

    xhr.onload = function(){
        console.log(xhr.responseText);
        res=JSON.parse(xhr.responseText);
        if(xhr.status == 200){
            console.log(res);
            setTimeout(function(){
                loadData(res.user);
                overlay.classList.toggle('hidden');
            }, 750);
            loadData(res.user);
        }else{
            overlay.classList.toggle('hidden');
            showErrors(removeProfilePic, res.error);
            console.log(res);
        }
    }
    xhr.send(data);

});


////////////////////////
//  PASSWORD SETTINGS //
////////////////////////

const passwordSettingsForm = document.getElementById('password-settings-form');

//repeat password validation
const currentPassword = document.getElementById('current_password');
const repeatPassword = document.getElementById('repeat_new_password');
const newPassword = document.getElementById('new_password');
const updatePasswordBtn = document.querySelector('a.btn#update_password');

console.log(currentPassword, newPassword, repeatPassword);

newPassword.addEventListener('keyup', function(e){
    console.log(newPassword.value);
    if( newPassword.value===currentPassword.value){
        showErrors(newPassword,'New password cannot be the same as the current password.');
        newPassword.validflag= false;
    }else{
        clearErrorsInput(newPassword);
        newPassword.validflag= true;
    }
});

repeatPassword.addEventListener('keyup', function(e){
    if(repeatPassword.value !== newPassword.value){
        showErrors(repeatPassword,'Passwords do not match.');
        repeatPassword.validflag= false;
    }else{
        clearErrorsInput(repeatPassword);
        repeatPassword.validflag= true;
    }
});

//if all fields are valid, enable enable update password button
passwordSettingsForm.addEventListener('keyup', function(e){
    if(newPassword.value && repeatPassword.value && currentPassword.value && newPassword.validflag && repeatPassword.validflag){
        updatePasswordBtn.ariaDisabled = false;
    }else{
        updatePasswordBtn.ariaDisabled = true;
    }
});

//validate password
updatePasswordBtn.addEventListener('click', function(e){
    e.preventDefault();
    clearErrorsForm(passwordSettingsForm);
    data = new FormData();
    passwordSettingsForm.querySelectorAll('input').forEach(input => {
        data.append(input.id, input.value);
    });
    data.append('action', 'update_password');

    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Accountsettings/updatePassword', true);

    xhr.onload = function(){
        console.log(xhr.responseText);
        res=JSON.parse(xhr.responseText);
        if(xhr.status == 200){
            console.log(res);
            setTimeout(function(){
                openPopup('message');
                formSuccessfull('message', 'Successfull!', 'Your password has been updated successfully.');
            }, 750);
            closePopup('message');
            loadData(res.user);
        }else{
            closePopup('message');
            for(let key in res){
                if(res.hasOwnProperty(key)){
                    let el = document.getElementById(key);
                    if(el){
                        showErrors(el, res[key]);
                    }
                }
            }
            console.log(res);
        }
    }
    xhr.send(data);

});
