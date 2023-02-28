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
            $query = "select i.image,i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate i inner JOIN item_type i_type on  i_type.type_id = i.type_id ";
            return $this->query($query);
        }
       public function item($id){
        
        $query = "select i.image,i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate  i inner JOIN item_type  i_type on  i_type.type_id = i.type_id where id = $id[0]";
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

          
        
    