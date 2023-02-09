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

                <a href="<?= ROOT ?>/Signout">
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

            <div class="filter-search">
                <div>
                <div class="filter-container">
                    <div class="filter-item">
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
                <?php if(!empty($data['gigList'])) : ?>
                <div class="insight">
                <?php foreach($data["gigList"] as $gig) : ?>
                        <div class="gig-card">
                            <div class="middle">
                                <div class="technician-profile">                                    
                                    <div class="profile-pic">
                                        <img src="<?=ROOT?>/assets/images/profile-2.jpg">
                                    </div>
                                    <div class="profile-info">
                                        <h3>Sahan Perera</h3>
                                        <?php if(empty($gig->rating)):?>
                                            <p>No Reviews Yet |</p> 
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
                                    </div>
                                </div>
                                <div class="gigDesc">
                                    <h2><?=$gig->title?></h2>  
                                </div>
                                  
                                <?php $arr=explode(",",$gig->work_tags);?>

                                <div class="worktagsContainer">
                                <h3>Roles</h3>
                                    <?php foreach($arr as $tag) : ?>
                                    <a class="worktags"><?=$tag?></a>
                                    <?php endforeach; ?>
                                </div>
                                <div class="location">
                                    <span class="material-icons-sharp">location_on</span>
                                    <h3><?=$gig->location?></h3>
                                </div>
                            </div>
                            <div class="action-bar">
                                <a href="" class="view">View</a>
                            </div>
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



