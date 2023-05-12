<?php
//
//session_start();
//require '../app/core/init.php';
//
//
//header('Content-Type: text/event-stream');
//header('Cache-Control: no-cache');
//
//
//// Fetch initial notifications
//$notifications = fetchNotifications();
//show($notifications);
//// Send initial notifications as SSE events
//sendSSEEvent($notifications);
//
//// Continuously fetch new notifications and send them as SSE events
//while (true) {
//    $newNotifications = fetchNotificationsSinceLastCheck();
//    if (!empty($newNotifications)) {
//        sendSSEEvent($newNotifications);
//    }
//    sleep(10);
//}
//
//function fetchNotifications() {
//    return Notifications::getAllNotifications();
//}
//
//function fetchNotificationsSinceLastCheck() {
//    // Fetch new notifications since the last check
//
//
////    return $newNotifications;
//}
//
//function sendSSEEvent($notifications) {
//    foreach ($notifications as $notification) {
//        echo "event: notification\n";
//        echo "data: " . json_encode($notification) . "\n\n";
//    }
//    ob_flush();
//    flush();
//}
//
//?>
