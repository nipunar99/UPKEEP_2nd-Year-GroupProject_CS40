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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/ownerdashboard.css">
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

                <a href="<?= ROOT ?>/itemowner/item" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="<?= ROOT ?>/Community">
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

                <a href="<?= ROOT ?>/Signout">
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
                    <div class="middle">
                        <span class="material-icons-sharp">construction</span>
                        <div class="left">
                            <h3><span>12</span></h3>
                            <h3>Days more</h3>
                        </div>
                    </div>
                    <h4>Replace or clean Air Conditioner filter</h4>

                </div>

                <div class="mainDisplay2">
                    <div class="middle">
                        <span class="material-icons-sharp">today</span>
                        <div class="left">
                            <h3><span>12</span></h3>
                            <h3>Days more</h3>
                        </div>
                    </div>
                    <h4>Warranty Date: 04/05/2024 </h4>
                </div>

                <div class="mainDisplay3">
                    <div class="middle">
                        <span class="material-icons-sharp">remove_moderator</span>
                        <div class="left">
                            <h3><span>3</span></h3>
                            <h3>Days left</h3>
                        </div>
                    </div>
                    <h4>Replace or clean Air Conditioner filter</h4>
                </div>

            </div>

            <div class="upMaintenceList">
                <h2>Upcomming Maintenance</h2>

                <div class="maintenceBoxes">
                    
                    <div class="maintenceBox show-modal1" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component1.png" alt="">

                        </div>

                    </div>

                    <div class="maintenceBox show-modal2" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component2.png" alt="">

                        </div>

                    </div>
                    
                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>

                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>

                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>
                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>

                </div>
            </div>

            <div class="upMaintenceList">
                <h2>Overdue Maintenance</h2>

                <div class="maintenceBoxes">
                    
                    <div class="maintenceBox show-modal1" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component1.png" alt="">

                        </div>

                    </div>

                    <div class="maintenceBox show-modal2" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component2.png" alt="">

                        </div>

                    </div>
                    
                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>

                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>

                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>
                    <div class="maintenceBox show-modal3" role="button">
                        <h3>Maintenance Schedule</h3>
                        <div>
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
                            <img src="<?= ROOT ?>/assets/images/component3.png" alt="">

                        </div>

                    </div>

                </div>
            </div>

            <div class="Suggection">
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
                            <img src="images/profile-1.jpg" alt="">
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
        </div>
        <!-- End of Main -->

        <div class="popupview hidden">
            <button class="closebtn">&times;</button>

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
                <button>Complete</button>
                <button>Edit</button>
                <button>Delete</button>
            </div>

        </div>

        <div class="overlayview hidden"></div>
    </div>
        <script src="<?= ROOT ?>/assets/js/Itemowner/itemownerDashboard.js"></script>
</body>
</html>