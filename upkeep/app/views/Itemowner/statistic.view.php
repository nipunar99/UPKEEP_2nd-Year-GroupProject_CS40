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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/statistic.css">
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
                <a href="<?= ROOT ?>/itemowner/Userdashboard" >
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/item">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/TechnicianGigs" >
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

                <a href="#" class="active">
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
       
        <section class="mainSection">
            <div class="mainHeader">
                    <h1>Statistics</h1>
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
                                    <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <main>
                 
                <div class="insight">

                    <div class="mainDisplay1">
                        <div class="middle">
                            <span class="material-icons-sharp">attach_money</span>
                            <div class="left">
                                <h3 class="total_cost"></h3>
                            <h3>This month Maintenance Cost</h3>
                            </div>
                        </div>
                        <div class="h4content">
                            <h4>View More </h4>
                            <h4 class="leftarrow"><span class="material-icons-sharp">east</span></h4>
                        </div>
                    </div>

                    <div class="mainDisplay2">
                        <div class="middle">
                            <span class="material-icons-sharp">engineering</span>
                            <div class="left">
                                <h3><span>6</span></h3>
                                <h3>Hired Technicians of This month</h3>
                            </div>
                        </div>
                        <div class="h4content">
                            <h4>View More </h4>
                            <h4 class="leftarrow"><span class="material-icons-sharp">east</span></h4>
                        </div>

                    </div>

                    <div class="mainDisplay3">
                        <div class="middle">
                            <span class="material-icons-sharp">view_in_ar</span>
                            <div class="left">
                                <h3><span>5</span></h3>
                                <h3>Discarded items</h3>
                            </div>
                        </div>
                        <div class="h4content">
                            <h4>View More </h4>
                            <h4 class="leftarrow"><span class="material-icons-sharp">east</span></h4>
                        </div>

                    </div>

                    <div class="mainDisplay4">
                        <div class="middle">
                            <span class="material-icons-sharp">task_alt</span>
                            <div class="left">
                                <h3><span>50</span></h3>
                                <h3>Maintainance Tasks</h3>
                            </div>
                        </div>
                        <div class="h4content">
                            <h4>View More </h4>
                            <h4 class="leftarrow"><span class="material-icons-sharp">east</span></h4>
                        </div>

                    </div>

                </div>

                <div class="chart">
                    <div class="barchat">
                        <h2>Maintainance Cost Of This Year</h2>
                        <canvas id="barChat" ></canvas>
                    </div>
                    <div class="piechart">
                        <h2>Completeness Of Maintenance Tasks</h2>
                        <canvas id="pieChart"></canvas>
                    </div>

                    <div class="paymentHistory">
                        <h2>Payment Histroy</h2>
                        <div>
                            <div class="profile-photo">
                                <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                            </div>
                            <div class="left">
                                <h3>Kavindu Pramod</h3>
                                <h3><span>Rs.</span><span>15500</span></h3>
                            </div>
                        </div>

                        <div>
                            <div class="profile-photo">
                                <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                            </div>
                            <div class="left">
                                <h3>Kavindu Pramod</h3>
                                <h3><span>Rs.</span><span>15500</span></h3>
                            </div>
                        </div>
                        <div>
                            <div class="profile-photo">
                                <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                            </div>
                            <div class="left">
                                <h3>Kavindu Pramod</h3>
                                <h3><span>Rs.</span><span>15500</span></h3>
                            </div>
                        </div>
                        <div>
                            <div class="profile-photo">
                                <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                            </div>
                            <div class="left">
                                <h3>Kavindu Pramod</h3>
                                <h3><span>Rs.</span><span>15500</span></h3>
                            </div>
                        </div>
                        <div>
                            <div class="profile-photo">
                                <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                            </div>
                            <div class="left">
                                <h3>Kavindu Pramod</h3>
                                <h3><span>Rs.</span><span>15500</span></h3>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tableStat">
                    <div class="tableView maintenanceUp">
                        <h2>Maintenance History</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Due date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tableView maintenanceUp">
                        <h2>Discard Items</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Due date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                                <tr>
                                    <td>AC air filter clean</td>
                                    <td class="danger">07/02/2023</td>
                                    <td class="warning">Pending</td>
                                    <td class="primary">Action</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main> 

        </section>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/Itemowner/statistic.js"></script>

</body>
</html>