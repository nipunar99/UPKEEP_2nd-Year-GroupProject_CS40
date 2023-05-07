<?php 

class  Conversationc {

    use Model;

    protected $table ="conversation";

    public function getTechnicians($user_id){
     $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.unread_count from users u INNER JOIN (SELECT * FROM conversation where owner_id=" . $user_id.") c  ON u.user_id = c.technician_id";
        return $this->query($query);
    }

    public function getItemowners($user_id){
        $query = "select u.user_id, u.first_name, u.last_name, c.latest_msg, c.time, c.unread_count from users u INNER JOIN (SELECT * FROM conversation where technician_id=" . $user_id.") c  ON u.user_id = c.owner_id";
        return $this->query($query);
    }
   

}