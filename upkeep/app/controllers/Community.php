<?php

class Community
{

    use Controller;
    use Auth;

    public function index()
    {
        $this->checkAuth();

        if ($_SESSION['user_role'] == 'item_owner') {
            $item = new IO_Owneritem;
            $data['my_items'] = json_encode($item->getItemsByOwnerIdForCommunity($_SESSION['user_id']));
        }

        $templates = new Itemtemplates;
        $data['templates'] = json_encode($templates->getAllItemTemplates());


        $this->view('community', $data);
    }

    public function templates()
    {
        $templates = new Itemtemplates;
        $data = json_encode($templates->getAllItemTemplates());
        show($data);
    }

    //    fetch post details

    public function getPosts()
    {
        //set search parameters from get request
        if (isset($_GET['search'])) {
            $search = ($_GET['search'] == 'null') ? null : $_GET['search'];
        } else {
            $search = null;
        }

        if (isset($_GET['post_type'])) {
            $category = ($_GET['post_type'] == 'null') ? null : $_GET['post_type'];
        } else {
            $category = null;
        }

        if (isset($_GET['limit'])) {
            $limit = ($_GET['limit'] == 'null') ? null : $_GET['limit'];
        } else {
            $limit = 10;
        }

        if (isset($_GET['page'])) {
            $page = ($_GET['page'] == 'null') ? null : $_GET['page'];
            $offset = ($page - 1) * $limit;
        } else {
            $offset = 0;
        }



        $post =  new Post;
        $posts = $post->getPosts($search, $category, $limit, $offset);
        echo json_encode($posts);
    }

    public function upvotePost()
    {
        $post_id = $_POST['post_id'];
        $user_id = $_SESSION['user_id'];

        $post = new Upvote;
        $result = $post->upvotePost($post_id, $user_id);
        if ($result) {
            echo json_encode(['success' => 'upvoted']);
        } else {
            echo json_encode(['success' => 'removed_upvote']);
        }
    }

    public function downvotePost()
    {
        $post_id = $_POST['post_id'];
        $user_id = $_SESSION['user_id'];

        $post = new Downvote;
        $result = $post->downvotePost($post_id, $user_id);
        http_response_code(200);
        if ($result) {
            echo json_encode(['success' => 'downvoted']);
        } else {
            echo json_encode(['success' => 'removed_downvote']);
        }
    }

    public function createPost()
    {
        $this->checkAuth();
        $post = new Post;

        $arr = [
            'user_id' => $_SESSION['user_id'],
            'item_type' => $_POST['item_type'],
            'item_brand' => $_POST['item_brand'],
            'item_model' => $_POST['item_model'],
            'post_type' => $_POST['post_type'],
            'post_title' => $_POST['title'],
            'post_content' => $_POST['content'],
            'status' => 'active'
        ];

        if(isset($_POST['item_id'])){
            $arr['item_id'] = $_POST['item_id'];
        }

        try {
            $post_id = $post->insertAndGetLastIndex($arr);

            if (isset($_FILES['images'])) {
                $directory = "\\xampp\\htdocs\\upkeep\\upkeep\\public\\assets\\images\\post_images";
                //file size is 6MB
                $fileuploader = new FileUploader($directory, fileSizeLimit: 6000000);
                $file_names = $fileuploader->uploadMultipleFiles($_FILES['images']);
                $post->addPostImages($post_id, $file_names);
            }

            //get post details
            $post_details = $post->getPostById($post_id);

            http_response_code(200);
            echo json_encode(['success' => 'post created successfully', 'post' => $post_details[0]]);
        } catch (PDOException | Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'post not created']);
        }
    }

    public function getComments($post_id)
    {
        $comment = new Comment;
        $comments = $comment->getCommentsByPostId($post_id[0]);
        echo json_encode($comments);
    }

    public function getItemDataById($item_id)
    {
        $item = new IO_Owneritem;
        $item_data = $item->getItemDetailsForJob($item_id[0]);
        echo json_encode($item_data);
    }

    public function createComment()
    {
        $this->checkAuth();
        $comment = new Comment;

        $arr = [
            'user_id' => $_SESSION['user_id'],
            'post_id' => $_POST['post_id'],
            'comment' => $_POST['comment'],
        ];

        try {
            $comment_id = $comment->insertAndGetLastIndex($arr);

            //get comment details
            $comment_details = $comment->getCommentById($comment_id);

            http_response_code(200);
            echo json_encode(['success' => 'comment_created', 'comment' => $comment_details[0]]);
        } catch (PDOException | Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'comment_not_created', 'message' => $e->getMessage()]);
        }
    }

    public function getPopularPosts()
    {
        $post = new Post;
        $posts = $post->getPopularPosts();
        echo json_encode($posts);
    }
}
