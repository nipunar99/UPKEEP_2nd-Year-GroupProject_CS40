<?php 

class Itemsuggestions 
{
    use Model;

    protected $table = "maintenances";

    protected $allowedColumns = [
        "name",
        "type",
      
        "description",
       
        "moderator_id",
        
    ];
    public function insertItemtemplate1($data){

        try{
            $data["moderator_id"] = $_SESSION['ID'];
            $this->insert($data);   
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }        
        }

      
}

          
        
    