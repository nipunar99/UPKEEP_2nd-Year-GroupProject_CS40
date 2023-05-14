<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/itemmaintenance.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">

        <aside>
            <div class="top">
                <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                <img src="<?= ROOT ?>/assets/images/title.png" alt="">
            </div>
            <div class="sidebar">
                <a href="<?=ROOT?> /Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                
                <a href="<?=ROOT?> /Admin/VerifyRequest">
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

                <!-- <a href="#" class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a> -->

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
                
                <h1>Item Maintenance</h1>

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
            <div class="insight">
                <div class="card-main">
                <div class="item-container">
                    <div class="item-photo">
                        <img src="<?= ROOT ?>/assets/images/item2.png" alt="Item Photo">
                    </div>
                    <div class="item-details">
                        <h2>Item Name</h2>
                        <p>Item Description</p>
                        <p>Price: $10.99</p>
                        
                            <div class="btn">
                                <a href="#">
                                        <button class="edit">Edit</button>
                                </a>   
                                
                                <a href="#">
                                        <button class="delete">Delete</button>
                                </a>
                            </div>
                        
                        
                    </div>
                    </div>

                <div class="view-2">
                    <h2>Usage</h2>
                    <div class="view-2-text">
                        <div class="users">
                            <h3>Users</h3>
                            <h4>50 users are using</h4>
                            <h4>123 posts</h4>
                            <h4>25 suggested task</h4>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="maintenances">

                    <h2>Maintenance</h2>
                    <a href ="#">
                        <span> <button class="addmaintenance">Add Maintenance</button></span>
                    </a>
                    
                    <div class="card-main2">
                    <div class='card-1'>
                        
                        <div class="maintenance-container">
                            
                            <div class="maintenance-details">
                                <h4>Maintenance Schedule1</h4>
                                        <ul>
                                        <li>Clean Air Filter</li>
                                        <li>23/10/2023</li>
                                        <li style="color:red;">pending</li>
                                        </ul>
                            </div>
                            <div class="maintenance-photo">
                                <img src="<?= ROOT ?>/assets/images/component1.png" alt="Maintenance Photo">
                                <button class="maintenance-button">Action</button>
                            </div>
                        </div>
                    </div>


                        


                        

                        
                        <div class="card-2">

                            <div class="maintenance-container">
                            
                                <div class="maintenance-details">
                                    <h4>Maintenance Schedule 2</h4>
                                        <ul>
                                        <li>Clean Air Filter</li>
                                        <li>23/10/2023</li>
                                        <li style="color:red;">pending</li>
                                        </ul>
                                </div>
                                <div class="maintenance-photo">
                                    <img src="<?= ROOT ?>/assets/images/component2.png" alt="Maintenance Photo">
                                    <button class="maintenance-button">Action</button>
                                </div>
                            </div>

                        </div>

                        <div class="card-3">

                            <div class="maintenance-container">
                            
                                <div class="maintenance-details">
                                    <h4>Maintenance Schedule 3</h4>
                                        <ul>
                                        <li>Clean Air Filter</li>
                                        <li>23/10/2023</li>
                                        <li style="color:red;">pending</li>
                                        </ul>
                                </div>
                                <div class="maintenance-photo">
                                    <img src="<?= ROOT ?>/assets/images/component3.png" alt="Maintenance Photo">
                                    <button class="maintenance-button">Action</button>
                                </div>
                            </div>

                        </div>

                        <div class="card-4">

                            <div class="maintenance-container">
                            
                                <div class="maintenance-details">
                                    
                                    <h4>Maintenance Schedule 4</h4>
                                    <ul>
                                    <li>Clean Air Filter</li>
                                    <li>23/10/2023</li>
                                    <li style="color:red;">pending</li>
                                    </ul>
                                </div>
                                <div class="maintenance-photo">
                                    <img src="<?= ROOT ?>/assets/images/component4.png" alt="Maintenance Photo">
                                    <button class="maintenance-button">Action</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </main>
        <div class="overlay hidden" id="overlay"></div>

        <div class="popup hidden" id="additem">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <h1>Add Admin</h1>
                <form class="mobile-verify" id="additem" method="post" enctype="" >
                    <div class = "mobile-number-input" id="step1">
                        <div class="inline">
                            <div class="input-field">
                                <label>First Name</label>
                                <input class="mobile" type="text" id="mobile_number" name="first_name" required placeholder="First Name" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>Last Name</label>
                                <input class="mobile" type="text" id="mobile_number" name="last_name" required placeholder="Last Name" >
                                <small class="error">&nbsperror</small>
                            </div>
                        </div>

                        <div class="inline">
                            <div class="input-field">
                                <label>Email</label>
                                <input class="mobile" type="text" id="mobile_number" name="email" required placeholder="Email" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>NIC</label>
                                <input class="mobile" type="text" id="mobile_number" name="nic" required placeholder="NIC" >
                                <small class="error">&nbsperror</small>
                            </div>
                        </div>
                        <div class="input-field">
                            <label>Adrress</label>
                            <input class="mobile" type="text" id="mobile_number" name="address" required placeholder="Address" >
                            <small class="error">&nbsperror</small>
                        </div>
                        <div class="inline">
                            <div class="input-field">
                                <label>Phone Number</label>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_no" required placeholder="Phone Number" >
                                <small class="error">&nbsperror</small>
                            </div>
                            
                        </div>
                        
                        <div class="btn-container">
                            <!-- <input type="submit" value="Add Admin" id="addAdminbtn">  -->
                            <button id="addAdminbtn">Add Admin</button>

                            <!-- <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <script src="<?= ROOT ?>/assets/js/Admin/additem.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>

        <!-- <div class="popupview hidden">
            <button class="closebtn">&times;</button>
            <div class="popup-text">
                <div class="1">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h4>Item name</h4>
                    <h4><B>Samsung Inverter Windfree AC</B> </h4>
                </div>
                <div class="2">
                    <span class="material-icons-sharp">chat_bubble_outline</span>
                    <h4>Maintenance task</h4>
                    <h4><b>Replace HAVC air filters</b></h4>
                </div>
                <div class="3">
                    <span class="material-icons-sharp">construction</span>
                    <h4>Sub Component</h4>
                    <h4><b>Air filter</b></h4>
                </div>
            </div>
            <div class="actions">
                <button>Add to template</button>
                <button>Edit</button>
                <button>Reject</button>
            </div>
        </div>


        <div class="overlayview hidden"></div>
    </div>
    <script src="<?= ROOT ?>/assets/js/Moderator/item.js"></script> -->
</body>

</html>