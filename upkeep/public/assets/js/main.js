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

//setprofile picture for evety where