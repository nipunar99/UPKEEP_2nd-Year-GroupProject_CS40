<?php 

class Complaints
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

 
}

          



          
        
    