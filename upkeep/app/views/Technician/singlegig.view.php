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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gig.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

</head>
<body>
    <div class="container">
    <aside>
            <div class="top">
                <script>console.log("Loaded")</script>

                <div class="logo">
                    <img src=<?=ROOT."/assets/images/logo.png"?> alt="">
                    <img src=<?=ROOT."/assets/images/title.png"?> alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Technician/Dashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">work</span>
                    <h3>Find Jobs</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">list_alt</span>
                    <h3>Orders</h3>
                </a>

                <a href="<?=ROOT?>/Technician/Gigs" class="active">
                    <span class="material-icons-sharp">task</span>
                    <h3>Gigs</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Notifications</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">analytics</span>
                    <h3>Statistics</h3>
                </a>

                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            
            <!-- <div class="header"> -->
                <div class="top">
                    <!-- <h1>GIGS</h1> -->
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
                            <small class="text-muted">Technician</small>
                        </div>
                        <div class="profile-photo">
                            <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            <!-- </div>     -->

            <div class="gig-container">
                <div class="left">
                    <div class="gigDetails">
                        <div class="image-caraousel">
                            <div class="slide fade">
                                <img src="<?=ROOT?>/assets/images/Gigcover.jpg" alt="">
                            </div>
                            <div class="next">
                                <span class="material-icons-sharp">chevron_right</span>
                            </div>
                            <div class="prev">
                                <span class="material-icons-sharp">chevron_left</span>
                            </div>    
                        </div>
                        <h1><?=$gigDetails[0]->title?></h1>
                        <?php $arr=explode(",",$gigDetails[0]->work_tags);?>
                        <?php foreach($arr as $tag) : ?>
                        <a class="worktags"><?=$tag?></a>
                        <?php endforeach; ?>
                        <div class="location"><span class="material-icons-sharp">location_on</span><p><?=$gigDetails[0]->location?></p></div>
                        <p><?=$gigDetails[0]->description?></p>
                    </div> 
                  
                    <div class="heading-title"><h1>Overall Rating</h1></div>
                    <div class="rating-part">
                        <div class="overall-rating">
                            <div class="average-rating">
                                <h2>2.5</h2>
                                <i aria-hidden="true" class="fa fa-star"></i>
                                <i aria-hidden="true" class="fa fa-star"></i>
                                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                <i aria-hidden="true" class="fa fa-star-o"></i>
                                <i aria-hidden="true" class="fa fa-star-o"></i>
                            </div>
                            <div class="loder-ratimg">
                                <div class="progress"></div>
                                <div class="progress-2"></div>
                                <div class="progress-3"></div>
                                <div class="progress-4"></div>
                                <div class="progress-5"></div>
                            </div>
                        </div>  

                        <div style="clear: both;"></div>
                        <div class="reviews"><h1>Reviews</h1></div>
                            <div class="comment-part">
                                <div class="user-img-part">
                                    <div class="user-img">
                                        <img src="/demo/man01.png">
                                    </div>
                                    <div class="user-text">
                                        <h4>8 days ago</h4>
                                        <p>Tom kok</p>
                                        <span>Report</span>
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="comment">
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star-o"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco.</p>
                                </div>
                                <div style="clear: both;"></div>
                            </div>

                            <div class="comment-part">
                                <div class="user-img-part">
                                    <div class="user-img">
                                        <img src="/demo/man02.png">
                                    </div>
                                    <div class="user-text">
                                        <h4>30 days ago</h4>
                                        <p>Win Rool</p>
                                        <span>Report</span> 
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="comment">
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star"></i>
                                    <i aria-hidden="true" class="fa fa-star-o"></i>
                                    <i aria-hidden="true" class="fa fa-star-o"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco.</p>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                    </div>
                </div>

                <div class="right">
                    <div class="profile-details">
                        <h1>Profile Details</h1>
                    </div>
                </div>
            </div>

            
            
        
        </main>
    </div>


    <script src="<?= ROOT ?>/assets/js/addgig.js"></script>

</body>
</html>





