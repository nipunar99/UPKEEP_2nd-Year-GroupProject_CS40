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
                <h1>Item Suggestions</h1>
                <div class="right">
                <!-- <div class="top">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button> -->
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
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
                        <h5>Template Name</h5>
                        <p>T_34235 Air Conditioner</p>
                    </div>
                    <div class="type">
                        <h5>Item Type</h5>
                        <p>Air Conditioner</p>
                    </div>
                    <div class="date">
                        <h5>Added date</h5>
                        <p>01/11/2022 </p>
                    </div>
                    <div class="lifespan">
                        <h5>Esti.li.span</h5>
                        <p>10 Years</p>
                    </div>
                </div>
                <div class="view-1-button">
                    <button><div class="approve">Approve</div></button>
                    <button><div class="delete">Delete</div></button>
                </div>
            </div>
            <div class="view-2">
                <h2>Usage</h2>
                <div class="view-2-text">
                    <div class="users">
                        <h3>Current Users</h3>
                        <h4><b> 50</b></h4>
                    </div>
                    <div class="tasks">
                        <h3 class="new">Current Suggested Tasks</h3>
                        <h4>34</h4>
                        <!-- <h4>Task 2</h4>
                        <h4>Task 3</h4> -->
                    </div>
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
            <!-- <div class="accounts">
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
                            
                            <tr >
                            
                                <td ><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""> </td>
                                <td role="button"><a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" > Supun Perera</a></td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                            
                            <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">
                            <tr>
                           
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td role="button"><a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" > Supun Perera</a></td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                                
                            </tr>
                            </a>
                            <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">
                            <tr>
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td role="button"><a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" > Supun Perera</a></td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                            </a>
                            <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">
                            <tr>
                                <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td>
                                <td role="button"><a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" > Supun Perera</a></td>
                                <td>Active</td>
                                <td>10/11/2022</td>
                                <td>10</td>
                            </tr>
                            </a>
                        </tbody>
                    </table>
                </div> -->
            <!-- </div> -->
        </div>
        </main>
        <div class="popupview1 hidden">
        <button class="closebtn1">&times;</button>
        <div class="popup-text1">
            <div class="1">
                <!-- <span class="material-icons-sharp">view_in_ar</span> -->
                <h4>Do you want to approve the item?</h4>
                <!-- <h4><B>Samsung Inverter Windfree AC</B> </h4> -->
            </div>
            <!-- <div class="2">
                <span class="material-icons-sharp">chat_bubble_outline</span>
                <h4>Maintenance task</h4>
                <h4><b>Replace HAVC air filters</b></h4>
            </div>
            <div class="3">
                <span class="material-icons-sharp">construction</span>
                <h4>Sub Component</h4>
                <h4><b>Air filter</b></h4>
            </div> -->
        </div>
        <div class="actions">
            <button>Add to template</button>
            <!-- <button>Edit</button> -->
            <button>Reject</button>
        </div>
        <div class="popupview2 hidden">
        <button class="closebtn2">&times;</button>
        <div class="popup-text2">
            <div class="2">
                <!-- <span class="material-icons-sharp">view_in_ar</span> -->
                <h4>Do you want to remove the item?</h4>
                <!-- <h4><B>Samsung Inverter Windfree AC</B> </h4> -->
            </div>
            <!-- <div class="2">
                <span class="material-icons-sharp">chat_bubble_outline</span>
                <h4>Maintenance task</h4>
                <h4><b>Replace HAVC air filters</b></h4>
            </div>
            <div class="3">
                <span class="material-icons-sharp">construction</span>
                <h4>Sub Component</h4>
                <h4><b>Air filter</b></h4>
            </div> -->
        </div>
        <div class="actions">
            <button>Yes</button>
            <!-- <button>Edit</button> -->
            <button>No</button>
        </div>
    </div>


    <div class="overlayview hidden"></div>
    </div>
    <script src="<?= ROOT ?>/assets/js/Moderator/itemsuggestions.js"></script>
    </div>
</body>

</html>