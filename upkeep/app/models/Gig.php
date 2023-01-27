<?php

class Gig{
    private $table="gigs";
    use Model;


    public function getGigsOfTechnician($technician_id){
        $gigs = $this->where(['user_id'=>$technician_id]);
        return $gigs;
    }

    public function getGig($id){
        $gig = $this->where(['gig_id'=>$id[0]]);
        return $gig;
    }

    public function createGig($details,$technician_id){
        $details['user_id']=$technician_id;

        $file_name = $_FILES['image']['name'];
        $file_temp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];
        
        $location= "../public/assets/images/uploads/gigs".$file_name;

        if($file_size < 524000){
            if(move_uploaded_file($file_temp,$location)){
                try{
                    $data["owner_id"] = $_SESSION['user_id'];
                    $data["image"] = $file_name;
                    // show($data);
                    $this->insert($details);
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
            }
        }
    }
}