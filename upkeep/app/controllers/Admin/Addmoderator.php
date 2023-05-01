<?php

class Addmoderator {

    use Controller;
    
    //public function index (){
        
    //      if($_SESSION['USER'] == 'Admin'){
    //         $data =[];
    //         if($_SERVER['REQUEST_METHOD'] == "POST"){
    //             $mod = new AddMod;
                  
    //             $mod->insert($_POST);
    //             redirect("Admin/Addmoderator");
                
                                
    //         }

    //          $this->view('Admin/addmoderator');
             
    //      }
    //      else{
    //          redirect("Home/home");
    //      }
        
    //  }

     public function index(){
        
        if(!isset($_SESSION["user_name"]) && $_SESSION["user_role"]!="admin"){

            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $mod = new User;
                $mod->insertModerator($_POST);
                // redirect("Itemowner/additem/adddoc");

            }
            $this->view('Admin/adminDashboard');
            redirect('/Home');
        }else
            $admin = new User;
            $admin_list = $admin->getAllAdmin();
            $data['admin'] = $admin_list;
            //show($admin_list);
            $this->view('Admin/addmoderator',$data);
        }    
    
    }

//     require_once 'localhost/upkeep/upkeep/app/models/AddMod.php';

//     // Call the model function to retrieve the data
//     $table_data = get_table_data();

//     // Pass the data to the view
//     require_once 'localhost/upkeep/upkeep/app/views/Admin/adminDashboard.view.php';
// 





    