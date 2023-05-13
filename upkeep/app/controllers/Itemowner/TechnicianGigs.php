<?php

class TechnicianGigs {

    use Controller;

    public function index(){

        if($_SESSION['user_id'] == $_SESSION['user_id']){
            $this->view('Itemowner/technicianGigs');

        }else{
            redirect("Home/home");
        }

        
    }

    public function findAllGigs(){
        $gigs = new Gig;
        $gigList = $gigs->findGigs();
        $tags = $gigList[0]->items;
        
        foreach($gigList as $gig){
            $tags = $gig->items;
            $spitTags = $this->spiltWordTagstoJson($tags);
            $gig->items = $spitTags;
        }
        
        $result = json_encode($gigList);
        echo($result);

    }

    public function filterGigs(){
        $items = $_POST['items'];
        $location = $_POST['location'];

        $gigs = new Gig;
        $gigList = $gigs->filtergigs($items,$location);

        $tags = $gigList[0]->items;
        
        foreach($gigList as $gig){
            $tags = $gig->items;
            $spitTags = $this->spiltWordTagstoJson($tags);
            $gig->items = $spitTags;
        }


        $json = json_encode($gigList); 
        echo($json);

        // show($json);
        // return $json;

    }

    public function spiltWordTagstoJson($tags){

        $words = explode(",", $tags); 

        $json_array = array();
        foreach ($words as $word) {
            array_push($json_array, $word); 
        }

        $json = json_encode($json_array); 

        return $json;

    }

} 
