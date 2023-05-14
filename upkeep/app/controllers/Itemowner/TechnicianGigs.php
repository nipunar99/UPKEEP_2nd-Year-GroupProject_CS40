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
    public function postJob(){

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_POST['action']) && $_POST['action']=="addJob"){
                unset($_POST['action']);unset($_POST['item_name']);

                $arr['address'] = $_POST['address'];
                $arr['district'] = $_POST['district'];
                $arr['city'] = $_POST['city'];
                unset($_POST['city']);unset($_POST['district']);unset($_POST['address']);

                $_POST['user_id'] = $_SESSION['user_id'];
                // $_POST['gig_id'] = $_SESSION['gig_id'];

                // $gig = new Gig;
                // $technician_id = $gig->getUserId($_SESSION['gig_id']);
                // $_POST['technician_id'] =  $technician_id[0]->user_id;

                $job = new jobs;
                $address = new Address;

                if($_POST['address_id']!=''){
                    // show('ok');
                    $job->insert($_POST);
                }else{
                    $_POST['address_id']=$address->insertAndGetLastIndex($arr);
                    $job->insert($_POST);
                }
                show($_POST);
            } 
        }

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

    public function myorders(){
        $jobs = new Jobs;

        $myPostedJobs = $jobs->getMyPostedJobs($_SESSION['user_id']);

        $data['myjobs'] = $myPostedJobs;

        $this->view('Itemowner/myjobs',$data);

    }

    public function vieworder($id){
        $jobs = new Jobs;
        $job = $jobs->getMyPostedSingleJob($_SESSION['user_id'],$id[0]);
//        $item = new IO_Owneritem;
//        $item_details = $item->getItemDetailsForJob($job->item_id);

        $job_application = new Job_apply;
        $applied_technicians = $job_application->getApplicationsByJobId($id[0]);

        $data["user_role"] = $_SESSION["user_role"];
        $data["user_id"] = $_SESSION["user_id"];
        $data["job"] = $job;
//        show($job);
//        $data["item_details"] = $item_details;
        $data["applied_technicians"] = $applied_technicians;
        $this->view('Itemowner/job_for_io',$data);
    }

} 
