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
                    if ($_POST['category_id'] == "Electronics") {
                        $category_id = 1;
                    } elseif ($_POST['category_id'] == "Appliances") {
                        $category_id = 2;
                    } elseif ($_POST['category_id'] == "Tools and equipment") {
                        $category_id = 3;
                    } elseif ($_POST['category_id'] == "Vehicles") {
                        $category_id = 5;
                    } elseif ($_POST['category_id'] == "Furniture") {
                        $category_id = 5;
                    } elseif ($_POST['category_id'] == "Home and garden") {
                        $category_id = 6;
                    } else {
                        $category_id = 7;
                    }
                    $data = array(
                        'itemtemplate_name' => $_POST['itemtemplate_name'],
                        'status' => $_POST['status'],
                        'category_id' => $category_id,
                        'description' => $_POST['description'],
                        'image' => $_POST['image']

                    );

                    $itemtemplate = new Itemtemplates;
                    $itemtemplate->insertItemtemplate($data);
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
