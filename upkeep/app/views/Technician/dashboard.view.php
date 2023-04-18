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
    <link rel="stylesheet" href=<?=ROOT."/assets/css/Technician/technicianDashboard.css"?>>
</head>
<body>
    <div class="container">
        <aside class="close">
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
                    <span class="message-count">11</span>
                </a>

                <a href="<?=ROOT?>/Technician/Statistics">
                    <span class="material-icons-sharp">analytics</span>
                    <h3>Statistics</h3>
                </a>

                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main> 
            <h1>Dashboard</h1>

            <div class="dashItem">
                <div class="card green">
                        <div>
                            <span class="material-icons-sharp customer">groups</span>
                        </div>  
                        <h2>35</h2>
                        <h3>CUSTOMERS</h3>
                    
                </div>

                <div class="card blue">
                        <div>
                            <span class="material-icons-sharp revenue">payments</span>
                        </div>  
                        <h2>Rs. 12000</h2>
                        <h3>REVENUE</h3>
                    
                </div>

                <div class="card yellow">
                        <div>
                            <span class="material-icons-sharp queue">work</span>
                        </div>  
                        <h2>35</h2>
                        <h3>JOBS ON QUEUE</h3>
                    
                </div>

            </div>


            <div class="recent-orders">
                <h2>Orders</h2>
                <!-- <h4>dataOnly for demonstration purposes</h4> -->
                <table>
                    <tr>
                        <td>
                            <div class="order">
                                <div class="description">
                                    <h1>Need a A/C Technician</h1>
                                    <p>Need to repair the fans of the air condition which are broken due to rusting. 
                                        The fan is making a strange noice when working
                                    </p>
                                    <a>AC Repair</a>
                                    <a>AC Fan</a>
                                </div>
                                <div class="action">
                                    <h4>Date</h4>
                                    <h4>type</h4>
                                    <button>Apply Job</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order">
                                <div class="description">
                                    <h1>Need a A/C Technician</h1>
                                    <p>Need to repair the fans of the air condition which are broken due to rusting. 
                                        The fan is making a strange noice when working
                                    </p>
                                    <a>AC Repair</a>
                                    <a>AC Fan</a>
                                </div>
                                <div class="action">
                                    <h4>Date</h4>
                                    <h4>type</h4>
                                    <button>Apply Job</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order">
                                <div class="description">
                                    <h1>Need a A/C Technician</h1>
                                    <p>Need to repair the fans of the air condition which are broken due to rusting. 
                                        The fan is making a strange noice when working
                                    </p>
                                    <a>AC Repair</a>
                                    <a>AC Fan</a>
                                </div>
                                <div class="action">
                                    <h4>Date</h4>
                                    <h4>type</h4>
                                    <button>Apply Job</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order">
                                <div class="description">
                                    <h1>Need a A/C Technician</h1>
                                    <p>Need to repair the fans of the air condition which are broken due to rusting. 
                                        The fan is making a strange noice when working
                                    </p>
                                    <a>AC Repair</a>
                                    <a>AC Fan</a>
                                </div>
                                <div class="action">
                                    <h4>Date</h4>
                                    <h4>type</h4>
                                    <button>Apply Job</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order">
                                <div class="description">
                                    <h1>Need a A/C Technician</h1>
                                    <p>Need to repair the fans of the air condition which are broken due to rusting. 
                                        The fan is making a strange noice when working
                                    </p>
                                    <a>AC Repair</a>
                                    <a>AC Fan</a>
                                </div>
                                <div class="action">
                                    <h4>Date</h4>
                                    <h4>type</h4>
                                    <button>Apply Job</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order">
                                <div class="description">
                                    <h1>Need a A/C Technician</h1>
                                    <p>Need to repair the fans of the air condition which are broken due to rusting. 
                                        The fan is making a strange noice when working
                                    </p>
                                    <a>AC Repair</a>
                                    <a>AC Fan</a>
                                </div>
                                <div class="action">
                                    <h4>Date</h4>
                                    <h4>type</h4>
                                    <button>Apply Job</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                   
                    
                </table>
                <a href="#">Show All</a>
            </div>
        </main> 

        <!-- End of Main -->

        <div class="right">
            <div class="top">

                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey,<b><?=$_SESSION['user_name']?></b></p>
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src=<?=ROOT."/assets/images/profile-1.jpg"?> alt="">
                    </div>
                </div>
            </div>
            <!-- End of top -->

            <div class="recent-updates">
                <h2>Recent Notifications</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src=<?=ROOT."/assets/images/profile-2.jpg"?> alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src=<?=ROOT."/assets/images/profile-3.jpg"?> alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src=<?=ROOT."/assets/images/profile-4.jpg"?> alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of recent updates -->

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
    </div>
    <script src="<?=ROOT?>/assets/js/Technician/dashboard.js  "></script>
    <script src="<?=ROOT?>/assets/js/Technician/fetch.js  "></script>
</body>
</html>