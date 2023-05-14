<?php

class Itemtemplates
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "id",
        "itemtemplate_name",
        "item_type",
        "status",
        "description",
        "category",
        "lifespan",
        "moderator_id",

    ];
    public function insertItemtemplate($data)
    {

        try {
            $data["moderator_id"] = $_SESSION['ID'];
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
}
