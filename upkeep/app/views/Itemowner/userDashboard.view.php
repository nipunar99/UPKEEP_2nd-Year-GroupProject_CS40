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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/ownerdashboard.css">

</head>

<body>
    <div class="container">
        <aside>
            <div class="header nbs top">
                <div class="left">
                </div>
                <div class="center">
                    <div class="header-logo">
                        <a><img src="<?= ROOT ?>/assets/images/headerlogo2.svg" alt=""></a>
                    </div>
                </div>
                <div class="right"></div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/item">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/TechnicianGigs">
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="<?= ROOT ?>/Community">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="<?= ROOT ?>/Conversation">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="<?= ROOT ?>/itemowner/statistic">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="<?= ROOT ?>/accountsettings">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

            </div>
            <div class="bottom">
                <a href=<?= ROOT . "/Signout" ?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>
        </aside>
        <!-- End of Aside -->

        <main>
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="insight">

                <div class="mainDisplay1">
                </div>

                <div class="mainDisplay2">
                </div>

                <div class="mainDisplay3">
                </div>

            </div>

            <div class="upMaintenceList">
                <h2>Upcomming Maintenance</h2>

                <div class="maintenceBoxes"></div>

            </div>

            <div class="upMaintenceList">
                <h2 id="overdueh2">Overdue Maintenance</h2>

                <div class="overduemaintenceBoxes"></div>
            </div>

            <!-- <div class="Suggection">
                <h2>Suggections Maintenance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Item type</th>
                            <th>Sub component</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Item type</td>
                            <td>Sub componet</td>
                            <td class="primary">Description</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td class="warning">Pending</td>
                        </tr>

                        <tr>
                            <td>Item type</td>
                            <td>Sub componet</td>
                            <td class="primary">Description</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td class="warning">Pending</td>
                        </tr>
                        <tr>
                            <td>Item type</td>
                            <td>Sub componet</td>
                            <td class="primary">Description</td>
                            <td>Date</td>
                            <td>Status</td>
                            <td class="warning">Pending</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div> -->

        </main>
        <!-- End of Main -->

        <div class="right">
            <div class="header nbs">
                <div class="right">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>

                    <div class="notification">
                        <div>
                            <span class="material-icons-sharp" onclick="openNav()">notifications</span>
                            <span class="badge">3</span>
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

            <div class="recent-updates">
                <h2>Recent Notifications</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-3.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-4.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cal">
                <div class="header1">
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
        </div>
        <!-- End of Main -->

        <div class="popupview hidden">
            <button class="closebtn">&times;</button>

            <div class="maintenaceview">
                <div class="content">
                    <div>
                        <span class="material-icons-sharp">view_in_ar</span>
                        <h3>Item name</h3>
                        <h2>Samsung Inverter Windfree AC</h2>
                    </div>

                    <div>
                        <span class="material-icons-sharp">chat_bubble_outline</span>
                        <h3>Maintenance task</h3>
                        <h2>Replace HVAC air filters</h2>
                    </div>

                    <div>
                        <span class="material-icons-sharp">calendar_today</span>
                        <h3>Due date</h3>
                        <h2>21/12/2022</h2>
                    </div>

                    <div>
                        <span class="material-icons-sharp">construction</span>
                        <h3>Sub component</h3>
                        <h2>Air filter</h2>
                    </div>

                    <div class="maintenanceStatus danger">
                        <span class="material-icons-sharp">error_outline</span>
                        <h3>Pending</h3>
                    </div>
                </div>

                <div class="action_btn">
                    <button onclick="completeTask()">Complete</button>
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            </div>

            <div class="completeform1 hidden">
                <form method="post" enctype="multipart/form-data" id="form_reminderDetails">
                    <h2>Maintenance Details</h2>
                    <div class="middleInput">
                        <div class="input-box">
                            <span class="details">Summary of Maintenance</span>
                            <input type="text" name="Summary" id="" required placeholder="Enter Summary">
                        </div>
                        <div class="input-box">
                            <span class="details">Complete Date</span>
                            <input type="date" name="completedate" required placeholder="Enter complete date">
                        </div>
                        <div class="input-box">
                            <span class="details">Cost for Maintenance</span>
                            <input type="number" min="0" name="cost" placeholder="Enter Brand">
                        </div>

                    </div>
                    <div class="button completebtn">
                        <input type="submit" value="Done" id="addMaintenancebtn">

                    </div>
                </form>

                <div class="action_btn">
                    <button onclick="cancelcompleteTask()" class="cancelbtn">Cancel</button>
                </div>

            </div>
        </div>

        <div class="overlayview"></div>

    </div>
    </div>


    <?php
    echo "<script> var ROOT = '" . ROOT . "'; </script>";
    ?>
        <script src="<?= ROOT ?>/assets/js/Itemowner/userDashboard/itemownerDashboard.js"></script>
        <script src="<?= ROOT ?>/assets/js/Itemowner/userDashboard/Reminders.js"></script>
        <script src="<?=ROOT?>/assets/js/Technician/tabs.js"></script>
        <script src="<?=ROOT?>/assets/js/notification.js"></script>
        <script src="<?= ROOT ?>/assets/js/Itemowner/public.js"></script>

</body>

</html>