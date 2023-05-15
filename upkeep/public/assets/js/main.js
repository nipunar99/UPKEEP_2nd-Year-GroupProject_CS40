// function connect() {
//      // Replace with the actual user ID
//     console.log(ROOT+"/sse.php?user_id=" + user_id);
//     var source = new EventSource(ROOT+"/sse.php?user_id=" + user_id);
//
//
//     // Handle errors
//     source.onerror = function(event) {
//         // console.error("Failed to connect to SSE stream:", event);
//     };
//
//     // Handle incoming events
//     source.onmessage = function(event) {
//         var data = JSON.parse(event.data);
//         console.log(data);
//     };
// }
//
// connect();


const profile = document.querySelector('.profile');
profile.addEventListener('click', function () {
    document.querySelector('.dropdown-content').classList.toggle('active');
});

//setprofile picture for every where to #current_user_profile_pic
function setProfilePic() {
    const current_user_profile_pic = document.querySelectorAll('#current_user_profile_pic');
    xhr = new XMLHttpRequest();
    xhr.open('GET', ROOT + '/Home/getUserImage', true);
    xhr.onload = function () {

        if (this.status === 200) {
            console.log(this.responseText);
            const response = JSON.parse(this.responseText);
            console.log(response);
            current_user_profile_pic.forEach(function (element) {
                element.setAttribute('src', ROOT + '/assets/images/profilepic/' + response.profile_picture);
            });
        }
    }
    xhr.send();
}

setProfilePic();