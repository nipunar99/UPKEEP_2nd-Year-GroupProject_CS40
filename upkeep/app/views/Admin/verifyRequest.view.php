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
     <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/verifyrequest.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-yacmIiZmY4ZpH4tA+8tbaThL5vi5r5pOuOvUV8X7VjQoC2Oaa/+GhBw8b7W1G6mv" crossorigin="anonymous">


</head>

<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?=ROOT?>/assets/images/logo.png" alt="">
                    <img src="<?=ROOT?>/assets/images/title.png" alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?> /Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                
                <a href="#" class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Requests </h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Administrative Users</h3>
                </a>
                <a href="<?=ROOT?>/Admin/UserTab">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>
                
                <a href="<?=ROOT?> /Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?> /Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
        <div class="mainhead">
                
                <h1>Verification Requests</h1>

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
                                <small class="text-muted">Admin</small>
                            </div>
                            <div class="profile-photo">
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="search-bar">
                <div class="search-tab">
                        iiii
                </div>
                <div class="search-tab">
                        iiii
                </div>
                <div class="search-tab">
                        iiii
                </div>
            </div> -->
            <div class="search-bar" style="margin-top:3rem;">
                <form>
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                    
                    
                    
                    
                </form>
                <div class = "accounts">
                    <h2><?=$verify_tech[0]->count ?> Account</h2>
                </div>
                <div>
                    <button class="filter-btn"><i class="fa fa-filter" style="margin-right:0.6rem;"></i> Filter</button>

                </div>

            </div>
            <div class = "head">
            <h4>Verification Requests</h4>
            <div class="grid-container">
                
                <?php for($i=0;$i<count($technician);$i++):?>
                    <a href="<?=ROOT?>/Admin/VerificationRequest">
                    <div class="item">
                        <div class="photo-container">
                                <img  src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Profile photo"> 
                                   
                            </div>
                            <div class="details-container">
                                <h2><?=$technician[$i]->first_name ?></h2>
                                <p><?=$technician[$i]->type ?>|<?=$technician[$i]->city ?></p>
                            </div>
                            <div class="contact-details">
                                <p><?=$technician[$i]->email ?></p>
                                <p><?=$technician[$i]->mobile_no ?></p>

                            </div>
                    </div>
                </a>
                <?php endfor;?>
                





<!-- 
                <a href="<?=ROOT?>/Admin/VerificationRequest">
                    <div class="item">
                        <div class="photo-container">
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Profile photo">
                                    
                        </div>
                        <div class="details-container">
                            <h2>Rusith</h2>
                            <p>Auto Mobile|Maharagama</p>    
                        </div>
                        <div class="contact-details">
                            <p>rusith123rusith@gmail.com</p>
                            <p>0702050912</p>

                        </div>
                    </div>
                </a> -->




               





           



                        
                
        
            </div>


            
            
        </main> 

    </div>
    
    
</body>
</html>
