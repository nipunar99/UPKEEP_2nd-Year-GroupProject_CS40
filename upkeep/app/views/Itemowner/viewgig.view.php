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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Itemowner/viewgig.css">
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
                <a href="<?=ROOT?>/Itemowner/Userdashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/item" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/TechnicianGigs" class="active">
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

                <a href="<?= ROOT ?>/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>

        </aside>

        <main>
            <div class="top">
                <h1>GIGS</h1>
                
            </div>
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
                                    <img src="<?= ROOT ?>/assets/images/profile-5.jpg" alt="">
                                    </div>
                                    <div class="user-text">
                                        <h4>8 days ago</h4>
                                        <p>Shashika Janith</p>
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
                                    <img src="<?= ROOT ?>/assets/images/profile-6.jpg" alt="">
                                    </div>
                                    <div class="user-text">
                                        <h4>30 days ago</h4>
                                        <p>Lahiru Kavishka</p>
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
                
            </div>    
        </main>

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
                            <small class="text-muted">Technician</small>
                        </div>
                        <div class="profile-photo">
                            <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-details">
                    <div class="profile-img">
                        <img src="<?=ROOT?>/assets/images/profile-2.jpg" alt="">
                    </div>
                    <div class="profile-text">
                        <h2>Sahan Perera</h2>
                        <?php if(empty($gig->rating)):?>
                            <p>No Reviews Yet</p> 
                        <?php else:?>
                            <?php echo "Overall Rating: "?>
                                <?php for($i=0;$i<5;$i++):?>
                                    <?php if((int)round($gig->rating)>$i):?>
                                        <span class="fa fa-star checked"></span>
                                    <?php else:?>
                                        <span class="fa fa-star"></span>
                                    <?php endif;?>
                                <?php endfor;?>
                            <?= "(".round($gig->rating,1).")"?>
                        <?php endif;?>
                    </div>
                    <div class="other-details">
                        <div>
                            <h4>Member Since:</h4>
                            <p>2020</p><br>
                            <h4>Experience:</h4>
                            <p>5 Years</p>
                        </div>
                        <div>
                            <h4>Location:</h4>
                            <p>Colombo</p><br>
                            <h4>Job Type:</h4>
                            <p>Workshop</p>
                        </div>
                    </div>
                    <div class="description">
                        <h4>Description:</h4>
                        <p>I am an expeirenced A/C Technician from Maharagama Providing my services visiting home and I have a workshop as well</p>
                    </div>
                    <div class="actions">
                        <a href="#" class="btn btn-primary hirebtn">Hire Me</a>
                    </div>
            </div>
        </div>
        

    </div>

    <div class="overlayview hidden"></div>

    <div class="popupview popupview1 hidden">
            <button class="closebtn">&times;</button>

            <div class="content content1">

                <form method="post" id="form_JobDetails">
                <h2>Job Details</h2>
                    <div class="itemDetails">
                        
                        <div class="middleInput">

                            <div class="input-box">
                                <span class="details">Item Name</span>
                                <select  name="item_name" id="itemname" required></select>
                                <small></small>
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Item Id</span>
                                <input type="text" name="item_id" id="itemid" required>
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" name="description" id="" required placeholder="Enter Description">
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Delivary Method</span>
                                <select name="delivary_method" id="delivarymethod" ></select>
                                <small></small>
                            </div>
                        </div>   

                        <div class="middlethree">
                            <div class="input-box">
                                <span class="details">Address</span>
                                <input type="text" name="address" id="" required placeholder="Enter Location">
                                <small></small>
                            </div>
                            <div class="input-box">
                                <span class="details">District</span>
                                <select  name="district" id="district"required ></select>
                                <small></small>
                            </div>
                            <div class="input-box">
                                <span class="details">City</span>
                                <select  name="city" id="city" required ></select>
                                <small></small>
                            </div>
                        </div>

                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Date</span>
                                <input type="date" name="date" id="schedule_date"  placeholder="Enter Schedule Date">
                                <small></small>
                            </div>
                            <div class="input-box">
                                <span class="details">Time</span>
                                <input type="time" name="time" id="schedule_time"  placeholder="Enter Schedule Time">
                                <small></small>
                            </div>               
                            <div class="input-box">
                                <span class="details">Contact No</span>
                                <input type="number" name="contact_no" id=""  placeholder="Enter Contact No">
                                <small></small>
                            </div>
                        </div>
                        
                        <div onclick="submitPost()" class="button">
                            <input type="button"  value="Post Job" id="nextBtn"> 
                        </div>
        
                    </div>
                </form>

            </div>
        </div>
    
        <script src="<?= ROOT ?>/assets/js/Itemowner/viewgig.js"></script>

</body>
</html>





