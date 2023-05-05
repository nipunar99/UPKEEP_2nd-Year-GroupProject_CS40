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
   
     public function insertMaintenanceTasks($data){
      
        try{
            $data["image"] = $_FILES['image']['name'];
            $this->insert($data);   
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }              
               
      }
      public function updateMaintenanceTask($id,$data){
        try {
            $data['image'] =$_FILES['image']['name'];
            $this->update($id,$data,$data['task_ID']="task_ID");
            
        } catch (PDOException $e) {
             echo $e->getMessage();
        }
      }
     public function deleteTasks($task_ID){
        $query = "delete from maintenance_templates where task_ID = $task_ID";
        return $this->query($query);
    }
    

    public function viewsMaintenanceTasks($id,$parent_id){
        $query = "select i.description,i.task_ID,i.item_template_id, i.sub_component,i.years,i.months,i.weeks from maintenance_templates i where item_template_id = $id OR item_template_id = $parent_id";
        return $this->query($query);
    }
   public function viewParentMaintenances($id){
        $query = "select i.description,i.task_ID,i.item_template_id, i.sub_component,i.years,i.months,i.weeks from maintenance_templates i where item_template_id = $id";  
        return $this->query($query);
   }
    public function getTaskById($id){
        $arr['task_ID'] = $id;
        $task = $this->where($arr);
        // show($task);
        return $task;
    }
}

          
        
    