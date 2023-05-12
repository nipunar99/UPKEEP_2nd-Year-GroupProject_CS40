<?php

class Notifications
{
    use Controller;
    //get new notifications get method sends check time
    public function getNewNotifications(){
        $user_id = $_SESSION['user_id'];
        $last_check = $_GET['lastChecked'];
        $notification = new Notification;
        $notifications = $notification->getNewNotifications($user_id, $last_check);
        echo json_encode($notifications);
    }

    public static function getAllNotificationsNewestFirst(){
        $user_id = $_SESSION['user_id'];
        $notification = new Notification;
        $notifications = $notification->getNotificationsSortByDate($user_id);
        echo json_encode($notifications);
    }

    public static function sendNotification($user_id,$notification_type, $message, $priority ,$link){
        $notification = new Notification;
        $notification->insert(['user_id'=>$user_id,
                                'notification_type'=>$notification_type ,
                                'message'=>$message,
                                'priority'=>$priority ,
                                'link'=>$link]);
    }

    public static function markAsRead($notification_id){
        $notification = new Notification;

        try {
            $arr['success'] ='success';
            $notification->update($notification_id[0],['read_status'=>'1'],'notification_id');
        }catch (PDOException $e){
            http_response_code(500);
            $arr['error'] = $e->getMessage();
            echo json_encode($arr);
        }
    }

}