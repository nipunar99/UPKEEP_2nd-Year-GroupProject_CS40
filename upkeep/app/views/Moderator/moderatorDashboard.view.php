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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/moderatordashboard.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                <img src="<?= ROOT ?>/assets/images/title.png" alt="">
            </div>
            <div class="sidebar">
                <a href="#" class="active">
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

                <a href="<?= ROOT ?>/Moderator/Statistics">
                    <span class="material-icons-sharp">person</span>
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
                <div class="mainDisplay1">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <h2>15</h2>
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
                    <h2>Recent Item Suggestions</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Template Name</th>
                                <th>Item Type</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody class="suggestion_table">
                            <tr>
                                <td class="name">T_10001</td>
                                <td class="primary">Air Conditioner</td>
                                <td class="warning">Text</td>
                            </tr>

                            <tr>
                                <td class="name">T_10002 </td>
                                <td class="primary">Refrigerator</td>
                                <td class="warning">Text</td>
                            </tr>

                            <tr>
                                <td class="name">T_10003 </td>
                                <td class="primary">Microwave Oven</td>
                                <td class="warning">Text</td>
                            </tr>

                            <tr>
                                <td class="name">T_10004 </td>
                                <td class="primary">Gas Cooker</td>
                                <td class="warning">Text</td>
                            </tr>

                            <tr>
                                <td class="name">T_10005 </td>
                                <td class="primary">Washing Machine</td>
                                <td class="warning">Text</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?= ROOT ?>/Moderator/Suggestion">See more</a>
                </div>
                <div class="complaints">
                    <h2>Recent Complaints</h2>
                    <table>
                        <thead>
                            <tr>
                                <th>Complainer User Name</th>
                                <th>Date</th>
                                <th>Type</th>

                            </tr>
                        </thead>
                        <tbody class="complaints_table">
                            <tr>
                                <td>Nimal</td>
                                <td class="primary">2022/06/10</td>
                                <td class="primary">Gig</td>
                            </tr>

                            <tr>
                                <td>Amal</td>
                                <td class="primary">2022/05/10</td>
                                <td class="primary">Community</td>
                            </tr>
                            <tr>
                                <td>Kamal</td>
                                <td class="primary">2022/04/10</td>
                                <td class="primary">Gig</td>
                            </tr>
                            <tr>
                                <td>Sunil</td>
                                <td class="primary">2022/03/10</td>
                                <td class="primary">Community</td>
                            </tr>
                            <tr>
                                <td>Amila</td>
                                <td class="primary">2022/02/10</td>
                                <td class="primary">Gig</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="<?= ROOT ?>/Moderator/Complaint">See more</a>
                </div>
            </div>
        </main>
    </div>
    <script>
        const ROOT = "<?=ROOT?>";
    </script>
    <script src="<?= ROOT ?>/assets/js/Moderator/moderatordashboard.js"></script>
</body>
</html>