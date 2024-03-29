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

                <!-- <a href="<?=ROOT?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a> -->

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
                    <h1 id="user_header">Users</h1>
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
                            <input type="text" id="searchInput" placeholder="Search...">
                            <button class="search-button" id="searchButton"><span class="material-icons-sharp">search</span></button>
                        </div>
                        <!-- <button class="remove-button">Remove</button> -->
                    </div>
                </div>

                <div class="table-container">
                    
                    <table class="technician-table" id="userTable">
                        <thead>
                            <tr>
                            
                            <th id="name_column">Name</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>identity_verification</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php if(!empty($technician)):?>
                            <?php for($i=0;$i<count($technician);$i++):?>
                                <tr data-technicianDetails = <?=json_encode($technician[$i])?> id="usertable_row" >                                         
                                    <td>
                                        <div class="profile">
                                            <div class ="dp">
                                            <img src="<?= ROOT ?>/assets/images/member-3.png"></div> <?=$technician[$i]->first_name." ".$technician[$i]->last_name ?></td>
                                        </div>
                                         
                                    <td><?=$technician[$i]->user_id ?></td>
                                    <td><?=$technician[$i]->email ?></td>
                                    <td><?=$technician[$i]->identity_verification ?></td>
                                    <td>
                                        <div class="btn-container">
                                            <button id="view_btn" class="view_btn" data-userid=<?=$technician[$i]->user_id?>><span class="material-icons-sharp">person</span></button> 
                                            <button id="reject-btn" class="reject_btn"data-userId=<?=$technician[$i]->user_id?>><span class="material-icons-sharp favorite-icon">cancel</span></button>
                                        </div>
                                    </td>
                                    
                                </tr>
                            <?php endfor;?>
                        <?php endif;?>
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
    <div class="popup hidden" id="banned_user" >
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <h1>Banned User</h1>
                <form class="mobile-verify" id="addbanned-details" method="post" enctype="" >
                    <div class = "mobile-number-input" id="step1">
                        <div class="inline">
                                <div class="input-field">
                                    <label>Enter the Reason </label>
                                    <input class="mobile" type="text" id="reason" name="reason" required placeholder="Reason" >
                                    <small class="error">&nbsperror</small>
                                </div>

                        </div>
                                
                       <div class="btn-container">
                            
                                <button id="bannedBtn">Banned</button>
                                <button id="cancel">cancel</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>

        <div class="popup hidden" id="view_user">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content-1">
                <div class="content-2">
                    <div class="cc">
                        <div class=bb>
                            <h2>Name</h2>
                                <h3 id="name"></h3>
                        </div>
                        <div class=bb>
                            <h2>User_id</h2>
                                <h4 id="user_id"></h4>
                        </div>
                    </div>
                    <div class="cc">
                        <div class=bb>
                            <h2>Email</h2>
                                <h4 id="email"></h4>
                        </div>
                        <div class=bb>
                            <h2>identity verification</h2>
                            <h4 id="identity_verification"></h4> 
                        </div>  
                    </div>
                </div>
            </div>
        </div>


    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>  

    <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>
    <script src="<?=ROOT?>/assets/js/Admin/users.js"></script>
    <script src="<?=ROOT?>/assets/js/Admin/userSearch.js"></script>


    

    

</body>
</html>




