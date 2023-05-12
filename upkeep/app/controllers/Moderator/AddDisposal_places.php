<?php

class AddDisposal_places
{

    use Controller;

    public function index()
    {

        if (isset($_SESSION['user_id'])) {

            if( ($_SERVER['REQUEST_METHOD'] == "POST") && ($_POST['action']=='addDisposal_places') ){
                unset($_POST['action']);
                $errors = [];
                if (empty($_POST['place_name'])) {
                    $errors[] = "Place name is required";
                }
                if (empty($_POST['category_id'])) {
                    $errors[] = "Category is required";
                }
                if (empty($_POST['city'])) {
                    $errors[] = "City is required";
                } else if (!preg_match("/^[a-zA-Z]+$/", $_POST['city'])) {
                    $errors[] = "City should only contain letters";
                }
                if (empty($_POST['iframe_link'])) {
                    $errors[] = "Iframe link is required";
                }

                if (preg_match('/^(https?:\/\/)(www\.)?(google\.com\/maps\/embed\?pb=)[\w-]+/', $_POST['iframe_link'])) {
                }
                //   } else {
                //     $errors[] =  "Invalid iframe link";
                //   }

                if (empty($errors)) {
                    $item = new Categories;
                    $result = json_encode($item->getCategoryId($_POST['category_id']));
                    $id = json_decode($result);
                    $_POST['category_id'] = $id[0]->category_id;
                    $itemDisposal = new DisposalMaps;
                    $itemDisposal->insertDisposalplaces($_POST);
                    redirect("Moderator/itemtemplate");
                } else {
                    foreach ($errors as $error) {
                        echo "<p>" . $error . "</p>";
                    }
                }
                redirect("Moderator/itemtemplate");
            }
            
            $this->view('Moderator/addDisposal_places');
        } else {
            redirect("Home/home");
        }
    }
}
