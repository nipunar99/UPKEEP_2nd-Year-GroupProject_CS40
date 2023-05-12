//Buttons for the popup form
const applyButton_main = document.querySelectorAll('.apply-button');
const removeApplicationButton = document.querySelectorAll('.cancel-button');
const cancelButton = document.querySelectorAll('.popup .btn-cancel');

//event listner to apply button in list
applyButton_main.forEach((button)=>{
    button.addEventListener('click',()=>{
        console.log('apply button clicked');
        //clear form and errors
        const form = popups['apply_job'].querySelector('form');
        form.reset();
        clearErrors('apply_job');
        const jobid = button.dataset.jobid;
        console.log(jobid);
        openPopup('apply_job');
        popups['apply_job'].querySelector('.popup-title').innerHTML = "Apply for Job #" +button.dataset.jobid;
        popups['apply_job'].dataset.jobId = jobid;
    });
});

removeApplicationButton.forEach((button)=>{
    button.addEventListener('click',()=>{
        openPopup('remove_application');
        areYouSure('remove_application', 'Are you sure you want to cancel your application?');
    });
});



cancelButton.forEach((button)=>{
    button.addEventListener('click',(e)=>{
        e.preventDefault();
        areYouSure('apply_job', 'Are you sure you want to cancel your application?');
    });
});

//event listner to apply job button in popup
popups['apply_job'].querySelector('#apply-job').addEventListener('click', (e)=>{
    e.preventDefault();
    // console.log('apply job');
    applyJob();
});

//function to apply job to back end
function applyJob(){
    // console.log('apply job');
    const jobId = popups['apply_job'].dataset.jobId;
    const form = popups['apply_job'].querySelector('form');
    const formData = new FormData(form);
    formData.append('job_id', jobId);
    formData.append('action', 'apply');
    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Technician/Findjobs/applyJob', true);
    xhr.onload = function () {
        res=JSON.parse(this.responseText);
        if (xhr.status === 200) {
            console.log(xhr.responseText)
            const response = JSON.parse(xhr.responseText);
            formSuccessfull('apply_job', 'Application Successful', response.success);


        } else{
            console.log(xhr.responseText);
            showErrors(form.querySelector("#quote"),res.error);
        }
    }
    xhr.send(formData);
}


//Remove application
const removebtn = document.querySelector('.remove-button');
removebtn.addEventListener('click', (e)=>{
    e.preventDefault();
    openPopup('remove_application');
    areYouSure('remove_application', 'Are you sure you want to cancel your application?');
    popups['remove_application'].querySelector('#yes').addEventListener('click', (e)=>{
        e.preventDefault();
        removeApplication();
    });

    popups['remove_application'].querySelector('#no').addEventListener('click', (e)=>{
        e.preventDefault();
        closePopup('remove_application');
    });
});

function removeApplication(){
    const jobid = popups['remove_application'].dataset.jobid;
    const formData = new FormData();
    formData.append('job_id', jobid);
    formData.append('action', 'remove');
    xhr = new XMLHttpRequest();
    xhr.open('POST', ROOT+'/Technician/Findjobs/removeApplication', true);
    xhr.onload = function () {
        res=JSON.parse(this.responseText);
        if (xhr.status === 200) {
            console.log(xhr.responseText)
            const response = JSON.parse(xhr.responseText);
            formSuccessfull('remove_application', 'Application Removed', response.success);
            finish('remove_application');
        }else{
            console.log(xhr.responseText);
            // showErrors(form.querySelector("#quote"),res.error);
        }
    }
    xhr.send(formData);
}
