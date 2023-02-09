<?php 

class Items
{
    use Model;

    protected $table = "itemtemplate";

    protected $allowedColumns = [
        "itemtemplate_name",
        "item_type",
        "status",
        "description",
        "category",
        "lifespan",
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
}

          
        
    