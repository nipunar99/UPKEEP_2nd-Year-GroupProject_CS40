<?php

class Additemtemplate
{

    use Controller;

    public function index()
    {

        if (isset($_SESSION['user_id'])) {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $errors = [];
                if (empty($_POST['itemtemplate_name'])) {
                    $errors[] = "Template name is required";
                } else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['itemtemplate_name'])) {
                    $errors[] = "Template name should only contain letters and spaces";
                }
                if (empty($_POST['category_id'])) {
                    $errors[] = "Category is required";
                }
                if (empty($_POST['status'])) {
                    $errors[] = "Status is required";
                }

                if (empty($_POST['description'])) {
                    $errors[] = "Description is required";
                }
                if (empty($errors)) {
                    $childitem = new Categories;
                    $result = json_encode($childitem->getCategoryId($_POST['category_id']));
                    $id = json_decode($result);
                    $_POST['category_id'] = $id[0]->category_id;
                    $itemtemplate = new Itemtemplates;
                    $itemtemplate->insertItemtemplate($_POST);
                    redirect("Moderator/addDisposal_places");
                } else {
                    foreach ($errors as $error) {
                        echo "<p>" . $error . "</p>";
                    }
                }
            }
            $this->view('Moderator/addItemtemplate');
        } else {
            redirect("Home/home");
        }
    }
}
