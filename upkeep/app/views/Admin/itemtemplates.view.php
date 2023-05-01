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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/itemtemplates.css">
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
                
                <a href="<?=ROOT?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Requests </h3>
                </a>

                <a href="#" >
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

                <a href="#"class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?> /Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                
                

                
                

<!-- 
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Notifications</h3>
                    <span class="message-count">11</span>
                </a> -->

                

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
        <div class="mainhead">
                
                <h1>item Templates</h1>

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
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="search-bar" style="margin-top:3rem;">
                <form>
                    <input type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                    
                    
                    
                    
                </form>
                
                <div>
                    <button id ="add_item" class="filter-btn">Add Item</button>

                </div>

            </div>

            <div class="grid-container">
                <?php for($i=0;$i<count($item);$i++):?>
                        <a href="<?=ROOT?>/Admin/ItemTemplate/viewtemplate/" >
                            <div class="item">
                                <div>
                                    <h3><?=$item[$i]->item_type?></h3>
                                </div>
                                <div class="photo-container">
                                    <img src="<?=ROOT?>/assets/images/item1.png" alt="Profile photo">
                                </div>
                                
                            </div>
                        </a>
                    <?php endfor;?>
                <!-- grid items go here -->
                
                
                
                
            </div>


            
        </main> 


    </div>

    
        <!-- add item popup form -->
        <div class="overlay hidden" id="overlay"></div>
        <div class="popup hidden" id="additem">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <h1>Add Item</h1>
                <form class="mobile-verify" id="mobile-details" method="post" enctype="" >
                    <div class = "mobile-number-input" id="step1">
                        <div class="inline">
                            <div class="input-field">
                                <label>First Name</label>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" required placeholder="First Name" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>Last Name</label>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" required placeholder="Last Name" >
                                <small class="error">&nbsperror</small>
                            </div>
                        </div>

                        <div class="inline">
                            <div class="input-field">
                                <label>Email</label>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" required placeholder="Email" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>NIC</label>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" required placeholder="NIC" >
                                <small class="error">&nbsperror</small>
                            </div>
                        </div>
                        <div class="input-field">
                            <label>Adrress</label>
                            <input class="mobile" type="text" id="mobile_number" name="mobile_number" required placeholder="Address" >
                            <small class="error">&nbsperror</small>
                        </div>
                        <div class="inline">
                            <div class="input-field">
                                <label>Phone Number</label>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" required placeholder="Phone Number" >
                                <small class="error">&nbsperror</small>
                            </div>
                            
                        </div>
                        
                        <div class="btn-container">
                            <button id="submit">Add Admin</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/additem.js"></script>
    
    
</body>
</html>
