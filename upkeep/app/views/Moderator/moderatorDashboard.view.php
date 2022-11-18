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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/moderatordashboard.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?= ROOT ?>/assets/css/images/logo.png" alt="">
                    <img src="<?= ROOT ?>/assets/css/images/title.png" alt="">
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

                <a href="#">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>

<!-- 
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Notifications</h3>
                    <span class="message-count">11</span>
                </a> -->

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <div class="mainHeader">
                <h1>Items</h1>
                <div class="right">
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
                                <img src="<?= ROOT ?>/assets/css/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>

        
                </div>
    
            </div>
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="insight">
                <div class="mainDisplay1">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                            <h2>25</h2>
                            <h3>Total Templates</h3>
                    </div>
                </div>

                <div class="mainDisplay2">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                            <h2>35</h2>
                            <h3>Pending approvals</h3>
                    </div>
                </div>

                <div class="mainDisplay3">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                            <h2>25</h2>
                            <h3>Unhandled Complaints</h3>
                    </div>
                </div>
            </div>
            
            
            <div class="main-tables">
                <div class="suggestion">
                    <h2>Recent Suggestions</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>

                            <tr>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>

                            <tr>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>

                            <tr>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>

                            <tr>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="">See more</a>
                </div>
                <div class="complaints">
                    <h2>Recent Complaints</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Description</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Repair AC</td>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>

                            <tr>
                                <td>Repair AC</td>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>
                            <tr>
                                <td>Repair AC</td>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>
                            <tr>
                                <td>Repair AC</td>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>
                            <tr>
                                <td>Repair AC</td>
                                <td class="primary">A/C doesn't work properly</td>
                                <td class="warning">Pending</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="">See more</a>
                </div>
            </div>
        </main> 

    </div>
</body>
</html>