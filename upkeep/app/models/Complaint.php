<?php 

class Complaint
{
    use Model;

    public $d;

    protected $table = "complaints";

    public function index(){
        echo "hello";
    }

    public function getUserComplaints(){
        $query = "Select u.*, c.user_id, c.post_id, c.complaint_type, c.description, c.date_created from users u INNER JOIN complaints c ON u.user_id=c.user_id ";
        // $data['user_role']='technician';
        // $data['user_role2']='technician';
        // $query = "Select * from complaints";
        
        $aa = $this->query($query);
        return $aa;
    } 


    public function getComplaint(){
        $query = "SELECT c.*, u.user_id, u.user_name FROM
                        complaints c
                    INNER JOIN users u 
                    ON c.user_id = u.user_id
                    ";

                    return $this->query($query);
    }

    public function getTotalComplaints(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT user_id, COUNT(user_id) AS count FROM complaints WHERE 'user_id'=user_id ";
        // $data['technician_id']='user_id';
    
        return $this->query($query);



    }
    public function getComplaintForStatistic(){
        $query = "SELECT c.*, u.user_id, u.first_name, u.last_name FROM complaints c  
        INNER JOIN
                 users u ON c.user_id=u.user_id";
        
        return $this->query($query);


}

    

    

 
}

          



          
        
    