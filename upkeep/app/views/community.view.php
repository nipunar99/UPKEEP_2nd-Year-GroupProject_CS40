<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/779982a7ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/community.css">
</head>
<body>
    <div class="container">
        <aside class="close">
            <div class="header nbs">
                <div class="left">
                </div>
                <div class="center">
                    <div class="header-logo">
                        <a><img src="<?=ROOT?>/assets/images/headerlogo2.svg" alt=""></a>
                    </div>
                </div>
                <div class="right"></div>
            </div>

            <div class="middle">
                <div class="sidebar">
                    <a href="<?=ROOT?>/Technician/Dashboard" >
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Findjobs" >
                        <span class="material-icons-sharp">work</span>
                        <h3>Find Jobs</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Orders" >
                        <span class="material-icons-sharp">list_alt</span>
                        <h3>Orders</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Gigs">
                        <span class="material-icons-sharp">task</span>
                        <h3>Gigs</h3>
                    </a>


                    <a href="<?=ROOT?>/Community" class="active">
                        <span class="material-icons-sharp">forum</span>
                        <h3>Community</h3>
                    </a>


                    <a href="<?=ROOT?>/Coversation">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Conversation</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Statistics">
                        <span class="material-icons-sharp">analytics</span>
                        <h3>Statistics</h3>
                    </a>
                </div>
            </div>

            <div class="bottom">
                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>


        </aside>

        <main>
            <div class="header nbs">
                <div class="center">
                    <h1>Community</h1>
                </div>
            </div>

            <div class="searchBar-container">
                <div class="searchBar">
                        <input type="search" name="" id="" placeholder="Search in the Community">
                        <span class="material-icons-sharp">search</span>
                </div>
            </div>

            <section class="main-content">
                <div class="list-container">
                    <div class="card">
                        <div class="card-col">
                            <div class="card-row">
                                <div class="user-profile">
                                    <img src="http://localhost/upkeep/upkeep/public/assets/images/profile-2.jpg">
                                </div>

                                <div class="post-input-container">
                                    <input type="text" rows="3" placeholder="What do you need to ask or share?"></input>
                                </div>
                            </div>
                            <div class="card-row">
                                <a class="post-type text-muted"><i class="fa fa-question-circle"></i>Ask</a>
                                <a class="post-type text-muted"><i class="fas fa-lightbulb"></i>Recommend</a>
                                <a class="post-type text-muted"><i class="fas fa-recycle"></i>Scrap and Sell</a>

                            </div>
                        </div>
                    </div>


                    <ul class="list">
                        <li>
                            <div class="card">
                                <div class="post-container">
                                    <div class="card-header">
                                        <div class="user-profile">
                                            <img src="<?= ROOT ?>/assets/images/profile-2.jpg">
                                            <div>
                                                <h3>Nimna Induwara</h3>
                                                <p class="text-muted">January 04 2023, 15:40 pm</p>
                                            </div>
                                        </div>
                                        <a class="post-type-tag">Ask From Community</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-row" id="about">
                                            <h3 class="about-title">About</h3>
                                            <div class="Item-details">
                                                <a class="tag">Air Conditioner</a>
                                            </div>
                                        </div>

                                        <p class="title"><b>What is the best way to unfreeze frozen AC pipes?</b></p>
                                        <p class="text"></p>
                                        <div class="image-grid"></div>

                                    </div>
                                    <div class="card-footer">
                                        <div class="left activity-icons">
                                            <a class="action upvote"><span class="material-symbols-outlined">shift</span><p class="count" id="upvote-count">10</p></a>
                                            <a class="action downvote"><span class="material-symbols-outlined">shift</span><p class="count" id="downvote-count">10</p></a>
                                            <a class="action comment"><span class="material-symbols-outlined">comment</span><p class="count" id="comment-count">10</p></a>
                                        </div>
                                        <div class="right">
                                            <a class="action"><span class="material-icons-sharp">report</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="image-modal" class="modal">
                                <span class="close-modal">&times;</span>
                                <div class="image-container">
                                    <img id="modal-image" class="modal-image">
                                </div>
                                <a class="prev">&#10094;</a>
                                <a class="next">&#10095;</a>
                            </div>
                        </li>
                    </ul>

                    <button type="button" class="load-more-btn">Load More</button>
                </div>
            </section>
        </main>
        <!-- End of Main -->
        <div class="itempannelbtn">
            <span class="material-icons-sharp arrowback">arrow_back_ios</span>
        </div>

        <div class="right">
            <div class="header nbs">
                <div class="right">
                    <div class="notification">
                        <div>
                            <span class="material-icons-sharp" onclick="openNav()">notifications</span>
                            <span class="badge"></span>
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

            <div class="recent-updates">
                <h2>Popular Posts</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Namal Eranga</b> Namal Eranga  It seems like it. All my relatives and friends have one.(more)</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-3.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Amali Piris</b>Both of those should have their
                                 own breaker in the electric panel. I would open the panel and take... (more)</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-4.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Suranga Nadun</b>The compressor can still turn but 
                                without refrigerant it won't do anything. That's just one common issue.. (more)</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recent-updates">
                <h2>Recent Notifications</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-2.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-3.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>

                    <div class="update">
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-4.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mike Tyson</b> received his order of Night lion tech GPS drone</p>
                            <small class="text-muted"> 2 Minute ago</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <?php
            echo "<script> var ROOT = '".ROOT."'; </script>";
        ?>


        <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
        <script src="<?= ROOT ?>/assets/js/community.js"></script>
        <script src="<?= ROOT ?>/assets/js/imagemodal.js"></script>
        <script src="<?=ROOT?>/assets/js/Technician/tabs.js"></script>
        <script src="<?=ROOT?>/assets/js/notification.js"></script>
</body>
</html>