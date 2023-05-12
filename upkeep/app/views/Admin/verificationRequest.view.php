<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/verificationRequest.css">
</head>
<body>
    <div class="container">
    <aside>
            <div class="top">

                <div class="logo">
                    <img src=<?=ROOT."/assets/images/logo.png"?> alt="">
                    <img src=<?=ROOT."/assets/images/title.png"?> alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Admin/AdminDashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#"class="active">
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

                <a href="<?=ROOT?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?=ROOT?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                
                <a href="<?=ROOT?> /Home/home">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <h1>Verification Request</h1>
            <div>
                <h2>NIC Details</h2>
            </div>

            <div class="grid-container">
                
                
                    <div class="item">
                        <div class="photo-container">
                                <img src="<?=ROOT?>/Technician/Getverified/getImage/<?=$profile[0]->id_front?>" alt="Profile photo"> 
                        </div>
                        <div>
                            <h3>Front Photo Of NIC</h3>
                        </div>
                       
                            
                            
                    </div>

                    <div class="item">
                        <div class="photo-container">
                                <img 
                                    src="<?=ROOT?>/Technician/Getverified/getImage/<?=$profile[0]->id_back?>" alt="Profile photo">
                        </div>
                        <div>
                            <h3>Back Photo Of NIC</h3>
                        </div>
                            
                            
                    </div>

                    <div class="item">
                        <div class="photo-container">
                                <img  
                                    src="<?=ROOT?>/assets/images/bothId.jpg" alt="Profile photo">
                        </div>

                        <div>
                            <h3>Photo With ID</h3>
                        </div>
                        
                            
                            
                    </div>

            </div>
            <div class="pd">
                <h2>Personal Details...</h2>
            </div>
            <div class="grid-container-1">
                
                
                    <div class="item-1">
                        <p><?=$profile[0]->other_documents?></p>
                        
                       
                            
                            
                    </div>

            </div>

            

            
        </main> 

        <!-- End of Main -->

        <div class="right_grid">
            <div class="header">
                        <div class="left">

                        </div>
                        <!-- <div class="middle">
                            <h1>Users</h1>
                        </div> -->
                        <div class="right">
                            <div class="notification">
                                <span class="material-icons-sharp">notifications</span>
                            </div>

                            <div class="profile">
                                <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                                <div class="info">
                                    <div class="name"><p><?= $_SESSION['USER']->first_name." ".$_SESSION['USER']->last_name ?></b></p></div>
                                    <small class="text-muted role"><?=ucfirst($_SESSION['user_role'])?></small>
                                </div>
                                <div class="profile-photo">
                                    <div><img src="<?= ROOT ?>/assets/images/user.png" alt=""></div>
                                </div>
                            </div>
                        </div>
            </div>
            <!-- <div class="top">
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
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.png" alt="">
                    </div>
                </div>
            </div> -->



            <div class="heading">
                    <!-- <div class="top">
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
                </div> -->

            <!-- End of top -->

            <div class="grid-container-2">
                
                
                    <div class="item-2">
                        <div class="photo-container-1">
                                <img 
                                    src="<?=ROOT?>/assets/images/profile-2.jpg" alt="Profile photo">

                                
                        </div>

                        <div>
                            <h3><?=$profile[0]->first_name." ".$profile[0]->last_name?></h3>
                            <h4><?=$profile[0]->location?></h4>
                        </div>
                        <div>
                            <h5><?=$profile[0]->email?></h5>
                            <h6><?=$profile[0]->mobile_no?></h6>
                        </div>

                        <div class="button-container">
                            <button id = "verify_btn" onclick="verify()" class="first-button" data-technician=<?=$profile[0]->user_id?>>Verify</button>
                                
                            
                            <button id = "reject_btn" onclick="reject()" class="second-button" data-technician=<?=$profile[0]->user_id?>>Reject</button>
                            
                        
                        </div>

                        
                       
                            
                            
                    </div>

            </div>
        </div>

    </div>
    
    <div class="overlay hidden" id="overlay"></div>
    <div class="popup hidden" id="rejecttechnician">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content-1">
                <div class="content-2">
                    <h2>Confirm deletion of this Technician</h2>
                </div>
                
                <form class="mobile-verify" id="mobile-details" method="post" enctype="" >
                    <div class ="head" >
                        <h3>Are you sure you you want to reject this technician?</h3>
                    </div>
                    <div class="btn-container">
                        <button id="confirm_deleteBtn">Yes,I'm Sure</button>
                        <button id="cancel">Cancel</button>            
                    </div>       
                    
                </form>
            </div>
    </div>
    
    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>
    <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>
    <script src="<?= ROOT ?>/assets/js/Admin/rejectTechnician.js"></script>
    <script src="<?= ROOT ?>/assets/js/Admin/verifyTechnician.js"></script>
    <script src="<?= ROOT ?>/assets/js/Admin/rejectTechnician.js"></script>



    

</body>
</html>


