<?php 

class Categories 
{
    use Model;

    protected $table = "categories";

    protected $allowedColumns = [
        "category_id",
        "category_name"
        
    ];
    public function insertItemtemplate($data){

        try{
            $data["moderator_id"] = $_SESSION['ID'];
            $this->insert($data);   
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }        
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
        public function getCategoryId($category_name){
            $query = "select category_id from $this->table where category_name = '$category_name' ";
            echo($category_name);
            return $this->query($query);
        }
}

          
        
    