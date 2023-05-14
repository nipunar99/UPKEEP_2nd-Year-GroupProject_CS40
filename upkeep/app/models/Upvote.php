<?php

class Upvote
{
    Use Model;

    protected $table = "upvotes";

    protected $allowed_columns = [
        "id",
        "user_id",
        "post_id",
        "created_at",
    ];


    public function upvotePost($post_id, $user_id)
    {
        $arr= [
            "user_id" => $user_id,
            "post_id" => $post_id,
        ];

        $downvote = new Downvote;

        $query = "SELECT * FROM upvotes WHERE user_id = :user_id AND post_id = :post_id";
        $result = $this->query($query, $arr);
        if (empty($result)) {
            $query = "INSERT INTO upvotes (user_id, post_id) VALUES (:user_id, :post_id)";
            $downvote->removeDownvote($post_id, $user_id);
        } else {
            $query = "DELETE FROM upvotes WHERE user_id = :user_id AND post_id = :post_id RETURNING 'removed_upvote' AS upvote_status";
        }

        $result = $this->query($query, $arr);

        if($result){
            return false;
        } else {
            return true;
        }

    }

    function removeUpvote($post_id, $user_id)
    {
        $arr= [
            "user_id" => $user_id,
            "post_id" => $post_id,
        ];

        $query = "DELETE FROM upvotes WHERE user_id = :user_id AND post_id = :post_id LIMIT 1";
        $result = $this->query($query, $arr);
        return $result;
    }

    public function getUpvotesCount($post_id)
    {
        $arr= [
            "post_id" => $post_id,
        ];

        $query = "SELECT COUNT(*) AS upvote_count FROM upvotes WHERE post_id = :post_id ";
        $result = $this->query($query, $arr);
        return $result[0];
    }


}