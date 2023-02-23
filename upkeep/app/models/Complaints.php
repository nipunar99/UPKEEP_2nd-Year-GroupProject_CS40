<?php 

class Complaints
{
    use Model;

    protected $table = "complaint";

    protected $allowedColumns = [
        "complaint_ID",
        "date",
        "category",
        "description",
        "status",
        "owner_id"
        
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

          
        
    