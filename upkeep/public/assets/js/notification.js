// create class for all notifications to fetch the notifications from the database and show it in the notification side bar in every page also to easily load notifications fetch by sse and devide all the notifications into read and unread panels
console.log("notification.js");
window.onload = function (){
    notification = new Notification();
    // notification.fetchNotifications();
    // notification.LoadNewNotificationsDynamically();
}

class Notification {
    constructor() {
        this.notifications = [];
        this.unreadNotifications = [];
        this.unreadNotificationCount = 0;
        this.notificationCount = 0;
        this.lastChecked;//initially time now
        this.notificationList = document.querySelector('#notification-list-unread');
        this.notificationCountElement = document.getElementById('.notification .badge');
        this.fetchNotifications();
        this.LoadNewNotificationsDynamically();
        // this.notificationCountElement.innerHTML = this.notificationCount;
        // this.notificationList.innerHTML = '';
        // this.notificationList.innerHTML = '<li class="notification-list-item">No new notifications</li>';
        // this.sse = null;
        // this.connect();
    }

    // connect() {
    //     // Replace with the actual user ID
    //     console.log(ROOT + "/sse.php?user_id=" + user_id);
    //     this.sse = new EventSource(ROOT + "/sse.php?user_id=" + user_id);
    //     // Handle errors
    //     this.sse.onerror = function (event) {
    //         console.error("Failed to connect to SSE stream:", event);
    //     };
    //     // Handle incoming events
    //     this.sse.onmessage = function (event) {
    //         // var data = JSON.parse(event.data);
    //         console.log(event.data);
    //     };
    // }


    //use set interval to check for new notifications
    LoadNewNotificationsDynamically() {
        setInterval(() => {
            this.fetchNewNotifications();
        }, 10000);
    }

    fetchNewNotifications() {
        // fetch new notifications from the database using xhr
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT + '/Notifications/getNewNotifications/?lastChecked=' + this.lastChecked, true);
        xhr.onload = () => {
            // console.log(xhr.responseText);
            if (xhr.status == 200) {
                let notifications = JSON.parse(xhr.responseText);
                // console.log(notifications);
                if(notifications.length>0) {
                    notifications.forEach(notification => {
                        // Create a new <li> element
                        const li = this.createNotificationElement(notification);
                        this.notificationList.insertBefore(li, this.notificationList.firstChild);
                    });

                    this.notificationCount += notifications.length;
                    this.unreadNotificationCount += notifications.length;
                    this.lastChecked = notifications[0].created_at;
                }
                // notification_class.notificationCountElement.innerHTML = notification_class.notificationCount;
            } else {
                console.log(xhr.responseText);
            }
        }
        console.log(this.lastChecked);
        xhr.send();
    }




    fetchNotifications() {
        // fetch notifications from the database using xhr
        console.log(ROOT + '/Notifications/getAllNotifications');
        let xhr = new XMLHttpRequest();


        xhr.open('GET', ROOT + '/Notifications/getAllNotificationsNewestFirst', true);
        xhr.onload = () => {
            // console.log(xhr.responseText);
            if (xhr.status == 200) {
                let notifications = JSON.parse(xhr.responseText);
                console.log(notifications[0]);

                //filling notification panel
                const notificationList1=document.querySelector('#notification-list-unread');
                const notificationList2=document.querySelector('#notification-list-history');
                notifications.forEach(notification => {
                    // Create a new <li> element
                    const li = this.createNotificationElement(notification);
                    if(notification.read_status=='0') {
                        notificationList1.appendChild(li);
                    }else if(notification.read_status=='1'){
                        notificationList2.appendChild(li);
                    }
                });

                this.notificationCount = notifications.length;
                this.unreadNotificationCount = notifications.filter(notification => notification.read_status == '0').length;
                this.lastChecked = notifications[0].created_at;
                // this.notificationCountElement.innerHTML = this.notificationCount;
            }else{
                console.log('error');
            }
        }
        xhr.send();

    }

    markAsRead(notificationId) {
        // mark a notification as read using xhr
        let xhr = new XMLHttpRequest();
        xhr.open('GET', ROOT + '/Notifications/markAsRead/' + notificationId, true);
        xhr.onload = () => {
            if (xhr.status == 200) {
                console.log(xhr.responseText);
                this.fetchNotifications();
            } else {
                console.log(xhr.responseText);
            }
        }
        xhr.send();
    }

    createNotificationElement(notification) {

        var li = document.createElement('li');

        // Create a new <div> element with the "notification-card" and "error" classes
        var card = document.createElement('div');
        card.classList.add('notification-card', notification.priority);

        // Create a new <div> element with the "content" class
        var content = document.createElement('div');
        content.classList.add('content');

        // Create a new <div> element with the "title-row" class
        var titleRow = document.createElement('div');
        titleRow.classList.add('title-row');

        // Create a new <div> element with the "icon" class
        var icon = document.createElement('div');
        icon.classList.add('icon',notification.priority);

        // Create a new <i> element with the "fa fa-bell" classes
        var bellIcon = document.createElement('i');
        bellIcon.classList.add('fa', 'fa-bell');
        icon.appendChild(bellIcon);

        // Create a new <h4> element with the notification type text
        var title = document.createElement('h4');
        title.textContent = notification.notification_type;

        // Append the <div class="icon"> and <h4> elements to the <div class="title-row"> element
        titleRow.appendChild(icon);
        titleRow.appendChild(title);

        // Create a new <p> element with the notification message text
        var message = document.createElement('p');
        message.textContent = notification.message;

        // Create a new <span> element with the notification created_at text
        var date = document.createElement('span');
        date.classList.add('date');
        date.textContent = generate_time_ago_string(notification.created_at);

        // Create a new <div> element with the "mark-as-read" class
        if(notification.read_status==0) {
            var markAsRead = document.createElement('div');
            markAsRead.classList.add('mark-as-read');


            // Create a new <a> element with the "Mark as read" text
            var markAsReadLink = document.createElement('a');
            markAsReadLink.setAttribute('href', '#');
            markAsReadLink.textContent = 'Mark as read';
            // Append the <a> element to the <div class="mark-as-read"> element
            markAsRead.appendChild(markAsReadLink);
        }

        // Append all the elements to the <div class="content"> element
        content.appendChild(titleRow);
        content.appendChild(message);
        content.appendChild(date);
        if(notification.read_status==0) {
            content.appendChild(markAsRead);
        }

        // Append the <div class="content"> element to the <div class="notification-card error"> element
        card.appendChild(content);

        // Append the <div class="notification-card error"> element to the <li> element
        li.appendChild(card);

        if(notification.read_status==0) {
            li.querySelector('.mark-as-read a').addEventListener('click', (e) => {
                e.preventDefault();
                this.markAsRead(notification.notification_id);
                li.classList.add('read');
                // this.unreadNotificationCount--;
                // this.notificationCountElement.innerHTML = notification.unreadNotificationCount;
            });
        }

        return li;
    }
}

// create an instance of the Notification class


// setTimeout(notification.fetchNotifications(),100000);



//additional Functions
function generate_time_ago_string(datetime) {
    var timestamp = new Date(datetime).getTime() / 1000;
    var current_time = Math.floor(Date.now() / 1000);
    var time_diff = current_time - timestamp;

    var minute = 60;
    var hour = minute * 60;
    var day = hour * 24;
    var week = day * 7;
    var month = day * 30;

    if (time_diff < minute) {
        time_ago = "just now";
    } else if (time_diff < hour) {
        var minutes_ago = Math.floor(time_diff / minute);
        var time_ago = minutes_ago + " minute" + (minutes_ago > 1 ? "s" : "") + " ago";
    } else if (time_diff < day) {
        var hours_ago = Math.floor(time_diff / hour);
        var time_ago = hours_ago + " hour" + (hours_ago > 1 ? "s" : "") + " ago";
    } else if (time_diff < week) {
        var days_ago = Math.floor(time_diff / day);
        var time_ago = days_ago + " day" + (days_ago > 1 ? "s" : "") + " ago";
    } else if (time_diff < month) {
        var weeks_ago = Math.floor(time_diff / week);
        var time_ago = weeks_ago + " week" + (weeks_ago > 1 ? "s" : "") + " ago";
    } else {
        var months_ago = Math.floor(time_diff / month);
        var time_ago = months_ago + " month" + (months_ago > 1 ? "s" : "") + " ago";
    }

    return time_ago;
}
