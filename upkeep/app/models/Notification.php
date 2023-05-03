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
        $query= "select * from $this->table where user_id = :user_id and created_at > :last_check";
        $notifications = $this->query($query, ['user_id'=>$user_id, 'last_check'=>$last_check]);
        return $notifications;
    }

    public function getNotificationsSortByDate($user_id)
    {
        $query = "select * from $this->table where user_id = :user_id order by created_at desc";
        $notifications = $this->query($query, ['user_id' => $user_id]);
        return $notifications;
    }

}