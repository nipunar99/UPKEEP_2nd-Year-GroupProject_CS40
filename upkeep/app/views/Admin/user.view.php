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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

                <a href="<?=ROOT?>/Technician/Findjobs" >
                    <span class="material-icons-sharp">work</span>
                    <h3>Find Jobs</h3>
                </a>

                <a href="<?=ROOT?>/Technician/Orders" >
                    <span class="material-icons-sharp">list_alt</span>
                    <h3>Orders</h3>
                </a>

                <a href="<?=ROOT?>/Technician/Gigs" class="active">
                    <span class="material-icons-sharp">task</span>
                    <h3>Gigs</h3>
                </a>

                <a href="<?=ROOT?>/Community">
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
            <div class="top">
                <h1>GIGS</h1>
                <div class="right">
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

            <div class="toolbar">
                <a class="show-modal addGig btn" href="#addgig">Add GIG</a> 
                <a class="viewitem btn" href="#">View Available Items</a> 
            </div>
            
            <div class="gigs">
                <?php if(!empty($data['gigList'])) : ?>
                <div class="insight">
                <?php foreach($data["gigList"] as $gig) : ?>
                        <div class="gig-card">
                            <div class="middle">  
                                <div class='gig-cover'>
                                    <img src='http://localhost/upkeep/upKeep/public/assets/images/Gigcover.jpg'  alt=''>
                                </div>
                                <h1><?=$gig->title?></h1>
                                <?php if(empty($gig->rating)):?>
                                    <p>No Reviews Yet</p> 
                                <?php else:?>
                                    <?php echo "Rating: "?>
                                        <?php for($i=0;$i<5;$i++):?>
                                            <?php if((int)round($gig->rating)>$i):?>
                                                <span class="fa fa-star checked"></span>
                                            <?php else:?>
                                                <span class="fa fa-star"></span>
                                            <?php endif;?>
                                        <?php endfor;?>
                                    <?= "(".round($gig->rating,1).")"?>
                                <?php endif;?>    
                                <div class="description">
                                    <p>
                                        <?=$gig->description?>
                                    </p>
                                    <div class="dots">...</div>
                                </div>
                                <?php $arr=explode(",",$gig->work_tags);?>

                                <div class="worktagsContainer">
                                    <?php foreach($arr as $tag) : ?>
                                    <a class="worktags"><?=$tag?></a>
                                    <?php endforeach; ?>
                                </div>
                                
                            </div>
                            <a class="moreDetailsBtn" href="<?=ROOT?>/Technician/Gigs/viewGig/<?=$gig->gig_id?>"><div style="text-align: center; margin-top:8px;"><small class="text-muted">View More</small></div></a>
                        </div>
                    
                <?php endforeach;?>
                </div>
                <?php endif; ?>
            </div>
        <!-- </main>  -->

        <!-- End of Main -->

        <!-- <div class="right"> -->
            
            <!-- End of top -->

        <!-- </div> -->
        </main>
    </div>

    <div id="addgig" class="overlay">
        <div class="popup">
            <div class="middle">
                <a class="close" href="#"><span class="material-icons-sharp">cancel</span></a>
                <h1>Create Gig</h1>
            </div>
            <!-- <div class="form"> -->
                <form class="form" action="<?=ROOT?>/Technician/Gigs/" id="addgigform" method="POST">
                    <div class="gigDetails">
                        <div class="inline">
                            <div class="input-box inline">
                                <span class="details">Choose Item</span>
                                <!-- <input type="text" name="item" id="item" required placeholder=""> -->
                                <select id="item" name="item">
                                    <option value="A/C">A/C</option>
                                    <option value="Refrigerator">Refrigerator</option>
                                    <option value="Washing Machine">Washing Machine</option>
                                    <option value="Gas Cooker">Gas Cooker</option>
                                </select>
                            </div>
                            
                            <div class="input-box inline">
                                <span class="details">Location</span>
                                <input type="text" name="location" id="location" required placeholder="Enter Description about item">
                            </div>
                        </div>

                        <div class="input-box">
                            <span class="details">Title</span>
                            <input type="text" name="title" id="title" required placeholder="I Will do... (etc) ">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea type="text" name="description" id="description" required placeholder="Enter Description about work that can be done"></textarea>
                        </div>
        
                        <div class="input-box">
                            <span class="details">Work Tags</span>
                            <input type="text" name="work_tags" id="work_tags" required placeholder="Tags to specify work. Ex - A/C Repair, A/C Gas Filling">
                        </div>

                        <div class="input-box">
                            <span class="details">Add Photo</span>
                            <!-- <input type="file" name="image" id="image" placeholder="add images related to your work"> -->
                            <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="add images related to your work">
                        </div>

                    </div>
                    <div class="button">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            <!-- </div> -->
                
        </div>
    </div>    

    <script src="<?= ROOT ?>/assets/js/addgig.js"></script>

</body>
</html>




