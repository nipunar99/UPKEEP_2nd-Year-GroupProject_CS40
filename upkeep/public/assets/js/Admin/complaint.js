const remove = document.querySelectorAll("#delete_btn");
const view = document.querySelectorAll("#view_btn");

console.log(remove);

// remove.forEach(function(btn){
//     btn.addEventListener('click',function(e){
//         e.preventDefault();
//         openPopup("remove_complaint");

//         // data = btn.dataset.complaint;

//         const removeComplaintBtn = document.getElementById("remove_complaintBtn");
//         removeComplaintBtn.addEventListener('click',function(e){
//             data = btn.dataset.userid;

//             console.log(data);
//             ajax_removePost(data);
//             closePopup("remove_complaint");
//         });

//     })

// })

function ajax_removePost(user_id){

    const form = new FormData();
    form.append("action","removepost");
    form.append("user_id",user_id);
   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Complaints/removePost");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);
}



view.forEach(function(btn){
    btn.addEventListener('click',function(e){
        e.preventDefault();
        openPopup("view_complaint");
        postDetails = JSON.parse(btn.closest('tr').dataset.complaintdetails);
        popup=popups['view_complaint'];
        fetchAndRenderPostDetails(postDetails.post_id);
        
        // console.log(popup.querySelector('h3#description'));
        // popup.querySelector('h3#description').innerHTML = data.description;
        // popup.querySelector('h4#type').innerHTML = data.complaint_type;
        // popup.querySelector('h4#status').innerHTML = data.status;
        // popup.querySelector('h4#date_created').innerHTML = data.date_created;

        

        // popup.querySelector('post-details').appendChild(postElement);
            console.log(popup.querySelector('h3#description'));

            popup.querySelector('h3#complaint_id').innerHTML = postDetails.complaint_id;
            popup.querySelector('h3#complaint_type').innerHTML = postDetails.complaint_type;
            popup.querySelector('h3#description').innerHTML = postDetails.description;
            popup.querySelector('h3#status').innerHTML = postDetails.status;
        
            const removePostBtn = document.getElementById("remove_postBtn");
            removePostBtn.addEventListener('click',function(e){
            data = btn.dataset.postid;
            data1 =postDetails.complaint_id
            console.log(postDetails);
            ajax_removePost(data,data1);
            ajax_addResolution(data1);

            closePopup("view_complaint");

            
        });

        const ignoreBtn = document.getElementById("ignore_btn");
        ignoreBtn.addEventListener('click',function(e){
            data2=postDetails.complaint_id;
            ajax_ignorePost(data2);
            ajax_addResolution(data2);

            closePopup("view_complaint");
        });

        function ajax_addResolution(id){

            // const formItemDetails = document.getElementById("form_itemDetails");
            const addresolution_details = document.getElementById("add_resolution");
        
            console.log(addresolution_details);
            const form = new FormData(addresolution_details);
            form.append("action","addresolution_details");
            form.append("complaint_id",id);
           
            
            const xhr = new XMLHttpRequest();
        
            xhr.open("POST",""+ROOT+"/Admin/Complaints/addResolution");
        
            xhr.onload = function(){
                if(xhr.status == 200){
                    const res = xhr.responseText;
                    console.log(res);
                }
            }
        
            xhr.send(form);
        
        }

    });
})


function fetchAndRenderPostDetails(postId){
    let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT+'/Admin/Complaints/getPostById/'+postId, true);
        xhr.onload = function(){
            if (xhr.status === 200) {
                const res = xhr.responseText;
                const response = JSON.parse(res);
                console.log(response[0]);

                const post =new Post(response[0]);
                // console.log(post);
                const postElement = post.createPostElement();
                postDetailsElement = popup.querySelector('.post-details');
                postDetailsElement.innerHTML="";
                postDetailsElement.appendChild(postElement);
            }
        }
        xhr.send();
}

function ajax_removePost(post_id,complaint_id){
    const form = new FormData();
    form.append("action","removepost");
    form.append("post_id",post_id);
    form.append("complaint_id",complaint_id);
   
    
    const xhr = new XMLHttpRequest();

    xhr.open("POST",""+ROOT+"/Admin/Complaints/removePost");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);
}
function ajax_ignorePost(complaint_id){
    const form=new FormData();
    form.append("action","ignoreComplaint");
    form.append("complaint_id",complaint_id);
    
    const xhr = new XMLHttpRequest();
    xhr.open("POST",""+ROOT+"/Admin/Complaints/ignoreComplaint");

    xhr.onload = function(){
        if(xhr.status == 200){
            const res = xhr.responseText;
            console.log(res);
        }
    }

    xhr.send(form);


}
// function removePost(){
//     const remove = document.getElementById("ignore_btn");
//     // console.log(remove);
//     remove.addEventListener('click',function(e){
//         e.preventDefault();
//         console.log('hello1');
//         openPopup("remove_complaint_action");
//         console.log('hello');
//         });

// }


function generateTimeAgoString(datetime) {
    const timestamp = new Date(datetime).getTime() / 1000;
    const currentTime = Math.floor(Date.now() / 1000);
    const timeDiff = currentTime - timestamp;

    const minute = 60;
    const hour = minute * 60;
    const day = hour * 24;
    const week = day * 7;
    const month = day * 30;

    let timeAgo;

    if (timeDiff < minute) {
        timeAgo = 'just now';
    } else if (timeDiff < hour) {
        const minutesAgo = Math.floor(timeDiff / minute);
        timeAgo = `${minutesAgo} minute${minutesAgo > 1 ? 's' : ''} ago`;
    } else if (timeDiff < day) {
        const hoursAgo = Math.floor(timeDiff / hour);
        timeAgo = `${hoursAgo} hour${hoursAgo > 1 ? 's' : ''} ago`;
    } else if (timeDiff < week) {
        const daysAgo = Math.floor(timeDiff / day);
        timeAgo = `${daysAgo} day${daysAgo > 1 ? 's' : ''} ago`;
    } else if (timeDiff < month) {
        const weeksAgo = Math.floor(timeDiff / week);
        timeAgo = `${weeksAgo} week${weeksAgo > 1 ? 's' : ''} ago`;
    } else {
        const monthsAgo = Math.floor(timeDiff / month);
        timeAgo = `${monthsAgo} month${monthsAgo > 1 ? 's' : ''} ago`;
    }

    return timeAgo;
}

