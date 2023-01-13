<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/itemSuggestions.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">

        <aside>
            <div class="top">
                <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                <img src="<?= ROOT ?>/assets/images/title.png" alt="">
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">dashboard</span>
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
                <a href="#">
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Statistics</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="mainHeader">
                <h1>Item Suggestions</h1>
                <div class="right">
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey,<b>Saman</b></p>
                        <small class="text-muted">user</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                    </div>
                </div>
                </div>
            </div>
        <div class="insight">
            <div class="card-main">
            <div class="view-1">
                <div class="img">
                    <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                </div>
                <div class="view-1-text">
                    <h2>Non Inverter</h2>
                    <div class="name">
                        <h5>Tempalte Name</h5>
                        <h5><b>T_34235 Air Conditioner</b></h5>
                    </div>
                    <div class="type">
                        <h5>Item Type</h5>
                        <h5><b>Air Conditioner</b></h5>
                    </div>
                    <div class="date">
                        <h5>Added date</h5>
                        <h5><b>01/11/2022</b> </h5>
                    </div>
                    <div class="lifespan">
                        <h5>Esti.li.span</h5>
                        <h5><b>10 Years</b></h5>
                    </div>
                </div>
                <div class="view-1-button">
                    <button>Edit</button>
                    <button>Delete</button>
                </div>
            </div>
            <div class="view-2">
                <h2>Usage</h2>
                <div class="view-2-text">
                    <div class="users">
                        <h3>Current Users</h3>
                        <h4>50</h4>
                    </div>
                    <div class="tasks">
                        <h3>Current Suggested Tasks</h3>
                        <h4>Task 1</h4>
                        <h4>Task 2</h4>
                        <h4>Task 3</h4>
                    </div>
                </div>
            </div>
            </div>
            <div class="accounts">
                <h2>Tracking Accounts</h2>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <th>User Account</th>
                                <th>Name</th>
                                <th>Account Status</th>
                                <th>Date</th>
                                <th>Number of Maintenance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td>Supun Perera</td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td>Supun Perera</td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td>Supun Perera</td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td>Supun Perera</td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </main>
    </div>
</body>

</html>