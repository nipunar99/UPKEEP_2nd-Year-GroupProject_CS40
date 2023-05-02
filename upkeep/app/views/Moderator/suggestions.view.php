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
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/suggestions.css">
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
                <a href="#" class="active">
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
                    <h1>Suggestions</h1>
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
            <div class="toolbar">
                <div class="searchBar">
                    <input type="search" name="" id="txtHint" placeholder="Search item" onkeyup="myFunction()">
                    <span class="material-icons-sharp">search</span>
                </div>

                <div class="filter">
                    <button onclick="showDropdwn()" class="filter_table"><span class="material-icons-sharp">filter_list</span>
                        <div class="fil"> Filter
                        </div>
                    </button>
                    <select class="table-status" id="main-dropdwn" style="display:none;">
                        <optgroup label="Status" id="status">Status
                            <option value="1">Approved</option>
                            <option value="2">Pending</option>
                        </optgroup>
                        <optgroup label="Item Type">Status
                            <option value="3">Electronics</option>
                            <option value="4">Appliances</option>
                            <option value="5">Tools and equipment</option>
                            <option value="6">Vehicles</option>
                            <option value="7">Furniture</option>
                            <option value="8">Home and garden</option>
                            <option value="9">Other</option>
                        </optgroup>
                    </select>

                </div>

            </div>

            <div class="insight">
                <!-- <div class="maintenancess"> -->
                    <div class="tab">
                        <button class="tablinks" onclick="openComplaints(event, 'item')" id="defaultOpen">
                            <h1>Item Suggestions </h1>
                        </button>
                        <button class="tablinks" onclick="openComplaints(event, 'maintenance')" id="communi">
                            <h1>Maintenance Suggestions</h1>
                        </button>

                    </div>
                    <div class="item" id="item">

                        <!-- <h1>Item Suggestions</h1> -->
                        <div class=" card-mainn">
                            <!-- <div class="item-class" style="position: relative;"> -->
                                <!-- <a href="<?= ROOT ?>/Moderator/Itemsuggestion"> -->
                                    <div class="card-main" role="button" style="position: relative;">

                                    <a href="<?= ROOT ?>/Moderator/Itemsuggestion"><img src="<?= ROOT ?>/assets/images/item1.png" alt=""></a>
                                    <div class="text">
                                        <h3><b>Non Inverter</b></h3> 
                                        <p>Air Conditioner</p>
                                    </div>
                                    </div>
                                <!-- </a> -->
                           
                        </div>




                        <!-- </div> -->
                    </div>
                <!-- </div> -->
            <!-- <div class="maintenancess"> -->
                <div class="item" id="maintenance">

                    <!-- <h1>Maintenance Suggestions</h1> -->

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
                                <tr class="show-r-1">
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
    <script src="<?= ROOT ?>/assets/js/Moderator/suggestions.js"></script>
</body>

</html>