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
        echo "in the gig model";
        $details['user_id']=$technician_id;
        
        show($details);

        $this->insert($details);
    }

    public function findGigs(){
        $query = "select u.first_name ,u.last_name ,g.gig_id,g.title,g.work_tags,g.location,g.user_id from gigs g inner JOIN users u on u.user_id=g.user_id";
        return $this->query($query);
    }

    public function getUserId($Gig_id){
        $query = "select user_id FROM gigs WHERE gig_id = " . $Gig_id. "";
        return $this->query($query);
    }

}