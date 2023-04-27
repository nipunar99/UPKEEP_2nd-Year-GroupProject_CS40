<?php

class Itemtemplate
{

    use Controller;

    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['action']) && $_POST['action'] == "addItem") {
                    // if ( $_POST['operation']=="AddNewChildItemtemplate") {
                    $errors = $this->checkValidation();
                    if ($errors === null) {
                        $this->addChildItemtemplate();
                    }
                } elseif ($_POST['operation'] == "update") {
                    $this->checkValidation();
                    $this->UpdateItemtemplate();
                }
            } else {


                $this->view('Moderator/itemTemplate');
            }
        } else {
            redirect("Home/home");
        }
    }


    //show view itemtemplate table
    public function completeItemtemplates()
    {
        $itemtemplates = new Itemtemplates;
        $result = $itemtemplates->completeItemTemplate();
        $result1 = json_encode($result);
        echo ($result1);
    }
    public function checkValidation()
    {

        $errors = [];
        //form validation
        $item_template_id = $_SESSION['item_template_id'];
        $result_obj = new Itemtemplates;
        $result = json_encode($result_obj->findCategoryName($item_template_id));
        $category_name = json_decode($result);

        if ($_POST['category_id'] !== $category_name[0]->category_name) {
            $errors[] = "Category name cannot be changed";
        }
        if ($_POST['parent_id'] !== $item_template_id) {
            $errors[] = "Form data has been changed";
        }

        if (empty($_POST['status'])) {
            $errors[] = "Status is required";
        }

        if (empty($_POST['description'])) {
            $errors[] = "Description is required";
        }
        if (empty($_POST['itemtemplate_name'])) {
            $errors[] = "Item template name is required";
        } else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['itemtemplate_name'])) {
            $errors[] = "Template name should only contain letters and spaces";
        }
        //print if there exists errors in form

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p>" . $error . "</p>";
            }
        } else {
            return null;
        }
    }
    //delete item template 
    public function deleteItems()
    {

        if ($_SESSION['USER'] == $_SESSION['user_id']) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['action']) && $_POST['action'] == "deleteItem") {

                    unset($_POST['action']);
                    $item = new Itemtemplates;
                    $id = $_POST['id'];
                    echo ($id);
                    $item->delete($id);
                }
            }
        } else {
            redirect("Home/home");
        }
    }
    public function viewItem($id)
    {
        $item_template_id = $id[0];
        $_SESSION['item_template_id'] = $item_template_id;


        if (isset($_SESSION['user_id'])) {

            $arr["id"] = $id[0];
            $item = new Itemtemplates;
            $result1 = json_encode($item->getBasicitem($id));
            $data['result'] = $result1;
            $result2 = $item->viewChildItems($id);
            $data1['results'] = $result2;

            $this->view('Moderator/item', $data + $data1);
        } else {
            redirect("Home/home");
        }
    }

    public function addChildItemtemplate()
    {

        $childitem = new Categories;
        $result = json_encode($childitem->getCategoryId($_POST['category_id']));
        $id = json_decode($result);
        $_POST['category_id'] = $id[0]->category_id;

        // if ($_POST['category_id'] == "Electronics") {
        //     $category_id = 1;
        // } elseif ($_POST['category_id'] == "Appliances") {
        //     $category_id = 2;
        // } elseif ($_POST['category_id'] == "Tools and equipment") {
        //     $category_id = 3;
        // } elseif ($_POST['category_id'] == "Vehicles") {
        //     $category_id = 5;
        // } elseif ($_POST['category_id'] == "Furniture") {
        //     $category_id = 5;
        // } elseif ($_POST['category_id'] == "Home and garden") {
        //     $category_id = 6;
        // } else {
        //     $category_id = 7;
        // }

        // show(($category_id));
        $child = new Itemtemplates;

        // $parent_id = $_POST['parent_id'];

        //     $itemtemplate_name  =$_POST['itemtemplate_name']; 
        // $status=$_POST['status'];

        // $description = $_POST['description'];

        //  $data = array(
        //     'parent_id' => $_POST['parent_id'], 
        //     'itemtemplate_name ' => $_POST['itemtemplate_name'], 
        //     'status' => $_POST['status'],
        //    'category_id' => $category_id,
        //     'description' => $_POST['description'],

        //  'image' => $_POST['image']
        // 'image' => $_FILES['image']['image']

        //  );
        $child->insertChildItem($_POST);
        //$child->inser($parent_id,$status,$description,$itemtemplate_name,$category_id);
        //   $child->insert($_POST);

        redirect("Moderator/Itemtemplate");
    }

    public function UpdateItemtemplate()
    {
    }
    public function delChildItem()
    {
        $ids = json_decode($_POST['ids']);
        foreach ($ids as $id) {
            print $id;
            $item = new Itemtemplates;
            $item->deleteChildItemtemplate($id);
        }
        redirect("Moderator/itemtemplate");
    }

    public function editItemtemplate($id)
    {
        $item_template = new Itemtemplates;
        $item = $item_template->getItemtemplateById($id[0]);
        $update_item = json_encode($item);
        echo ($update_item);
    }
}
