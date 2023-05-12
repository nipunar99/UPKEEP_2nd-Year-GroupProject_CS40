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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/statistics.css">
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
                <a href="<?= ROOT ?>/Moderator/Moderatordashboard">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Suggestion">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Itemtemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Complaint">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Statistics</h3>
                </a>
                <a href="<?= ROOT ?>/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>

        </aside>

        <main>

            <div class="header nbs">
                <div class="left">

                </div>
                <div class="center">
                    <h1>Statistics</h1>
                </div>
                <div class="right">
                    <div class="notification">
                        <span class="material-icons-sharp">notifications</span>
                    </div>

                    <div class="profile" id="profile">
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
                                <p>Total Users</p>
                                <h1>250</h1>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Technician 110</p>
                                <p>Item Owners 130</p>
                                <p>Banned 10</p>
                            </div>
                        </div>
                        <div class="pie-view1">
                            <canvas id="pieChart1">
                                <canvas>
                        </div>
                    </div>
                    <div class="card-2">
                        <div class="text">
                            <div class="text-1">
                                <p>Total Templates</p>
                                <h1>66</h1>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Item Templates 100</p>
                                <p>Pending Items 10</p>
                                <!-- <h1>100</h1>
                                <p>12/11/2021</p> -->
                            </div>
                            <!-- <div class="text-2">
                                <p>Item templates 55</p>
                                <p>Pending items 11</p>
                                
                            </div> -->
                        </div>
                        <div class="pie-view2">
                            <canvas id="pieChart2">
                                <canvas>
                        </div>
                    </div>
                    <div class="card-3">
                        <div class="text">
                            <div class="text-1">
                                <p>Administrative Users</p>
                                <h1>250</h1>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Moderators 110</p>
                                <p>Admins 130</p>

                            </div>
                        </div>
                        <div class="pie-view3">
                            <canvas id="pieChart3">
                                <canvas>
                        </div>
                    </div>
                </div>
                <div class="bar-chart-main">
                    <div class="bar-chart">
                        <h1>Item Categories Comparison</h1>
                        <div class="card-4">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                    <div class="bar-chart">
                        <h1>Item Suggestions Comparison</h1>
                        <div class="card-4">
                            <canvas id="barChart-2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="maintenance">

                    <h1>Complaint History</h1>

                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Sub Component</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="show-r-1" role="button">
                                    <td>Description</td>
                                    <td>Sub Component</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                                <tr class="show-r-2" role="button">
                                    <td>Description</td>
                                    <td>Sub Component</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                                <tr class="show-r-3" role="button">
                                    <td>Description</td>
                                    <td>Sub Component</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                                <tr class="show-r-4 " role="button">
                                    <td>Description</td>
                                    <td>Sub Component</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </main>
        <div class="popupview hidden">
            <button class="closebtn">&times;</button>
            <div class="popup-text">
                <div class="1">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h4>Item name</h4>
                    <h4><B>Samsung Inverter Windfree AC</B> </h4>
                </div>
                <div class="2">
                    <span class="material-icons-sharp">chat_bubble_outline</span>
                    <h4>Maintenance task</h4>
                    <h4><b>Replace HAVC air filters</b></h4>
                </div>
                <div class="3">
                    <span class="material-icons-sharp">construction</span>
                    <h4>Sub Component</h4>
                    <h4><b>Air filter</b></h4>
                </div>
            </div>
            <div class="actions">
                <button>Add to template</button>
                <button>Edit</button>
                <button>Reject</button>
            </div>
        </div>


        <div class="overlayview hidden"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    echo "<script> var ROOT = '" . ROOT . "'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/Moderator/statistics.js"></script>
</body>

</html>