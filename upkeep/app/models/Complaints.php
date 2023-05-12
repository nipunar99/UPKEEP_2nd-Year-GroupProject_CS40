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
        "user_id",
        "technician_id"
        
    ];
    public function completeComplaints(){
        // $query = "select i.image,i.id, i.itemtemplate_name, i_type.type_name, i.description, i.status from itemtemplate i inner JOIN item_type i_type on  i_type.type_id = i.type_id where parent_id is null ";
        $query = "select comp.item_type, comp.date, comp.user_id from complaint comp inner JOIN users on comp.technician_name = users.user_name && users.user_role = 'technician' status= 'not process yet'";
        return $this->query($query);
    }
    public function unhandle(){
        $query = "select COUNT(*) AS unhandle_count from complaint where status is null";
        return $this->query($query);
       }
}

          
        
    