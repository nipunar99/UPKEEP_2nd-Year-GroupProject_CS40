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
    <!-- <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-yacmIiZmY4ZpH4tA+8tbaThL5vi5r5pOuOvUV8X7VjQoC2Oaa/+GhBw8b7W1G6mv" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
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

                <a href="<?=ROOT?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Administrative Users</h3>
                </a>
                <a href="#" class="active">
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
                
                <a href="<?= ROOT ?>/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        
        

        <main>
            <div class="header">
                <div class="left">

                </div>
                <div class="middle">
                    <h1>Users</h1>
                </div>
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
            
            <div class="content">
                <div class="action-bar">
                    <div class="button-container">
                        <div class="search-bar-container">
                            <input type="text" placeholder="Search...">
                            <button class="search-button"><span class="material-icons-sharp">search</span></button>
                        </div>
                        <button class="remove-button">Remove</button>
                    </div>
                </div>

                <div class="table-container">
                    
                    <table class="technician-table">
                        <thead>
                            <tr>
                            
                            <th>Name</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>identity_verification</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i=0;$i<count($technician);$i++):?>
                                <tr>                                         
                                    <td>
                                        <div class="profile">
                                            <div class ="dp">
                                            <img src="<?= ROOT ?>/assets/images/member-4.png"></div> <?=$technician[$i]->first_name." ".$technician[$i]->last_name ?></td>
                                        </div>
                                         
                                    <td><?=$technician[$i]->user_id ?></td>
                                    <td><?=$technician[$i]->email ?></td>
                                    <td><?=$technician[$i]->identity_verification ?></td>
                                    <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                                    
                                </tr>
                            <?php endfor;?>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                                
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">not_interested</span></button>
                                        </div>
                                    </td>
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td>
                                        <div class="btn-container">
                                            <button id="view-btn"><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn"><span class="material-icons-sharp favorite-icon">cancel</span></button>
                                        </div>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            
            
            
        <!-- </main>  -->

        <!-- End of Main -->

        <!-- <div class="right"> -->
            
            <!-- End of top -->

        <!-- </div> -->
        </main>
    </div>
    <div class="overlay hidden" id="overlay"></div>
    <div class="popup hidden" id="banned-user">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content-1">
                <div class="content-2">
                    <h2>Confirm deletion of this Moderator</h2>
                </div>
                
                <form class="mobile-verify" id="mobile-details" method="post" enctype="" >
                    <div class ="head" >
                        <h3>Are you sure you you want to remove this moderator?</h3>
                    </div>
                    <div class="btn-container">
                                <button id="OTP-send">Yes,I'm Sure</button>
                                <button id="OTP-send">Cancel</button>
                        </div>
 
                    


                        
                       
                    
                </form>
            </div>
    </div>




    <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>
    <script src="<?=ROOT?>/assets/js/Admin/users.js"></script>

    

    

</body>
</html>




