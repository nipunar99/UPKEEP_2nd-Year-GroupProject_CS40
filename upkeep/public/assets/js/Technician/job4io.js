//get data from html to json
job_details =job;
user_role = userdata.user_role;
console.log(job_details);
console.log(user_role);

//load buttons depending on the user role without jquery user role is already defined render it by inner e\html tag using btn-container dov
const btnInHead = document.querySelector('.head .btn-container');


loadButtons();


function loadButtons() {
    if(user_role == 'item_owner') {
        if (job_details.overall_status == 'pending acceptance') {
            btnInHead.innerHTML = '' +
                '<h2 class="warning">Pending for Acceptance</h2>';
            console.log(btnInHead);
        }
        else if (job_details.overall_status == "pending for applications") {
            btnInHead.innerHTML = '' +
                '<h2 class=warning>Sent to Technicians</h2>\n';
        }
        else if (job_details.status == 'accepted') {
            btnInHead.innerHTML = '' +
                '<button class="btn decline-button danger" id="cancel" data-jobid='+job_details.job_id+'>DECLINE</button>\n';
                '<button class="btn reschedule-button warning" id="request_reschedule" data-jobid=' + job_details.job_id + '>RESCHEDULE</button>\n';
        }
        else if (job_details.overall_status == "completed") {
            btnInHead.innerHTML = '' +
                '<h2 class=success>Completed</h2>\n' +
                '<button class="btn warning" id="add-review" data-jobid=' + job_details.job_id + '>Add Review</button>\n';
        }
        else if (job_details.overall_status == 'cancelled' ) {
            btnInHead.innerHTML = '' +
                '<h2 class=danger>Cancelled</h2>\n';

        }
    }
}



//reviewbtn event listener
if(document.querySelector('#add-review')) {
    const reviewBtn = document.querySelector('#add-review');
    reviewBtn.addEventListener('click', (e) => {
        e.preventDefault();
        openPopup('add_review');
        console.log('review clicked');
    });

    const addReviewForm = document.querySelector('#add-review-form');
    const submitReviewBtn = document.querySelector('#submit-review');
    submitReviewBtn.addEventListener('click', (e) => {
        e.preventDefault();
        console.log('submit review clicked');

        const data = new FormData();
        //add if only values are not null
        // data.append('job_id', job_details.job_id);
        if(job_details.gig_id != null){
            data.append('gig_id', job_details.gig_id);
        }
        data.append('rating', ratingValue);
        data.append('content', addReviewForm.content.value);
        data.append('technician_id', job_details.technician_id);
        console.log(data);
        //send data to server

        xhr = new XMLHttpRequest();
        xhr.open('POST', ROOT+'/itemOwner/TechnicianGigs/addReview', true);
        xhr.onload = function () {
            console.log(this.responseText);
            res=JSON.parse(this.responseText);
            if (xhr.status === 200) {
                console.log(xhr.responseText)
                const response = JSON.parse(xhr.responseText);
                formSuccessfull('add_review', 'gig_review Added', response.success);
            } else {
                console.log('error');
                formFailed('add_review', 'Error', res.error);
            }
        }
        xhr.send(data);
    });

    const radioButtons = document.querySelectorAll('.wrapper input[type="radio"]');
    let ratingValue;

    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('click', function() {
            ratingValue = this.value;
            console.log('Selected rating:', ratingValue);
        });
    });


    //add review

}