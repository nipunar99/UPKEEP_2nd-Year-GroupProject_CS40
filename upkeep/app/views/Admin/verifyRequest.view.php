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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">

    <!-- <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/findjobs.css"> -->

    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Admin/verifyrequest.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Admin/filterform.css">


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
                <a href="<?= ROOT ?> /Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                
                <a href="#" class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Requests </h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Addmoderator">
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

                <a href="<?=ROOT?> /Admin/ItemTemplate">
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
            <div class="header nbs">
                                <div class="left">

                                </div>
                                <div class="center">
                                    <h1>Find Jobs</h1>
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
            <!-- <div class="mainhead">

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
                    <button class="filter-button">Filter</button>

                </div>

            </div>
            <div class ="head">
                <h4>Verification Requests</h4>
            </div>
            <div class="grid-container">
                <?php if(!empty($technician)):?>
                    <?php for($i=0;$i<count($technician);$i++):?>
                        <a href="<?=ROOT?>/Admin/verifyRequest/viewrequest/<?=$technician[$i]->user_id?>">
                            <div class="item">
                                <div class="photo-container">
                                    <img  src="<?=ROOT?>/assets/images/member-4.png" alt="Profile photo"> 
                                    
                                </div>
                                <div class="details-container">
                                    <h2><?=$technician[$i]->first_name." ".$technician[$i]->last_name?> </h2>
                                    <p><?=$technician[$i]->location ?></p>
                                </div>
                                <div class="contact-details">
                                    <div class="vv">
                                        <p><?=$technician[$i]->email ?></p>
                                        <p><?=$technician[$i]->mobile_no ?></p>
                                    </div>

                                </div>
                            </div>
                        </a>
                    <?php endfor;?>
                <?php endif;?>
            </div>

     
            
        </main> 

    </div>

        
    <div class="slide-out-form">
        <button class="close-button"><span class="material-icons-sharp">close</span></button>
        <form>
            <div class="top_info">
                <div class="input_box">
                    <label for="name">First Name</label>
                    <input type="text" id="name" name="name" required placeholder="First name "><br><br>
                </div>
                <div class="input_box">
                    <label for="name">Last Name</label>
                    <input type="text" id="name" name="name" required placeholder="last name "><br><br>
                </div>
            </div>
            <div class="top_info">
                <div class="input_box">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required placeholder="email "><br><br>
                </div>
                <div class="input_box">
                    <label for="name">Phone Number</label>
                    <input type="text" id="mobile_no" name="Phone Number" required placeholder="phone number "><br><br>
                </div>
            </div>
            <div class="end_info">
                <label for="email">City</label>
                <input type="text" id="city" name="city" required placeholder="city" required placeholder="city"><br><br>
            </div>
            <!-- <label for="message">Message:</label>
            <textarea id="message" name="message"></textarea><br><br> -->
            <button type="submit">Submit</button>
        </form>
    </div>


    <script src="<?=ROOT?>/assets/js/Admin/filter.js"></script>

    
    
</body>

</html>
