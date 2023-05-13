<?php

class Gigs{

    use Controller;
    use Auth;

    public static $enter = 0;

    public function index(){
        $this->technicianAuth();

        $gigs = new Gig;
        $gigList = $gigs->getGigsOfTechnician($_SESSION["user_id"]);
        $data['gigList'] = $gigList;



        $templates = new Itemtemplates;
        $data['templates'] = json_encode($templates->getAllItemTemplates());

        $this->view(('Technician/gigs'), $data);
    }

    /**
     * @throws Exception
     */
    public function addgig(){
        $gigs = new Gig;

        //handle data
        $arr['title'] = $_POST['title'];
        $arr['description'] = $_POST['description'];
        $arr['items'] = $_POST['items'];
        $arr['location'] = $_POST['location'];
        $arr['delivery_method'] = $_POST['delivery_method'];

        //create gig
        $gigID = $gigs->createGig($arr, $_SESSION["user_id"]);

        //add images
        $directory = "\\xampp\\htdocs\\upkeep\\upkeep\\public\\assets\\images\\gig_images";

        $fileUpload = new FileUploader($directory);
        $fileNames = $fileUpload->uploadMultipleFiles($_FILES['images']);

        $gigs->addGigImages($gigID, $fileNames);

    }

    public function viewGig($id){

        if (!isset($_SESSION["user_name"]) && $_SESSION["user_role"] != "technician") {
            redirect('/Home');
        }

        $gig = new Gig;
        $profile = new User;
        $gigDetails = $gig->getGig($id);
        $profileDetails = $profile->getTechnicianById($gigDetails[0]->user_id);

        $gig_reviews = new Gigreviews;
        $gigReviews = $gig_reviews->getGigReviews($id[0]);


        $data['gigDetails'] = $gigDetails;
        $data['profileDetails'] = $profileDetails;
        $data['gigReviews'] = $gigReviews;


        $this->view('Technician/singlegig', $data);
    }

}
