<?php

class Itemtemplate
{

    use Controller;

    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['action']) && $_POST['action'] == "addItem") {
                        unset($_POST['action']);
                    $errors = $this->checkValidation();
                    if ($errors === null) {
                        $this->addChildItemtemplate();
                    }
                } elseif (isset($_POST['action']) && $_POST['action'] == "updateItem") {
                    unset($_POST['action']);
                    $errors = $this->checkValidation();
                    if($errors === null){
                        $this->UpdateItemtemplate($_POST);
                    }
                   
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
        }
        else if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['itemtemplate_name'])) {
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
    public function delParentItem()
    {
        $ids = json_decode($_POST['ids']);
        foreach ($ids as $id) {
            print $id;
            $item = new Itemtemplates;
            $item->delete($id);
        }
        redirect("Moderator/itemtemplate");
    }
    public function viewItem($id)
    {
        $item_template_id = $id[0];
        $_SESSION['item_template_id'] = $item_template_id;

        if (isset($_SESSION['user_id'])) {

            $arr["id"] = $id[0];
            $item = new Itemtemplates;
            $result1 = $item->getBasicitem($id);
            $_SESSION['parent_item'] = $result1[0]->itemtemplate_name;
            $data['result'] = json_encode($result1);
            
            $this->view('Moderator/item', $data);
        } else {
            redirect("Home/home");
        }
    }
    public function statisticView(){
        $total_users = new User;
        $count = $total_users->TotalItemOwners();
        $data['total_users'] = $count[0]->{'COUNT(*)'};
        $item_users = new Owneritem;
        $users = $item_users->itemUsersCount($_SESSION['parent_item']);
        $data['item_users'] = $users[0]->{'COUNT(*)'};
         echo (json_encode($data));
    }

    public function viewChildItem()
    {
        $item = new Itemtemplates;
        $result = $item->viewChildItems($_SESSION['item_template_id']);
        $parent = $_SESSION['item_template_id'];
        $result1 = json_encode($result);

        // $result2['parent'] = $parent;
        // // $result2['data'] = $result;
        // $result2=json_encode($result2); 
        echo ($result1);
    }

    public function addChildItemtemplate()
    {

        $childitem = new Categories;
        $result = json_encode($childitem->getCategoryId($_POST['category_id']));
        $id = json_decode($result);
        $_POST['category_id'] = $id[0]->category_id;
        $child = new Itemtemplates;
        $child->insertChildItem($_POST);
        redirect("Moderator/Itemtemplate/");
    }

    public function UpdateItemtemplate($data)
    {
        $childitem = new Categories;
        $result = json_encode($childitem->getCategoryId($data['category_id']));
        $id = json_decode($result);
        $data['category_id'] = $id[0]->category_id;
        $updateitem = new Itemtemplates;
        $updateitem->updateChildItem($_SESSION['i_id'],$data,);
        
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
        $item_id = $id[0];
        $_SESSION['i_id'] = $item_id;
        $item_template = new Itemtemplates;
        $item = $item_template->getItemtemplateById($id[0]);
        $update_item = json_encode($item);
        echo ($update_item);
    }
}
