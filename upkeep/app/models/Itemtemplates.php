<?php

class Itemtemplates
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "id",
        "itemtemplate_name",
        "item_type",
        "image",
        "category_id",
        "status",
        "description",
        "moderator_id",
        "parent_id"

    ];
    public function insertItemtemplate($data)
    {

        try {
            $data["moderator_id"] = $_SESSION['user_id'];

            $this->insert($data);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        // public function viewItem($data){
        //     try{
        //         $data["moderator_id"] = $_SESSION['ID'];
        //         $this->insert($data);   
        //     }
        //     catch(PDOException $e){
        //         echo $e->getMessage();
        //     }        
            // $sql = "select * from `itemtemplate` where id=:id";
        // }  
        }

    public function getTotalItems(){
        $query ="SELECT status, COUNT(status) AS count FROM itemtemplate WHERE status='Approved' or status='Pending' ";
        // $data['status1']='Approved';
        // // $query = "SELECT * FROM itemtemplate WHERE status =:status";
        // $data['status2']='Pending';
        return $this->query($query);
}
    public function getTotalPendingItems(){
        $query ="SELECT status, COUNT(status) AS count FROM itemtemplate WHERE status='Pending' ";
        
        return $this->query($query);
}

    public function getAllItemsDetails(){
        $query = "SELECT * FROM itemtemplate";
        return $this->query($query);
    }
    //view parent id null itemtemplates
    public function completeItemTemplate()
    {
        // $query = "select i.image,i.id, i.itemtemplate_name, i.description, i.status,i.moderator_id, c.category_name,COUNT(it.item_type) AS user_count from $this->table i inner JOIN categories c on c.category_id = i.category_id left JOIN items it on it.item_template_id = i.id where i.parent_id = 0 AND i.moderator_id > 0 ";
        $query = "select i.image,i.id, i.itemtemplate_name, i.description, i.status,i.moderator_id, c.category_name from $this->table i inner JOIN categories c on c.category_id = i.category_id where i.parent_id = 0 AND i.moderator_id > 0 ";
        return $this->query($query);
    }

    public function getBasicitem($id)
    {
        $query = "select i.image,i.id,i.category_id, i.itemtemplate_name, c.category_name, i.status from itemtemplate  i inner JOIN categories c on  c.category_id = i.category_id where id = $id[0]";
        return $this->query($query);
    }

    public function insertChildItem($data)
    {
        try {
            $data["moderator_id"] = $_SESSION['user_id'];
            $data['image'] = $_FILES['image']['name'];
            $this->insert($data);
            show($this->insert($data));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function viewChildItems($id)
    {
        $query = "select itemtemplate.category_id, itemtemplate.status, itemtemplate.description, itemtemplate.parent_id, categories.category_name, itemtemplate.itemtemplate_name, itemtemplate.id from itemtemplate  inner JOIN categories on  categories.category_id = itemtemplate.category_id where parent_id = $id && moderator_id > 0";
        return $this->query($query);
    }

    public function updateChildItem($id, $data)
    {
        try {
            $data["moderator_id"] = $_SESSION['user_id'];
            $data['image'] = $_FILES['image']['name'];
            $this->update($id, $data, $data['id'] = "id");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteChildItemtemplate($id)
    {
        $this->delete($id);
    }
        
    
    // public function viewItem($data){
    //     try{
    //         $data["moderator_id"] = $_SESSION['ID'];
    //         $this->insert($data);   
    //     }
    //     catch(PDOException $e){
    //         echo $e->getMessage();
    //     }        
    // $sql = "select * from `itemtemplate` where id=:id";
    // }
    public function getAllItemTemplates()
    {
        $query = "SELECT 
                        c.*, it.id , it.itemtemplate_name
                    FROM categories c 
                    LEFT JOIN itemtemplate it ON it.category_id = c.category_id AND it.parent_id = 0
                    GROUP BY c.category_name, it.itemtemplate_name";

        $result = $this->query($query);

        //create an array as [all categories with templates] = (category_name ,category_id,templates[] -> [template_name -> name, id -> id ] )im using pdo objects
        $categories = [];
        $i = 0;
        $j = 0;
        foreach ($result as $row) {
            if (!isset($categories[$i]['category_name'])) {
                $categories[$i]['category_name'] = $row->category_name;
                $categories[$i]['category_id'] = $row->category_id;
                $categories[$i]['itemtemplates'][$j]['itemtemplate_name'] = $row->itemtemplate_name;
                $categories[$i]['itemtemplates'][$j]['id'] = $row->id;
                $j++;
            } else {
                if ($categories[$i]['category_name'] == $row->category_name) {
                    $categories[$i]['itemtemplates'][$j]['itemtemplate_name'] = $row->itemtemplate_name;
                    $categories[$i]['itemtemplates'][$j]['id'] = $row->id;
                    $j++;
                } else {
                    $i++;
                    $j = 0;
                    $categories[$i]['category_name'] = $row->category_name;
                    $categories[$i]['category_id'] = $row->category_id;
                    $categories[$i]['itemtemplates'][$j]['itemtemplate_name'] = $row->itemtemplate_name;
                    $categories[$i]['itemtemplates'][$j]['id'] = $row->id;
                    $j++;
                }
            }
        }



        return $categories;

        //        return $result;
    }



    public function findCategoryName($id)
    {
        $query = "select c.category_name from $this->table i inner JOIN categories c on  i.category_id = c.category_id where id = $id";
        return $this->query($query);
    }


    public function getItemtemplateById($id)
    {
        $query = "select i.itemtemplate_name,i.id,i.status, i.image, c.category_name, i.description from $this->table i inner JOIN categories c on i.category_id = c.category_id where id = $id";
        return $this->query($query);
    }

    // public function getItemtemplateDetails($id){
    //     $query = "select *, categories.category_name  from $this->table inner JOIN categories where categories.category_id = $this->table.category_id AND $this->table.id = $id";
    //     return $this->query($query);
    // }

    public function countItemtemplate()
    {
        $query = "select COUNT(*) AS total_templates FROM $this->table";
        return $this->query($query);
    }
    public function countTotalItemtemplate()
    {
        $query = "select COUNT(*) FROM $this->table where status = 'Approved' ";
        return $this->query($query);
    }

    public function countPendingItemtemplate()
    {
        $query = "SELECT COUNT(*) AS pending_templates FROM $this->table where status='pending'";
        return $this->query($query);
    }
    public function getItemcountByCategories()
    {
        $query = " select c.category_name AS category , COUNT(*) AS total_item from itemtemplate AS i JOIN categories AS c ON i.category_id = c.category_id  where moderator_id > 0 GROUP BY c.category_id";
        return $this->query($query);
    }
    public function getItemSuggestionscountByCategories()
    {
        $query = " select c.category_name AS category , COUNT(*) AS total_item from itemtemplate AS i JOIN categories AS c ON i.category_id = c.category_id  where moderator_id = 0 GROUP BY c.category_id";
        return $this->query($query);
    }
    public function getSuggestionDetails()
    {
        $query = "select c.category_name, i.itemtemplate_name, i.image,i.id,i.description from $this->table i inner JOIN categories c on i.category_id = c.category_id where moderator_id = 0 AND status='Pending'";
        return $this->query($query);
    }
    public function approveItemSuggestion($id)
    {
        $moderator_id = $_SESSION['user_id'];
        $query = "update $this->table set status = 'Approved', moderator_id = '$moderator_id' where id=$id";
        return $this->query($query);
    }
    public function searchItem($search_text){
        $query = "select i.itemtemplate_name,c.category_name,i.image from $this->table i inner JOIN categories c on c.category_id = i.category_id where moderator_id = 0 AND status = 'Pending' AND itemtemplate_name = '$search_text'";
        return $this->query($query);
    }
}
