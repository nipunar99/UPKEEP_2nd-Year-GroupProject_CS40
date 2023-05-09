<?php

class ViewGig {

    use Controller;
    public function index (){
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            // $this->view('Itemowner/viewgig');
        }else{
            redirect("Home/home");
        }
    }

    public function selectGig($id){
        if($_SESSION['user_id'] == $_SESSION['user_id']){
            
            $_SESSION['gig_id'] = $id[0];
            $gig = new Gig;
            $profile = new User;
            $gigDetails = $gig->getGig($id);
            $profileDetails = $profile->getUserById($gigDetails[0]->user_id);
            
            $data['gigDetails']=$gigDetails;
            $data['profileDetails']=$profileDetails;
            $this->view('Itemowner/viewgig',$data);
        }else{
            redirect("Home/home");
        }
    
    }

    public function getAllItem(){
        $arr = [];
        $arr["owner_id"] = $_SESSION['user_id'];
        $items = new IO_Owneritem;
        $result = $items->where($arr);
        $json = json_encode($result);
        echo($json);
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
                $_POST['gig_id'] = $_SESSION['gig_id'];

                $gig = new Gig;
                $technician_id = $gig->getUserId($_SESSION['gig_id']);
                $_POST['technician_id'] =  $technician_id[0]->user_id;

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

    public function getAddresses(){
        $address = new Address;
        $result = $address->getLastAddress();
        $json = json_encode($result);
        echo($json);
    }

//     public function getTechnicianId($id) {
//         $gig = new Gig;
//         $gig->where()
//     }
}
