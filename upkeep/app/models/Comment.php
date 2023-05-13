<?php

class Comment
{
    use Model;

    protected $table = "comments";


    protected $allowed_columns = [
        "comment_id",
        "user_id",
        "post_id",
        "comment",
        "created_at",
    ];

    protected $validation_rules = [
        'comment' => [
            'alpha',
            'required',
        ],
    ];

    public function getCommentsByPostId($post_id)
    {
        $query = "SELECT 
                        c.comment_id, c.user_id, c.post_id, c.comment, c.created_at,
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture
                    FROM comments c 
                    JOIN users u ON c.user_id = u.user_id
                    WHERE c.post_id = :post_id
                    ORDER BY c.created_at DESC
                    ";

        $result = $this->query($query, ['post_id' => $post_id]);

        return $result;
    }

    public function getCommentById(bool|string $comment_id)
    {
        $query = "SELECT 
                        c.comment_id, c.user_id, c.post_id, c.comment, c.created_at,
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture
                    FROM comments c 
                    JOIN users u ON c.user_id = u.user_id
                    WHERE c.comment_id = :comment_id
                    ";

        $result = $this->query($query, ['comment_id' => $comment_id]);

        return $result;
    }


}