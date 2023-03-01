<?php 

class Itemtemplates 
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "id",
        "itemtemplate_name",
        "item_type",
        "type_id",
        "status",
        "description",
        "moderator_id",
        
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

        public function completeItemTemplate(){
            $query = "select i.image,i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate i inner JOIN item_type i_type on  i_type.type_id = i.type_id where parent_id is null ";
            return $this->query($query);
        }
       public function item($id){
        
        $query = "select i.image,i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate  i inner JOIN item_type  i_type on  i_type.type_id = i.type_id where id = $id[0]";
        return $this->query($query);
        // $qu = "select itemtemplate_name where id = $id";
        // return(category($qu));

    

       }
       public function name($category_name){
        $query = "select category where  itemtemplate_name = $category_name[0]";
        return $this->query($query);
       }
       public function category($category_name){
        $query = "select category where  itemtemplate_name = $category_name[0]";
        return $this->query($query);
       }

        public function pending(){
         $query = "select * from itemtemplate where status='Pending'";
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
}

          
        
    