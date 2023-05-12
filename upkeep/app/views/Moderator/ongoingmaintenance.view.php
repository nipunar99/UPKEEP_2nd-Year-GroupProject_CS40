<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/ongoingmaintenance.css">
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
                <a href="<?= ROOT ?>/Moderator/Moderatordashboard">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Itemtemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Statistics">
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
            <div class="mainHeader">
                <h1>Account View</h1>
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
            
            <div class="view-1">
                <div class="imge">
                    <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                </div>
                <div class="view-1-text">
                    <h2>Profile</h2>
                    <div class="name">
                        <h5>Supun Perera</h5>
                        
                    </div>
                   
                </div>
                
            </div>
            
            <div class="maintenances">
                <h2>Ongoing maintenances</h2>
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
                            <tr>
                                <td>Description</td>
                                <td>Sub Component</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>Sub Component</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                               
                                <td>Description</td>
                                <td>Sub Component</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                            <tr>
                               
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
    </div>
</body>

</html>