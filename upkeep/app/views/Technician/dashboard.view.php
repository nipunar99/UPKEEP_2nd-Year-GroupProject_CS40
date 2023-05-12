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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href=<?=ROOT."/assets/css/Technician/technicianDashboard.css"?>>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="container">
        <aside class="close">
            <div class="header nbs">
                <div class="left">
                </div>
                <div class="center">
                    <div class="header-logo">
                        <a><img src="<?=ROOT?>/assets/images/headerlogo2.svg" alt=""></a>
                    </div>
                </div>
                <div class="right"></div>
            </div>

            <div class="middle">
                <div class="sidebar">
                    <a href="<?=ROOT?>/Technician/Dashboard" class="active">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Findjobs" >
                        <span class="material-icons-sharp">work</span>
                        <h3>Find Jobs</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Orders" >
                        <span class="material-icons-sharp">list_alt</span>
                        <h3>Orders</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Gigs">
                        <span class="material-icons-sharp">task</span>
                        <h3>Gigs</h3>
                    </a>


                    <a href="<?=ROOT?>/Community">
                        <span class="material-icons-sharp">forum</span>
                        <h3>Community</h3>
                    </a>


                    <a href="<?=ROOT?>/Coversation">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Conversation</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Statistics">
                        <span class="material-icons-sharp">analytics</span>
                        <h3>Statistics</h3>
                    </a>
                </div>
            </div>

            <div class="bottom">
                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>


        </aside>

        <main>
            <div class="header nbs">
                <div class="center">
                    <h1>Dashboard</h1>
                </div>
            </div>

            <div class="middle">
                <h2>Overview</h2>
                <div class="dashItem">
                    <div class="card green">
                        <div class="details">
                            <h3>CUSTOMERS</h3>
                            <h2><?=$counts->count?></h2>
                        </div>
                        <div>
                            <span class="material-icons-sharp customer">groups</span>
                        </div>
                    </div>

                    <div class="card blue">
                        <div class="details">
                            <h3>REVENUE</h3>
                            <h2>Rs. <?=$counts->revenue?></h2>
                        </div>
                        <div>
                            <span class="material-icons-sharp revenue">payments</span>
                        </div>
                    </div>

                    <div class="card">
                        <div class="details">
                            <h3>JOBS ON QUEUE</h3>
                            <h2><?=$counts->queue?></h2>
                        </div>
                        <div>
                            <span class="material-icons-sharp queue">work</span>
                        </div>
                    </div>

                </div>

                <div class="stat">
                    <div class="order-summary">
                        <h2>Order Summary</h2>
                        <div><canvas id="donut-chart"></canvas></div>
                    </div>
                    <div class="order-summary">
                        <h2>Income Summary</h2>
                        <div><canvas id="bar-chart"></canvas></div>
                    </div>
                </div>

                <div class="recent-orders">
                    <h2>Upcoming Orders</h2>
                    <!-- <h4>dataOnly for demonstration purposes</h4> -->
                    <div class="cards">
                        <?php if (!empty($upcoming)):?>
                            <?php foreach($upcoming as $order):?>
                            <div class="card">
                                <div class="day">
                                    <div class="date">
                                        <h2><?=date('d',strtotime($order->date));?></h2>
                                        <h4><?=date('M',strtotime($order->date));?></h4>
                                    </div>
                                    <div class="remaining">
                                        <h3>Due</h3>
                                        <h2><?=dueDays($order->date)?> Days</h2>
                                    </div>
                                </div>
                                <div class="title">
                                    <h3><?=$order->title?></h3>
                                </div>
                                <div class="location">
                                    <div class="notification"><span class="material-icons-sharp">place</span></div>
                                    <h4><?=$order->city?></h4>
                                </div>
                                <div class="btn-container">
                                    <a href="#" class="btn">view order</a>
                                </div>
                            </div>
                            <?php endforeach;?>
                        <?php endif;?>

                    </div>
                </div>





            </div>
        </main> 

        <!-- End of Main -->

        <div class="right">
            <div class="header nbs">
                <div class="right">
                    <div class="notification">
                        <div>
                            <span class="material-icons-sharp" onclick="openNav()">notifications</span>
                            <span class="badge"></span>
                        </div>
                    </div>

                    <div class="profile dropdown">
                        <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                        <div class="info">
                            <div class="name">
                                <p><?= $_SESSION['USER']->first_name . " " . $_SESSION['USER']->last_name ?></b></p>
                            </div>
                            <small class="text-muted role"><?= ucfirst($_SESSION['user_role']) ?></small>
                        </div>
                        <div class="profile-photo">
                            <div><img src="<?= ROOT ?>/assets/images/photo2.png" alt=""></div>
                        </div>
                        <div class="dropdown-content hidden">
                            <a href="<?= ROOT ?>/Profile"><span class="material-icons-sharp">person</span>Profile</a>
                            <a href="<?= ROOT ?>/Accountsettings"><span class="material-icons-sharp">settings</span>Settings</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of top -->

            <div class="container">
                <div class="cal">
                    <div class="header">
                        <p class="current-date"></p>
                        <div class="icons">
                        <span id="prev" class="material-icons-sharp">chevron_left</span>
                        <span id="next" class="material-icons-sharp">chevron_right</span>
                        </div>
                    </div>
                    <div class="calendar">
                        <ul class="weeks">
                        <li>Sun</li>
                        <li>Mon</li>
                        <li>Tue</li>
                        <li>Wed</li>
                        <li>Thu</li>
                        <li>Fri</li>
                        <li>Sat</li>
                        </ul>
                        <ul class="days">

                        </ul>
                    </div>
                </div>
                <div class="cal" id="events">
                    <div class="header">
                        <p class="current-date">SCHEDULE</p>
                    </div>
                    <div class="event-list">
                        <div class="spacer"></div>
                        <a href="#" class="event">
                            <div class="event-container">
                                <span class="time-container">
                                    <span class="time">10:00 AM</span>
                                </span>
                                <span class="detail-container">
                                    <span class="title">A/C Repair</span>
                                    <span class="description"><span class="material-icons-sharp"><span id="ocation">location_on</span></span>Location</span>
                                </span>
                            </div>
                        </a>
                        <a href="#" class="event">
                            <div class="event-container">
                                <span class="time-container">
                                    <span class="time">10:00 AM</span>
                                </span>
                                <span class="detail-container">
                                    <span class="title">A/C Repair</span>
                                    <span class="description"><span class="material-icons-sharp"><span id="ocation">location_on</span></span>Location</span>
                                </span>
                            </div>
                        </a>
                        <a href="#" class="event">
                            <div class="event-container">
                                <span class="time-container">
                                    <span class="time">10:00 AM</span>
                                </span>
                                <span class="detail-container">
                                    <span class="title">A/C Repair</span>
                                    <span class="description"><span class="material-icons-sharp"><span id="ocation">location_on</span></span>Location</span>
                                </span>
                            </div>
                        </a>
                        <a href="#" class="event">
                            <div class="event-container">
                                <span class="time-container">
                                    <span class="time">10:00 AM</span>
                                </span>
                                <span class="detail-container">
                                    <span class="title">A/C Repair</span>
                                    <span class="description"><span class="material-icons-sharp"><span id="ocation">location_on</span></span>Location</span>
                                </span>
                            </div>
                        </a>
                        <a href="#" class="event">
                            <div class="event-container">
                                <span class="time-container">
                                    <span class="time">10:00 AM</span>
                                </span>
                                <span class="detail-container">
                                    <span class="title">A/C Repair</span>
                                    <span class="description"><span class="material-icons-sharp"><span id="ocation">location_on</span></span>Location</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="notification-side-panel"></div>
<!--    <div id="mySidenav" class="sidenav notification hidden">-->
<!--        <div class="header">-->
<!--            <div class="center">-->
<!--                <h2>Notifications</h2>-->
<!--            </div>-->
<!--            <div class="tabs">-->
<!--                <div class="tab-item active">-->
<!--                    <i class="tab-icon fas fa-bell"></i>-->
<!--                    Alert-->
<!--                </div>-->
<!--                <div class="tab-item">-->
<!--                    <i class="tab-icon fas fa-clock"></i>-->
<!--                    History-->
<!--                </div>-->
<!--                <div class="line"></div>-->
<!--            </div>-->
<!--            <span class="closebtn" onclick="closeNav()">&times;</span>-->
<!--        </div>-->
<!--        <div class="tab-content" >-->
<!--            <div class="tab-pane active" id="">-->
<!--                <ol id="notification-list-unread">-->
<!---->
<!--                </ol>-->
<!---->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="tab-pane" id="">-->
<!--                <ol id="notification-list-history">-->
<!---->
<!--                </ol>-->
<!---->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->

    <div class="overlay hidden" id="overlay"></div>

    <script>
        const ROOT = "<?=ROOT?>";
        const user_id = "<?= $_SESSION['user_id'] ?>";
        let piechart_data = JSON.stringify(<?=$piechart_data?>);
        let barchart_data = JSON.stringify(<?=$barchart_data?>);
    </script>


    <script src="<?=ROOT?>/assets/js/main.js"></script>
    <script src="<?=ROOT?>/assets/js/Technician/dashboard.js  "></script>
    <script src="<?=ROOT?>/assets/js/Technician/tabs.js"></script>
    <script src="<?=ROOT?>/assets/js/notification.js"></script>

</body>
</html>