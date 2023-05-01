<?php
require '../app/core/init.php';

header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");
header("Connection: keep-alive");

$user_id = $_GET['user_id'];

$notification = new Notification();
$notifications = $notification->getNotifications($user_id);

foreach($notifications as $notification1){
    send_event($notification1);
}

while(true){
    $notification = new Notification();
    sleep(5);
    //get last check time

    $notifications = $notification->getNewNotifications($user_id);
    if($notifications){
        foreach($notifications as $notification){
            send_event($notification);
        }
    }
}

function send_event($notification){
    echo "data: ".json_encode($notification)."\n\n";
    ob_flush();
    flush();
}

