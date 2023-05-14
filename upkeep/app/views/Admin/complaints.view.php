<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/findjobs.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/complaints.css">


</head>
<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?=ROOT?>/assets/images/logo.png" alt="">
                    <img src="<?=ROOT?>/assets/images/title.png" alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?> /Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?=ROOT?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Administrative Users</h3>
                </a>
                <a href="<?=ROOT?>/Admin/UserTab">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>


                <a href="#" class="active">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?=ROOT?>/Admin/ItemTemplate" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?> /Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        <main>
            <div class="header nbs">
                    <div class="left">

                    </div>
                    <div class="center">
                        <h1>Complaints</h1>
                    </div>
                    <div class="right">
                        <div class="notification">
                            <span class="material-icons-sharp">notifications</span>
                        </div>

                        <div class="profile" id="profile">
                            <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                            <div class="info">
                                <div class="name">
                                    <p><?= $_SESSION['USER']->first_name . " " . $_SESSION['USER']->last_name ?></b></p>
                                </div>
                                <small class="text-muted role"><?= ucfirst($_SESSION['user_role']) ?></small>
                            </div>
                            <div class="profile-photo">
                                <div><img src="<?= ROOT ?>/assets/images/user.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            
<!-- 
            <div class="mainhead">
                
                <h1>Complaints</h1>

                <div class="heading">
                    <div class="top">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>
        
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp">dark_mode</span>
                        </div>

                        <div class="profile">
                            <div class="info">
                                <p>Hey,<b>Saman</b></p>
                                <small class="text-muted">User</small>
                            </div>
                            <div class="profile-photo">
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            
            <div class="content">
                <div class="action-bar">
                    <div class="button-container">
                        <div class="search-bar-container">
                            <input type="text" placeholder="Search...">
                            <button class="search-button"><span class="material-icons-sharp">search</span></button>
                        </div>
                        
                        <!-- <button  ></button> -->

                    </div>
                </div>

                <div class="table-container">
                    <table class="technician-table">
                        <thead>
                            <tr>
                            
                            <th>Complaint Id</th>
                            <th>Post Id</th>
                            <th>Complaint Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                            <?php if(!empty($complaint)):?>                                    
                                <?php for($i=0;$i<count($complaint);$i++):?>
                                    <tr data-complaintdetails = <?=json_encode($complaint[$i])?>>
                                            
                                        <td><?=$complaint[$i]->complaint_id ?></td>
                                        <td><?=$complaint[$i]->post_id ?></td>
                                        <td><?=$complaint[$i]->complaint_type ?></td>
                                        <td><?=$complaint[$i]->description ?></td>
                                        <td><?=$complaint[$i]->status ?></td>
                                        <td>
                                            <div class="btn-container">
                                                <button id ="view_btn" data-postid=<?=$complaint[$i]->post_id?> data-userid=<?=$complaint[$i]->user_id?> class="view-button">View</button> 
                                                <!-- <button id ="delete_btn" class="remove-button">Remove</button> -->
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                                <?php endfor;?>
                            <?php endif;?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            

            
            
       
            </div>

        </main>
        <!-- End of Main -->
        <div class="overlay hidden" id="overlay"></div>
        <div class="popup hidden" id="remove_complaint">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <div class="content">
                    <h2>Confirm deletion of this Complaint</h2>
                </div>
                
                <form class="mobile-verify" id="complaint_action" method="post" enctype="" >
                    <div class ="head" >
                        <h3>Are you sure you you want to remove this complaint?</h3>
                    </div>
                    <div class="btn-container">
                                <button id="remove_complaintBtn">Yes,I'm Sure</button>
                                <button id="cancel">Cancel</button>
                        </div>
                </form>
            </div>
            <div class="content hidden" id="msg">
                
            </div>
        </div>


        <div class="popup hidden" id="view_complaint">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <div class="header nbs">
                    <div class="center">
                        <h1>Complaint</h1>
                    </div>
                </div>
                <div class="complaint-box">
                    <div class="post-details">
                    
                
                </div>
                    
                    <div class="complaint-details">
                            <h2 id="complaint_details">Complaint Details</h2>
                        <div class="content">
                            <div class ="complaint-data">
                                <div>
                                    <h2 id="head">Complaint Id</h2>
                                    <h3 id="complaint_id"></h3>
                                </div>
                                <div>
                                    <h2 id="head">Complaint Type</h2>
                                    <h3 id="complaint_type"></h3>
                                </div>
                            </div>
                            <div class ="complaint-data">
                                <div>
                                    <h2 id="head">Description</h2>
                                    <h3 id="description"></h3>
                                </div>
                                <div>
                                    <h2 id="head">Status</h2>
                                    <h3 id="status"></h3>
                                </div>
                            </div>
                        </div>
                            


                    </div>
                    <div class="complaint_btn">
                        <div>
                            <button  id="remove_postBtn">Remove</button></div>
                        <div class="ignore">
                            <button onclick="removePost()" id="ignore_btn">Ignore</button></div>
                    </div>
            </div>
            <div class="content hidden" id="msg">
                <h1>delete the post....</h1>

            </div>
        </div>

        <div class="popup hidden" id="remove_complaint_action">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <div class="content">
                    <h2>Confirm deletion of this Complaint</h2>
                </div>
                
                <form class="mobile-verify" id="" method="post" enctype="" >
                    <div class ="head" >
                        <h3>Are you sure you you want to remove this complaint?</h3>
                    </div>
                    <div class="btn-container">
                                <button id="remove_complaintBtn">Yes,I'm Sure</button>
                                <button id="cancel">Cancel</button>
                        </div>
                </form>
            </div>
            <div class="content hidden" id="msg">
                
            </div>
        </div>

        <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
        ?>

        <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/communityComplaint.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/complaint.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/updateadminusers.js"></script>  

        

</body>
</html>