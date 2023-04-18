<?php 

class  Messages {

    use Model;

    protected $table ="messages";

    protected $allowedColumns = [
        "receiver_id",
        "sender_id",
        "msgDescription",
    ];

    public function getchatMessages($user){
        $query = "select * FROM messages WHERE (sender_id = " . $user["sender_id"] . " AND receiver_id = " . $user["receiver_id"] . ") OR (receiver_id = " . $user["sender_id"] . " and sender_id = " . $user["receiver_id"] . ") ORDER BY msg_id ASC";
        return $this->query($query);
    }

    public function latestMessage($user){
        
        $query = " select user_id , first_name , last_name from users   right join (select * FROM messages WHERE (m.sender_id = " . $user["sender_id"] . " AND m.receiver_id = " . $user["receiver_id"] . ") OR (m.receiver_id = " . $user["sender_id"] . " and m.sender_id = " . $user["receiver_id"] . ") ORDER BY msg_id ASC LIMIT 1) x on m.receiver_id = x.user_id ";
        return $this->query($query);
    }
}