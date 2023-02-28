<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/item.css">
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
                <a href="<?= ROOT ?>/Moderator/Suggestion">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>
                <a href="#" class="active">
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
                <a href="<?= ROOT ?>/Moderator/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="mainHeader">
                <h1>Item</h1>
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
                        <?php 
                                $result = json_decode($data['result']);
                                $result_obj = $result[0];
                        ?>
                        <div class='img'>
                            <img src="<?= ROOT ?>/assets/images/uploads/<?= $result_obj->image?>">
                        </div>
                        <div class='view-1-text'>

                            <div class='name'>
                                <h5>Item Template Name</h5>
                                <p><?= $result_obj->itemtemplate_name?></p>
                            </div>
                            <div class='type'>
                                <h5>Item Type</h5>
                                <p><?= $result_obj->type_name?></p>
                            </div>


                        </div>

                        
                         <!-- <div class="view-1">
                       
                        <div class='img'>
                            <img src="<?= ROOT ?>/assets/images/uploads/2.png">
                        </div>
                        <div class='view-1-text'>

                            <div class='name'>
                                <h5>aa</h5>
                                <p>bb</p>
                            </div>
                            <div class='type'>
                                <h5>Item Type</h5>
                                <p>cc</p>
                            </div>


                        </div> -->


                        <div class="view-1-button">
                            <button>Edit</button>
                            <button class="delete">Delete</button>
                        </div>
                    </div>
                    <!-- <div class="view-3"> -->



                    <!-- <div class="view-3"></div> -->
                    <div class="view-2">
                        <div class="text">
                            <div class="text-1">
                                <p>Users</p>
                                <h1>250</h1>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Total Users 110</p>
                                <p>Item Users 10</p>

                            </div>
                        </div>
                        <div class="pie-view">

                        </div>
                        <!-- <h2>Usage</h2>
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
                        </div> -->
                    </div>
                </div>
                <div class="maintenances">

                    <h1>Sub Categories</h1>
                    <span> <button class="subcategory">&#43</button></span>
                    <div class="table">
                        <table>
                            <thead>
                                <tr>
                                    <!-- <th>Type</th> -->
                                    <th>Sub category</th>
                                    <!-- <th>Time Frame</th> -->
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody>
                            <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">  

                                <tr>

                                    <!-- <td ><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""> </td> -->
                                    <td role="button"><a href="<?= ROOT ?>/Moderator/Maintenance"> Type</a></td>
                                    <!-- <td>Sub Component</td> -->
                                    <!-- <td>Time Frame</td> -->
                                    <td>Description</td>
                                </tr>
</a>
                                <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">
                                    <tr>

                                        <!-- <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td> -->
                                        <td role="button"><a href="<?= ROOT ?>/Moderator/Maintenance"> Type</a></td>
                                        <!-- <td>Sub Component</td> -->
                                        <!-- <td>Time Frame</td> -->
                                        <td>Description</td>

                                    </tr>
                                </a>
                                <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">
                                    <tr>
                                        <!-- <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td> -->
                                        <td role="button"><a href="<?= ROOT ?>/Moderator/Maintenance"> Type</a></td>
                                        <!-- <td>Sub Component</td> -->
                                        <!-- <td>Time Frame</td> -->
                                        <td>Description</td>
                                    </tr>
                                </a>
                                <a href="<?= ROOT ?>/Moderator/Ongoingmaintenace" role="button">
                                    <tr>
                                        <!-- <td><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""></td> -->
                                        <td role="button"><a href="<?= ROOT ?>/Moderator/Maintenance"> Type</a></td>
                                        <!-- <td>Sub Component</td> -->
                                        <!-- <td>Time Frame</td> -->
                                        <td>Description</td>
                                    </tr>
                                </a>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="card-main2"> -->
                    <!-- <a href="<?= ROOT ?>/Moderator/Itemsuggestion"> -->
                    <!-- <div class="card-1" role="button">

                            <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                            <h3><b>Maintenance Schedule 1</b></h3>
                            <p>Clean Air filter</p>
                            <div class="c-1">

                                <p class="u">Air filter</p>
                                <h2 class="warning">25</h2>
                            </div> -->
                    <!-- </a> -->
                    <!-- </div> -->
                    <!-- <a href="<?= ROOT ?>/Moderator/Itemsuggestion"> -->
                    <!-- <div class="card-2" role="button">

                            <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                            <h3><b>Non Inverter</b></h3>
                            <p>Air Conditioner</p>
                            <div class="c-2">
                                <h2 class="warning">25</h2>
                                <p class="u">users</p>
                            </div> -->
                    <!-- </a> -->
                    <!-- </div> --> 


                    <!-- <a href="<?= ROOT ?>/Moderator/Itemsuggestion"> -->
                    <!-- <div class="card-3" role="button"> -->

                    <!-- <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                            <h3><b>Non Inverter</b></h3>
                            <p>Air Conditioner</p>
                            <div class="c-3">
                                <h2 class="warning">25</h2>
                                <p class="u"> users</p>
                            </div> -->
                    <!-- </a> -->
                    <!-- </div> -->

                    <!-- <a href="<?= ROOT ?>/Moderator/Itemsuggestion" role="button"> -->
                    <!-- <div class="card-4"> -->

                    <!-- <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                            <h3><b>Non Inverter</b></h3>
                            <p>Air Conditioner</p>
                            <div class="c-4">
                                <h2 class="warning">25</h2>
                                <p class="u"> users</p>
                            </div> -->
                    <!-- </a>    </div> -->
                    <!--  -->
                    <!-- </div> -->
                    <!-- </div> -->
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
    <script src="<?= ROOT ?>/assets/js/Moderator/item.js"></script>
</body>

</html>