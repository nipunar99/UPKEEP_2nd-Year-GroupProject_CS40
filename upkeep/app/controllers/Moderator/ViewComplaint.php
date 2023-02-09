
<?php

class ViewComplaint {

    use Controller;
    public function index (){
         $data = [];
        if(isset($_SESSION['user_id'])){
            $arr=[];
            $complaints = new Complaints;
            $result = $complaints->findAll();
            $data['result'] = $result;

            $this->view('Moderator/viewComplaint',$data);
        }else{
            redirect("Home/home");
        }

    }

}
