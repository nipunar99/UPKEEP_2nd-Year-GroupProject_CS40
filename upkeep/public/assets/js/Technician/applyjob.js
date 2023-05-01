//Buttons for the popup form
const applyButton_main = document.querySelectorAll('.apply-button');
const removeApplicationButton = document.querySelectorAll('.cancel-button');
const cancelButton = document.querySelectorAll('.popup .btn-cancel');
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
            formSuccessfull('apply_job', 'Application Successful', 'Your application has been submitted successfully');
            const response = JSON.parse(xhr.responseText);
            console.log(response);
            setTimeout(() => {
                closePopup('apply_job');
            }, 3000);

        } else{
            console.log(xhr.responseText);
            showErrors(form.querySelector("#quote"),res.error);
        }
    }
    xhr.send(formData);
}