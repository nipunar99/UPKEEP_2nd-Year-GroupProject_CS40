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

    public function getComplaints(){
        // $query = "Select * from complaints Where complaint_type =:complaint_type" ;
        // $data['complaint_type']='False_advertising';
        // // $abc =$this->query($query,$data);
        // // return $abc;


        // // $query = "Select u.*, m.nic, m.address from users u INNER JOIN moderators m ON u.user_id=m.user_id  Where user_role =:user_role";
        // // $data['user_role']='moderator';
        // $aa = $this->query($query,$data);
        // return $aa;
    }

    public function getComplaint(){
    $query ="Select c.complaint_id, c.post_id, c.complaint_type, c.status, c.description, c.date_created, c.technician_id, c.user_id, ut.user_id, ut.first_name, ut.last_name, ut.identity_verification from complaints c INNER JOIN 
        (SELECT u.user_id, u.first_name, u.last_name, t.identity_verification from technicians t INNER JOIN users u ON u.user_id = t.user_id ) ut 
        ON c.user_id=ut.user_id";

        $result=$this->query($query);


        return $result;
    }

    public function getTotalComplaints(){
        //$query ="SELECT COUNT(*) AS count FROM users WHERE user_role =:user_role1 OR user_role=:user_role2;";
        $query ="SELECT technician_id, COUNT(technician_id) AS count FROM complaints GROUP BY technician_id";
        $data['technician_id']='user_id';
        
        $cc = $this->query($query);

        return $cc;



    }

    // public function getAllComplaints(){
    //     $query = "SELECT * FROM complaints";
    //     return $this->query($query);
    // }

    

    

 
}

          



          
        
    