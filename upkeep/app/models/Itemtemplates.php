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

    public function getApprovedItems(){
        $query2 ="SELECT status, COUNT(status) AS count FROM itemtemplate GROUP BY status";
        $data['status1']='Approved';
        // $query = "SELECT * FROM itemtemplate WHERE status =:status";
        $data['status2']='Pending';
        return $this->query($query2);




    }







    }


          
        
    