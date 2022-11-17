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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/ownerdashboard.css">
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
                <a href="#" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/Itemowner/Item" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="<?= ROOT ?>/Signout/signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Sign out</h3>
                </a>

            </div>
        </aside>

        <main>
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="insight">
                
                <div class="mainDisplay1">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>12 Days More</h3>
                            <h4>Replace or clean Air Conditioner filter</h4>
                        </div>
                    </div>
                </div>

                <div class="mainDisplay2">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3><span>25</span> Items</h3>
                            <h4>Have been Added</h1>
                        </div>
                    </div>
                </div>

                <div class="mainDisplay3">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>5 Days left</h3>
                            <h4>Replace or clean Air Conditioner filter</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="upMaintenceList">
                <h2>Upcomming Maintenance</h2>
                <div class="maintenceBoxes">
                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                </div>
            </div>

            <div class="recent-orders">
                <h2>Upcomming Maintenance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Job type</th>
                            <th>Item type</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Repair AC</td>
                            <td>Visit</td>
                            <td>A/C</td>
                            <td>10/11</td>
                            <td class="primary">A/C doesn't work properly</td>
                            <td class="warning">Pending</td>
                        </tr>

                        <tr>
                            <td>Repair AC</td>
                            <td>Visit</td>
                            <td>A/C</td>
                            <td>10/11</td>
                            <td class="primary">A/C doesn't work properly</td>
                            <td class="warning">Pending</td>
                        </tr>

                        <tr>
                            <td>Repair AC</td>
                            <td>Visit</td>
                            <td>A/C</td>
                            <td>10/11</td>
                            <td class="primary">A/C doesn't work properly</td>
                            <td class="warning">Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
        <!-- End of Main -->

        <div class="right">
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
                            <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
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

        </div>
</body>
</html>