<?php

class Notification
{

    use Model;

    protected $table = 'notifications';
    protected $allowed_columns = [
        'notification_id',
        'user_id',
        'message',
        'created_at',
        'updated_at'
    ];

    public function getNotifications($user_id){

        return $this->where(['user_id'=> $user_id]);
    }

    //get notifications after last check
    public function getNewNotifications($user_id, $last_check){
        $notifications = $this->where(['user_id'=> $user_id, 'created_at >' => $last_check]);
        return $notifications;
    }

}