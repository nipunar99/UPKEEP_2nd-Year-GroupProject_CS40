<?php 

class Maintenance_templates 
{
    use Model;

    protected $table = "maintenance_templates";

    protected $allowedColumns = [
       "item_template_id",
        "sub_component",
        "image",
        "description",
        "years",
        "months",
        "weeks",
        "status"
       
       
        
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

          
        
    