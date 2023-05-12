<?php

class Post
{
    use Model;

    private $table = 'posts';

    private $allowed_columns = [
        'post_id',
        'user_id',
        'item_id',
        'item_type',
        'item_brand',
        'item_model',
        'untracked_item_id',
        'post_type',
        'post_title',
        'post_content',
        'status'
    ];

    private $validation_rules = [
        'post_title' => [
            'alpha',
            'required',
        ],

        'post_type' => [
            'alpha',
            'required',
        ],

        'status' => [
            'alpha',
            'required',
        ],

        ''
    ];

    //    model for all database operations for posts with user and item details joined even to query with search params
    public function getPosts($search = null, $category = null, $limit = 10, $offset = 0, $sort = 'DESC', $sortby = null)
    {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT 
                        p.post_id, p.item_type, p.item_brand, p.item_model, p.post_type, p.post_title, p.post_content, p.status, p.created_at,p.upvote_count, p.downvote_count,p.comment_count, 
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture,                        
                        GROUP_CONCAT(i.image_name) AS images,
                        CAST(CASE WHEN up.user_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS upvoted,
                        CAST(CASE WHEN dw.user_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS downvoted
                    FROM posts p 
                    JOIN users u ON p.user_id = u.user_id
                    LEFT JOIN post_image i ON p.post_id = i.post_id
                    LEFT JOIN upvotes up ON p.post_id = up.post_id AND up.user_id = :user_id1
                    LEFT JOIN downvotes dw ON p.post_id = dw.post_id AND dw.user_id = :user_id2
                    WHERE p.status = 'active'
                    ";

        if ($search) {
            $query .= " AND (p.post_title LIKE '%$search%' OR p.post_content LIKE '%$search%' OR p.item_type LIKE '%$search%' OR p.item_brand LIKE '%$search%' OR p.item_model LIKE '%$search%')";
        }

        if ($category) {
            $query .= " AND p.post_type = '$category'";
        }

        $query .= " GROUP BY p.post_id";

        if ($sortby) {
            $query .= " ORDER BY $sortby $sort";
        }

        if ($sort) {
            $query .= " ORDER BY p.created_at $sort";
        }


        if ($limit) {
            $query .= " LIMIT $limit";
        }

        if ($offset) {
            $query .= " OFFSET $offset";
        }



        $results = $this->query($query, ['user_id1' => $user_id, 'user_id2' => $user_id]);


        return $results;
    }

    public function getPostById($post_id)
    {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT 
                        p.post_id, p.item_type, p.item_brand, p.item_model, p.post_type, p.post_title, p.post_content, p.status, p.created_at,p.upvote_count, p.downvote_count,p.comment_count, 
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture,                        
                        GROUP_CONCAT(i.image_name) AS images,
                        CAST(CASE WHEN up.user_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS upvoted,
                        CAST(CASE WHEN dw.user_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS downvoted
                    FROM posts p 
                    JOIN users u ON p.user_id = u.user_id
                    LEFT JOIN post_image i ON p.post_id = i.post_id
                    LEFT JOIN upvotes up ON p.post_id = up.post_id AND up.user_id = :user_id1
                    LEFT JOIN downvotes dw ON p.post_id = dw.post_id AND dw.user_id = :user_id2
                    WHERE p.status = 'active' AND p.post_id = :post_id
                    GROUP BY p.post_id";

        $result = $this->query($query, ['user_id1' => $user_id, 'user_id2' => $user_id, 'post_id' => $post_id]);

        return $result;
    }

    public function createPost(array $data)
    {
        $user_id = $_SESSION['user_id'];
        $post_type = $data['post_type'];
        $post_title = $data['post_title'];
        $post_content = $data['post_content'];
        $item_type = $data['item_type'];
        $item_brand = $data['item_brand'];
        $item_model = $data['item_model'];
        $status = 'active';

        $arr = [
            'user_id' => $user_id,
            'post_type' => $post_type,
            'post_title' => $post_title,
            'post_content' => $post_content,
            'item_type' => $item_type,
            'item_brand' => $item_brand,
            'item_model' => $item_model,
            'status' => $status
        ];

        $result = $this->insert($arr);

        return $result;
    }

    public function addPostImages($post_id, array $file_names)
    {
        $arr = [];
        foreach ($file_names as $file_name) {
            $arr[] = [
                'post_id' => $post_id,
                'image_name' => $file_name
            ];
        }

        $result = $this->insertMultiple('post_image', $arr);

        return $result;
    }




    private function insertMultiple(string $string, array $arr)
    {
        $query = "INSERT INTO $string (post_id, image_name) VALUES ";
        $query_parts = [];
        $params = [];
        foreach ($arr as $index => $row) {
            $query_parts[] = "(:post_id$index, :image_name$index)";
            $params["post_id$index"] = $row['post_id'];
            $params["image_name$index"] = $row['image_name'];
        }
        $query .= implode(', ', $query_parts);

        $result = $this->query($query, $params);

        return $result;
    }

    public function getPopularPosts()
    {
        $query = "SELECT 
                        p.post_id, p.item_type, p.item_brand, p.item_model, p.post_type, p.post_title, p.post_content, p.status, p.created_at,p.upvote_count, p.downvote_count,p.comment_count, 
                        u.user_id, u.user_name, concat(u.first_name,' ', u.last_name) as user, u.profile_picture,                        
                        GROUP_CONCAT(i.image_name) AS images,
                        CAST(CASE WHEN up.user_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS upvoted,
                        CAST(CASE WHEN dw.user_id IS NULL THEN 0 ELSE 1 END AS SIGNED) AS downvoted
                    FROM posts p 
                    JOIN users u ON p.user_id = u.user_id
                    LEFT JOIN post_image i ON p.post_id = i.post_id
                    LEFT JOIN upvotes up ON p.post_id = up.post_id AND up.user_id = :user_id1
                    LEFT JOIN downvotes dw ON p.post_id = dw.post_id AND dw.user_id = :user_id2
                    WHERE p.status = 'active'
                    GROUP BY p.post_id
                    ORDER BY p.upvote_count DESC
                    LIMIT 5";

        $user_id = $_SESSION['user_id'];
        $result = $this->query($query, ['user_id1' => $user_id, 'user_id2' => $user_id]);

        return $result;
    }
}
