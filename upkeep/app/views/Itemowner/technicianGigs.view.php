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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Itemowner/viewgig.css">
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


                <a href="<?= ROOT ?>/Conversation">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="<?= ROOT ?>/itemowner/Statistic">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="<?= ROOT ?>/Accountsettings">
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
                        <div class="input-box">
                            <span class="details">Categary</span>
                            <select name="category" id="categary" ></select>

                        </div>
                        <div class="input-box">
                            <span class="details">Item</span>
                            <select name="item_type" id="itemtype" ></select>
                        </div>

                        <div class="input-box">
                            <span class="details">District</span>
                            <select  name="district" id="district1"required ></select>
                        </div>
                        <div class="input-box">
                            <span class="details">City</span>
                            <select  name="city" id="city1" required ></select>
                        </div>

                        <div class="input-box filterButton ">
                            <button class="actionBtn" onclick="filterGigs()">Apply</button>
                        </div>

                        <div class="input-box">
                            <a href="<?=ROOT?>/itemowner/TechnicianGigs/myorders"><button class="actionBtn" >My Jobs</button></a>
                            <button class="actionBtn" onclick="pubicJobForm()">Public Jobs</button>
                        </div>
                        
                    </div>
                </div>
                <!-- <div class="searchBar">
                    <input type="search" name="" id="" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div> -->
                
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
        <div class="overlayview "></div>

        <div class="popupview popupview1 ">
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
                            
                            <div class="input-box hidden">
                                <span class="details">Item Id</span>
                                <input  type="text" name="item_id" id="itemid" required>
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Title</span>
                                <input type="text" name="title" id="title" required placeholder="Enter Title">
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" name="description" id="description" required placeholder="Enter Description">
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Job Type</span>
                                <select name="job_type" id="jobtype" >
                                    <option value="Repair">Repair</option>
                                    <option value="Maintenance">Maintenance</option>
                                    <option value="Other">Other</option>
                                </select>
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Delivary Method</span>
                                <select name="delivery_method" id="delivarymethod" ></select>
                                <small></small>
                            </div>
                            <div class="input-box">
                                <span class="details">Date</span>
                                <input type="date" name="date" id="schedule_date"  placeholder="Enter Schedule Date">
                                <small></small>
                            </div>   
                        </div>   

                        <div class="middlethree">
                            <div class="input-box">
                                <span class="details">Address</span>
                                <input type="text" name="address" id="address" required placeholder="Enter Location">
                                <input class="hidden"  type="number" name="address_id" id="addressid" >
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
                                <span class="details">Contact No</span>
                                <input type="number" name="contact_no" id="contact_no"  placeholder="Enter Contact No">
                                <small></small>
                            </div>
                        </div>
                        
                        <div  class="button">
                            <input onclick="submitPost(event)" type="submit"  value="Post Job" id="nextBtn"> 
                        </div>
        
                    </div>
                </form>

            </div>
        </div>

    </div>  
    
    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/Itemowner/public.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/Gigs.js"></script>
    <script src="<?=ROOT?>/assets/js/notification.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/validation.js"></script>

</body>
</html>



