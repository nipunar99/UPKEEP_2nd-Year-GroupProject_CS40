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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/community.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                    <img src="<?= ROOT ?>/assets/images/title.png" alt="">
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


                <a href="<?=ROOT?>/Conversation">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="<?=ROOT?>/Technician/Statistics">
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
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="searchBar">
                    <input type="search" name="" id="" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
            </div>

            <section class="main-content">
    
                <div class="write-post-container">
                    <div class="user-profile">
                        <img src="http://localhost/upkeep/upkeep/public/assets/images/profile-2.jpg">
                        <div>
                            <p>Adonis</p>
                            <small>Public <i class="fa-solid fa-caret-down"></i></small>
                        </div>
                    </div>
    
                    <div class="post-input-container">
                        <textarea rows="3" placeholder="What's on your mind, Mewan?"></textarea>
                        <div class="add-post-links">
                            <a href="#"><img src="<?= ROOT ?>/assets/images/live-video.png"> Live Video</a>
                            <a href="#"><img src="<?= ROOT ?>/assets/images/photo.png"> Photo/Video</a>
                            <a href="#"><img src="<?= ROOT ?>/assets/images/feeling.png"> Feling/Activity</a>
                        </div>
                    </div>
                </div>
    
    
    
                <!------post 1-------->
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="<?= ROOT ?>/assets/images/profile-2.jpg">
                            <div>
                                <p>Nimna Induwara</p>
                                <span>January 04 2023, 15:40 pm</span>
                            </div>
                        </div>
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
    
                    <p class="post-text"><b>What is the best way to unfreeze frozen AC pipes?</b> <br>
                        Turn the unit off and let it set but the iced piping is evidence of an under lying 
                        problem such as a plugged air filter, low refrigerant charge or running in cool night time conditions 
                        which lowers the indoor cooling coils temperature. Any air flow conditions such as too many supply registers closed, 
                        blocked off return air grilles or possibly a dirty cooling coil (evaporator) which will restrict air flow and result 
                        in a freeze up.mthing to everyone.</p>

                    <img src="<?= ROOT ?>/assets/images/feed-image-1.png" class="post-img">
    
                    <div class="post-row">
                        <div class="activity-icons">
                            <div><img src="<?= ROOT ?>/assets/images/like-blue.png"> 187</div>
                            <div><img src="<?= ROOT ?>/assets/images/comments.png"> 43</div>
                            <div><img src="<?= ROOT ?>/assets/images/share.png"> 21</div>
                        </div>
                    </div>

                </div>
    
                <!------post 2------->
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="<?= ROOT ?>/assets/images/profile-4.jpg">
                            <div>
                                <p>Mewan Sampath</p>
                                <span>January 01 2023, 08:35 am</span>
                            </div>
                        </div>
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
    
                    <p class="post-text"><b>What effect do rolling brown-outs have on home A/C and refridgerators?</b> <br>
                        Brownouts cause a drop in voltage. Low voltage conditions can cause the compressor, 
                        especially, to fail to start and damage the internal motor. In cases where brownouts are likely, 
                        sometimes it’s appropriate to install a hard start kit to provide a boost to the compressor on startup.</p>
                        <img src="<?= ROOT ?>/assets/images/feed-image-2.png" class="post-img">
    
                        <div class="post-row">
                            <div class="activity-icons">
                                <div><img src="<?= ROOT ?>/assets/images/like-blue.png"> 187</div>
                                <div><img src="<?= ROOT ?>/assets/images/comments.png"> 43</div>
                                <div><img src="<?= ROOT ?>/assets/images/share.png"> 21</div>
                            </div>
                        </div>

                </div>

                <!------post 3------->
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="<?= ROOT ?>/assets/images/profile-4.jpg">
                            <div>
                                <p>Mewan Sampath</p>
                                <span>January 01 2023, 08:35 am</span>
                            </div>
                        </div>
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
    
                    <p class="post-text"><b>What effect do rolling brown-outs have on home A/C and refridgerators?</b> <br>
                        Brownouts cause a drop in voltage. Low voltage conditions can cause the compressor, 
                        especially, to fail to start and damage the internal motor. In cases where brownouts are likely, 
                        sometimes it’s appropriate to install a hard start kit to provide a boost to the compressor on startup.</p>
                        <img src="<?= ROOT ?>/assets/images/feed-image-2.png" class="post-img">
    
                        <div class="post-row">
                            <div class="activity-icons">
                                <div><img src="<?= ROOT ?>/assets/images/like-blue.png"> 187</div>
                                <div><img src="<?= ROOT ?>/assets/images/comments.png"> 43</div>
                                <div><img src="<?= ROOT ?>/assets/images/share.png"> 21</div>
                            </div>
                        </div>

                </div>

                <!------post 4------->
                <div class="post-container">
                    <div class="post-row">
                        <div class="user-profile">
                            <img src="<?= ROOT ?>/assets/images/profile-4.jpg">
                            <div>
                                <p>Mewan Sampath</p>
                                <span>January 01 2023, 08:35 am</span>
                            </div>
                        </div>
                        <a href="#"><i class="fas fa-ellipsis-v"></i></a>
                    </div>
    
                    <p class="post-text"><b>What effect do rolling brown-outs have on home A/C and refridgerators?</b> <br>
                        Brownouts cause a drop in voltage. Low voltage conditions can cause the compressor, 
                        especially, to fail to start and damage the internal motor. In cases where brownouts are likely, 
                        sometimes it’s appropriate to install a hard start kit to provide a boost to the compressor on startup.</p>
                        <img src="<?= ROOT ?>/assets/images/feed-image-2.png" class="post-img">
    
                        <div class="post-row">
                            <div class="activity-icons">
                                <div><img src="<?= ROOT ?>/assets/images/like-blue.png"> 187</div>
                                <div><img src="<?= ROOT ?>/assets/images/comments.png"> 43</div>
                                <div><img src="<?= ROOT ?>/assets/images/share.png"> 21</div>
                            </div>
                        </div>

                </div>

                
    
                
    
                <!--load more Button-->
                <button type="button" class="load-more-btn">Load More</button>
    
            </section>



        </main>
        <!-- End of Main -->

        <div class="right">
            <div class="heading">
                <div class="top">
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
                            <small class="text-muted">User</small>
                        </div>
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
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
</body>
</html>