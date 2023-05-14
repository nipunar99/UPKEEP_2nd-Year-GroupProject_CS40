<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Admin/statistic.css">
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
</head>

<body>
    <div class="container">
        <aside>

            <div class="top">
                <img src="<?= ROOT ?>/assets/images/logo.png " alt="">
                <img src="<?= ROOT ?>/assets/images/title.png" alt="">
            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Admin/Admindashboard">
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

                <a href="<?=ROOT?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <!-- <a href="<?=ROOT?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a> -->

                <a href="#" class="active">
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
        <div class="header_nbs">
                <div class="left">

                </div>
                <div class="center">
                    <h1>Statistic</h1>
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

            <div class="insight">

                <div class="pie-chart">
                    <div class="card-1">
                        <div class="text">
                            <div class="text-1">
                                <h1>Total Administrative Users</h1>
                                <h2><?=$administrative_counts[0]->count?></h2>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Admin <?=$admin_counts[0]->count?></p>
                                <p>Moderators <?=$moderator_counts[0]->count?></p>
                                <p>Banned <?=$banned_adminusers[0]->count?></p>
                            </div>
                        </div>
                        <div class="pie-view" id="chart">

                        </div>
                    </div>
                    <div class="card-2">
                        <div class="text">
                            <div class="text-1">
                                <h1>Total Users</h1>
                                <h2><?=$user_counts[0]->count?></h2>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Technician <?=$technician_counts[0]->count?></p>
                                <p>Item Owners <?=$item_owner_counts[0]->count?></p>
                                <p>Banned <?=$banned_users[0]->count?></p>
                            </div>
                        </div>
                        <div class="pie-view">

                        </div>
                    </div>
                </div>
                <div class="maintenance">

                    <h1>Complaint History</h1>

                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Complaint Status</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Resolution</th>
                                    <!-- <td class="highlight">Number of Complaints</td>
                                        <style>
                                        .highlight {
                                            color: red;
                                        }
                                        </style> -->
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php for($i=0;$i<count($complaint_list);$i++):?>
                            <tr>
                                <td><?=$complaint_list[$i]->first_name." ".$complaint_list[$i]->last_name?></td>
                                <td><?=$complaint_list[$i]->status ?></td>
                                
                                <td><?=$complaint_list[$i]->description ?></td>
                                <td><?=$complaint_list[$i]->date_created ?></td>
                                <td><?=$complaint_list[$i]->resolution?></td>
                                <!-- <td><?=$complaint_counts[$i]->count ?></td>     -->
                            </tr>
                        <?php endfor;?>
                                
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </main>
       
</body>

</html>