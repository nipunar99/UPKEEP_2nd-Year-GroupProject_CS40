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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/admindashboard.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/modifyform.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                    <img src="<?= ROOT ?>/assets/images/title.png" alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Admin/AdminDashboard" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Administrative Users</h3>
                </a>
                <a href="<?=ROOT?>/Admin/UserTab">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <!-- <a href="<?= ROOT ?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a> -->

                <a href="<?= ROOT ?>/Admin/Statistic">
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
            <div class="header nbs">
                <div class="left">

                </div>
                <div class="center">
                    <h1>Dashboard</h1>
                </div>
                <div class="right">
                    <div class="notification">
                        <span class="material-icons-sharp">notifications</span>
                    </div>

                    <div class="profile">
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


            <div class="summary">
                <h2>Summary Of Details</h2>
                <div class="summaryBoxes">

                    <div class="summaryBox">
                        <h2>Total Users</h2>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">person</span>
                                <h4>Item owners : <?=$user_counts[0]->count?> Acounts</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">manage_accounts</span>
                                <h4>Technician : <?=$technician_counts[0]->count?> Acounts</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">person_off</span>
                                <h4>Banned accounts : <?=$banned_users[0]->count?> Accounts</h4>
                            </div>
                        </div>
                        <a href="<?=ROOT?>/Admin/UserTab">
                            <button class="btn_action action1">See more</button>
                        </a>
                    </div>

                    <div class="summaryBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h2>Item Templates</h2>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Total Items : <?=$item_counts[0]->count?> Items</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">construction</span>
                                <h4>Pending templates : <?=$pendingitem_counts[0]->count?> Items</h4>
                            </div>
                        </div>
                        <a href="<?=ROOT?>/Admin/ItemTemplate">
                            <button class="btn_action action2">See more</button>
                        </a>
                    </div>
                    <div class="summaryBox">
                        <h2>Verification Requests</h2>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">person</span>
                                <h4>New Registration :<?=$registered_counts[0]->count?>  Acounts</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">manage_accounts</span>
                                <h4>Pending Approvals :<?=$pending_counts[0]->count?>  Accounts</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">person_off</span>
                                <h4>Rejected :<?=$reject_counts[0]->count?> Accounts</h4>
                            </div>
                        </div>
                        <a href="<?=ROOT?>/Admin/VerifyRequest">
                            <button class="btn_action action1">See more</button>
                        </a>                    </div>
                </div>
            </div>

            <div class="modarotorList">
                <div>
                    <h2>Moderator's Profile details</h2>
                    <!-- <a id="btn_mod" class="btn_action1 addMode">Add Moderator</a> -->
                    <!-- <button class="btn_action addMode">Add Moderator</button> -->
                </div>
                
                
                <table class="moderator-table">
                    
                    <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            
                            
                    </tr>
                    <?php for($i=0;$i<count($moderators);$i++):?>
                        <tr>
                            <td><?=$moderators[$i]->first_name ?></td>
                            <td><?=$moderators[$i]->last_name ?></td>
                            <td><?=$moderators[$i]->email ?></td>
                            <td><?=$moderators[$i]->mobile_no ?></td>
                            <td><?=$moderators[$i]->address ?></td>    
                        </tr>
                    <?php endfor;?>
                </table>
            </div>

        </main>
        <!-- End of Main -->
</body>

</html>



