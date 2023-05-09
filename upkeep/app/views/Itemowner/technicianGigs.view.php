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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Itemowner/findtechnicians.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="header nbs top">
            <div class="left">
            </div>
            <div class="center">
                <div class="header-logo">
                    <a><img src="<?=ROOT?>/assets/images/headerlogo2.svg" alt=""></a>
                </div>
            </div>
            <div class="right"></div>

            <div class="close" id="close-btn">
                <span class="material-icons-sharp">
                    close
                    </span>
            </div>
            </div>

            <div class="sidebar">
                <a href="<?= ROOT ?>/Itemowner/Userdashboard/" >
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/item">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="<?= ROOT ?>/Community">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

            </div>
            <div class="bottom">
                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>

        </aside>

        <main>
            <div class="top mainHeader">
                <h1>GIGS</h1>
                <div class="header nbs">
                    <div class="right">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>

                        <div class="notification">
                            <div>
                                <span class="material-icons-sharp" onclick="openNav()">notifications</span>
                                <span class="badge">3</span>
                            </div>
                        </div>

                        <div class="profile dropdown">
                            <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                            <div class="info">
                                <div class="name">
                                    <p><?= $_SESSION['USER']->first_name . " " . $_SESSION['USER']->last_name ?></b></p>
                                </div>
                                <small class="text-muted role"><?= ucfirst($_SESSION['user_role']) ?></small>
                            </div>
                            <div class="profile-photo">
                                <div><img src="<?= ROOT ?>/assets/images/photo2.png" alt=""></div>
                            </div>
                            <div class="dropdown-content hidden">
                                <a href="<?= ROOT ?>/Profile"><span class="material-icons-sharp">person</span>Profile</a>
                                <a href="<?= ROOT ?>/Accountsettings"><span class="material-icons-sharp">settings</span>Settings</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="filter-search">
                <div>
                    <div class="filter-container">
                        <!-- <div class="filter-item">
                            <label for="category">Category:</label>
                            <select id="category">
                            <option value="all">All</option>
                            <option value="category1">Category 1</option>
                            <option value="category2">Category 2</option>
                            </select>
                        </div>
                        <div class="filter-item">
                            <label for="sort">Sort:</label>
                            <select id="sort">
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                            </select>
                        </div> -->
                        <div class="input-box">
                            <span class="details">Categary</span>
                            <!-- check names -->
                            <select name="category" id="categary" ></select>
                            <small></small>
                            <input class="hidden" type="text" name="category_id" id="categoryid" >

                        </div>
                        <div class="input-box">
                            <span class="details">Item</span>
                            <select name="item_type" id="itemtype" ></select>
                            <small></small>
                            <input class="hidden" type="text" name="id" id="id" >
                        </div>

                        <div class="filter-item">
                            <label for="items">Items:</label>
                            <select id="items">
                            <option value="A/C">A/C</option>
                            <option value="Refridgerator">Refridgerator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="searchBar">
                    <input type="search" name="" id="" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div>
                
            </div>
            
            <div class="gigs">
                <div class="insight">
                        <div class="gig-card">
                            <div class="middle">
                                <div class="technician-profile">                                    
                                    <div class="profile-pic">
                                        <img src="<?=ROOT?>/assets/images/profile-2.jpg">
                                    </div>
                                    <div class="profile-info">
                                        <h3>Sahan Perera</h3>
                                        <p>No Reviews Yet |</p> 
                                        <span class="fa fa-star checked"></span>        
                                        <span class="fa fa-star"></span>                            
                                    </div>
                                </div>
                                <div class="gigDesc"><h2>test</h2></div>
                                <div class="worktagsContainer"><h3>Roles</h3></div>
                                <div class="location"><span class="material-icons-sharp">location_on</span><h3>hghdgh</h3></div>
                            </div>
                            <div class="action-bar">
                                <a href="<?= ROOT ?>/itemowner/ViewGig/selectGig/" class="view">View</a>
                            </div>
                        </div>
                </div>
            </div>

        </main>
    </div>  
    <!-- <div id="mySidenav" class="sidenav notification hiddenNotify">
        <div class="header">
            <div class="center">
                <h2>Notifications</h2>
            </div>
            <div class="tabs">
                <div class="tab-item active">
                    <i class="tab-icon fas fa-bell"></i>
                    Alert
                </div>
                <div class="tab-item">
                    <i class="tab-icon fas fa-clock"></i>
                    History
                </div>
                <div class="line"></div>
            </div>
            <span class="closebtn" onclick="closeNav()">&times;</span>
        </div>
        <div class="tab-content" >
            <div class="tab-pane active" id="">
                <ol id="notification-list-unread">

                </ol>


            </div>

            <div class="tab-pane" id="">
                <ol id="notification-list-history">

                </ol>

            </div>
    </div> -->
    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/Itemowner/Gigs.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/public.js"></script>
    <script src="<?=ROOT?>/assets/js/notification.js"></script>
</body>
</html>



