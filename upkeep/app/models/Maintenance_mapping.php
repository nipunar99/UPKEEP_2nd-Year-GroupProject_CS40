
<?php 

class Maintenance_mapping 
{
    use Model;

    protected $table = "maintenance_task_to_template_mapping";

    protected $allowedColumns = [
        "maintenance_task_id",
        "template_task_id"
        
    ];

    public function addMapping($mt_id,$tt_id){
        $arr['maintenance_task_id'] = $mt_id;
        $arr['template_task_id'] = $tt_id;
        $this->insert($arr);
    }
  
       
}

          
        
    
        
    