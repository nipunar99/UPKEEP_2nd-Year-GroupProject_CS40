<?php

class Gig{
    private $table="gigs";
    use Model;


    public function getGigsOfTechnician($technician_id){
        $gigs = $this->where(['user_id'=>$technician_id]);
        return $gigs;
    }

    public function createGig($details,$technician_id){
        $details['user_id']=$technician_id;
        $this->insert($details);
    }
}