<?php

class Downvote
{

    Use Model;

    protected $table = "downvotes";

    protected $allowed_columns = [
        "id",
        "user_id",
        "post_id",
        "created_at",
    ];

    protected $validation_rules = [
        "user_id" => "integer",
        "post_id" => "integer",
    ];

    public function downvotePost($post_id, $user_id)
    {
        $arr= [
            "user_id" => $user_id,
            "post_id" => $post_id,
        ];

        $upvote = new Upvote;


        $query = "SELECT * FROM downvotes WHERE user_id = :user_id AND post_id = :post_id";
        $result = $this->query($query, $arr);
        if (empty($result)) {
            $query = "INSERT INTO downvotes (user_id, post_id) VALUES (:user_id, :post_id)";
            $upvote->removeUpvote($post_id, $user_id);
        } else {
            $query = "DELETE FROM downvotes WHERE user_id = :user_id AND post_id = :post_id RETURNING 'removed_downvote' AS downvote_status";
        }

        $result = $this->query($query, $arr);
        if($result){
            return false;
        } else {
            return true;
        }
    }

    public function removeDownvote($post_id, $user_id)
    {
        $arr= [
            "user_id" => $user_id,
            "post_id" => $post_id,
        ];

        $query = "DELETE FROM downvotes WHERE user_id = :user_id AND post_id = :post_id LIMIT 1";
        $result = $this->query($query, $arr);
        return $result;
    }

}