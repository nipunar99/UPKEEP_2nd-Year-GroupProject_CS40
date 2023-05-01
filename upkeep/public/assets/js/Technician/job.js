//get data from html to json
job_details = JSON.parse(job_details);
console.log(job_details);

//load buttons depending on the user role without jquery user role is already defined render it by inner e\html tag using btn-container dov
const btnInHead = document.querySelector('.head .btn-container');


loadButtons();


function loadButtons() {
    if(user_role == 'technician'){
        if(job_details.status=='pending' && job_details.technician_id != null && job_details.technician_id == user_id){
            btnInHead.innerHTML = '' +
                '<button class="btn accept-button" id="accept" data-jobid='+job_details.job_id+'>ACCEPT</button>\n';
        }
        else if(job_details.status=='accepted' && job_details.technician_id != null && job_details.technician_id == user_id){
            btnInHead.innerHTML = '' +
                '<button class="btn complete-button" id="complete" data-jobid='+job_details.job_id+'>COMPLETE</button>\n'+
                '<button class="btn cancel-button" id="request_reschedule" data-jobid='+job_details.job_id+'>REQUEST RESCHEDULE</button>\n';
        }
        else if(job_details.status =='pending' && job_details.applied && job_details.technician_id == null){
            btnInHead.innerHTML = '' +
                '<small class="text-muted">'+job_details.applied_count+' applied</small>' +
                '<button class="btn cancel-button" id="remove_application" data-jobid='+job_details.job_id+'>REMOVE APPLICATION</button>\n';
        }
        else if (job_details.status=='pending' && !job_details.applied && job_details.technician_id == null){
            btnInHead.innerHTML = '' +
                '<small class="text-muted">'+job_details.applied_count+' applied</small>\n' +
                '<button class="btn apply-button" id="apply" data-jobid='+job_details.job_id+'>APPLY</button>\n'
        }
    }
}