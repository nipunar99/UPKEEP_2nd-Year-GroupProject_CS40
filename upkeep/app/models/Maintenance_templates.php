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
     // $sub = $_POST['sub_component'];
        // $description = $_POST['description'];
        // $option = $_POST['maintain'];
       // $image = implode(',',basename($_FILES['image']['name']));
        // $image =  basename($_FILES['image']['name']);
        // $duration = $_POST['duration'];
        // $image = $_POST['image'];
   // public function addSubComponents($id,$sub,$description,$option,$duration,$image){
     public function insertMaintenanceTasks($data){
      
        try{
           // $data["moderator_id"] = $_SESSION['ID'];
            $this->insert($data);   
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }        
        
           
               
     }
     public function deleteTasks($task_ID){
        $query = "delete from maintenance_templates where task_ID = $task_ID";
        return $this->query($query);
    }
        
        // elseif($option=="months"){
        //    // $data["moderator_id"] = $_SESSION['ID'];
        //     $query = "insert into $this->table (item_template_id,sub_component,image,description, months) values('$id','$sub','$image','$description','$duration')";
        //     return $this->query($query); 
        // }
        // elseif($option=="weeks"){
        //    // $data["moderator_id"] = $_SESSION['ID'];
        //     $query = "insert into $this->table (item_template_id,sub_component,image,description,weeks) values('$id','$sub','$image','$description','$duration')";
             
        // }
        // try{
           
        // return $this->query($query); 
        //  }
        //   catch(PDOException $e){
        //       echo $e->getMessage();
        //   } 
       

    public function viewsMaintenanceTasks($id){
        $query = "select i.description,i.task_ID,i.item_template_id, i.sub_component,i.years,i.months,i.weeks from maintenance_templates i where item_template_id = $id ";
          
        return $this->query($query);
    }
}

          
        
    