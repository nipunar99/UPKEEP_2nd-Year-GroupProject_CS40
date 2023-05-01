<?php

class Notifications
{
    use Controller;

    //get new notifications
    public static function getNewNotifications($user_id, $last_check){
        $notification = new Notification;
        return $notification->where(['user_id'=> $user_id, 'created_at >' => $last_check]);
    }
}