<?php

class ViewGig {

    use Controller;
    public function index (){
        if($_SESSION['USER'] == $_SESSION['user_id']){
            // $this->view('Itemowner/viewgig');
        }else{
            redirect("Home/home");
        }
    }

    public function selectGig($id){
        if($_SESSION['USER'] == $_SESSION['user_id']){
      
            $gig = new Gig;
            $profile = new User;
            $gigDetails = $gig->getGig($id);
            $profileDetails = $profile->getUserById($gigDetails[0]->user_id);

            echo "here";
            // print_r($gigDetails);
            // print_r($profileDetails);
            
            $data['gigDetails']=$gigDetails;
            $data['profileDetails']=$profileDetails;
        
            // echo "hello";
            // show($data);
            // show($gigDetails);
            // show($data['gigDetails']);
            $this->view('Itemowner/viewgig',$data);
        }else{
            redirect("Home/home");
        }
    
    }
}
