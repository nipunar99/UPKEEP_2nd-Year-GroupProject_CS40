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
    <!-- <link rel="stylesheet1" href="<?=ROOT?>/assets/css/Admin/admindashboard.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/addmoderator.css">
    
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

                <a href="#" class="active">
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

                <!-- <a href="<?=ROOT?> /Admin/ItemTemplate">
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
            
            <div class="header">
                <div class="left">

                </div>
                <div class="middle">
                    <h1>Administrative Users</h1>
                </div>
                <div class="right">
                    <div class="notification">
                        <span class="material-icons-sharp">notifications</span>
                    </div>

                    <div class="profile">
                        <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                        <div class="info">
                            <div class="name"><p><?= $_SESSION['USER']->first_name." ".$_SESSION['USER']->last_name ?></b></p></div>
                            <small class="text-muted role"><?=ucfirst($_SESSION['user_role'])?></small>
                        </div>
                        <div class="profile-photo">
                            <div><img src="<?= ROOT ?>/assets/images/user.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="action-bar">
                    <div class="button-container">
                        <div class="search-bar-container">
                            <input type="text" placeholder="Search...">
                            <button class="search-button"><span class="material-icons-sharp">search</span></button>
                        </div>
                        <button id="add_admin" class="add-button">Add Admin</button>
                        <button id="add_mod" class="add-button">Add Moderator</button>
                        <!-- <a id="btn_mod" class="btn_action1 addMode">Add Moderator</a> -->
                        <!-- <button  ></button> -->

                    </div>
                </div>

                <div class="table-container">
                    <table class="technician-table">
                        <thead>
                            <tr>
                            
                            <th>Name</th>
                            <th>User ID</th>
                            <th>Email</th>
                            <th>Registered Date</th>
                            <th>User Role</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php if(!empty($admin)):?>
                                <?php for($i=0;$i<count($admin);$i++):?>
                                    <tr 
                                        data-userDetails = <?=json_encode($admin[$i])?>
                                    >                                         
                                        <td><?=$admin[$i]->first_name." ".$admin[$i]->last_name ?></td>
                                        <td><?=$admin[$i]->user_id ?></td>
                                        <td><?=$admin[$i]->email ?></td>
                                        <td><?=$admin[$i]->registered_date ?></td>
                                        <td><?=$admin[$i]->user_role ?></td>
                                        <td>
                                            <div class="btn-container">
                                                <button id="editor_btn" class="edit-button">Edit</button> 
                                                <button id="remove_btn" class="remove-button">Remove</button>
                                            </div>
                                            
                                        </td>
                                        
                                    </tr>
                                <?php endfor;?>
                            <?php endif ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

    


        </main>
</div>
        
        
        

    <!-- moderator adding popup form -->
    <div class="overlay hidden" id="overlay"></div>
        <div class="popup hidden" id="addmod">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <h1 id="addmod">Add Moderator</h1>
                <form class="mobile-verify" id="addModerator-details" method="post" >
                    <div class = "mobile-number-input" id="step1">
                        <div class="inline">
                            <div class="input-field">
                                <label>First Name</label>
                                <input class="mobile" type="text" id="first_name" name="first_name" required placeholder="First Name" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>Last Name</label>
                                <input class="mobile" type="text" id="last_name" name="last_name" required placeholder="Last Name" >
                                <small class="error">&nbsperror</small>
                            </div>
                        </div>

                        <div class="inline">
                            <div class="input-field">
                                <label>Email</label>
                                <input class="mobile" type="text" id="email" name="email" required placeholder="Email" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>NIC</label>
                                <input class="mobile" type="text" id="nic" name="nic" required placeholder="NIC" >
                                <small class="error">&nbsperror</small>
                            </div>
                        </div>
                        <div class="input-field">
                            <label>Adrress</label>
                            <input class="mobile" type="text" id="address" name="address" required placeholder="Address" >
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
                            <div class = "btn-styles">
                                <!-- <input type="submit" value="Add Moderator" id="addModeratorbtn">  -->
                                <button id="addModeratorbtn">Add Moderator</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        
        <!-- admin adding popup form -->
        <div class="popup hidden" id="addadmin">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <h1>Add Admin</h1>
                <form class="mobile-verify" id="admin-details" method="post" enctype="" >
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

        <!-- administrative user editing popup form -->
        <div class="popup hidden" id="editmod" >
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <h1>Edit Moderator</h1>
                <form class="mobile-verify" id="addUpdated-details" method="post" enctype="" >
                    <div class = "mobile-number-input" id="step1">
                        <div class="inline">
                                <div class="input-field">
                                    <label>First Name</label>
                                    <input class="mobile" type="text" id="first_name" name="first_name" required placeholder="First Name" >
                                    <small class="error">&nbsperror</small>
                                </div>
                                <div class="input-field">
                                    <label>Last Name</label>
                                    <input class="mobile" type="text" id="last_name" name="last_name" required placeholder="Last Name" >
                                    <small class="error">&nbsperror</small>
                                </div>
                        </div>
                        <div class="inline">
                            <div class="input-field">
                                <div class="input-field">
                                    <label>User Name</label>
                                    <input class="mobile" type="text" id="user_name" name="user_name" required placeholder="Enter username" >
                                    <small class="error">&nbsperror</small>
                                </div>
                            </div>

                            <div class="input-field">
                                <label>Email</label>
                                <input class="mobile" type="text" id="email" name="email" required placeholder="Enter email" >
                                <small class="error">&nbsperror</small>
                            </div>
                            
                        </div>
                        <div class="inline">
                            <div class="input-field">
                                <label>NIC</label>
                                <input class="mobile" type="text" id="nic" name="nic" required placeholder="NIC" >
                                <small class="error">&nbsperror</small>
                            </div>
                            <div class="input-field">
                                <label>Contact</label>
                                <input class="mobile" type="text" id="mobile_no" name="mobile_no" required placeholder="Enter contact" >
                                <small class="error">&nbsperror</small>
                            </div>
                            

                        </div>

                        <div class="inline">
                            <div class="input-field">
                                    <label>Adrress</label>
                                    <input class="mobile" type="text" id="address" name="address" required placeholder="Address" >
                                    <small class="error">&nbsperror</small>
                                </div>
                            
                            
                        </div>
                        

                        
                        <div class="btn-container">
                            <div class="changes">
                                <button id="save_changes">Save changes</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

         <!-- administrative user removing popup form -->
        <div class="popup hidden" id="removemod">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content-1">
                <div class="content-2">
                    <h2>Confirm deletion of this Moderator</h2>
                </div>
                
                <form class="mobile-verify" id="remove-adminusers" method="post" enctype="" >
                    <div class ="head" >
                        <h3>Are you sure you you want to remove this moderator?</h3>
                    </div>
                    <div class="btn-container">
                                <button id="yes">Yes,I'm Sure</button>
                                <button id="no">Cancel</button>
                                
                        </div>
 
                    


                        
                       
                    
                </form>
            </div>
        </div>
    
       <?php
            echo "<script> var ROOT = '".ROOT."'; </script>";
        ?>
        <script src="<?= ROOT ?>/assets/js/Admin/addModerator.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/popupform.js"></script>
        <script src="<?=ROOT?>/assets/js/Admin/adminusers.js"></script>  
        <script src="<?=ROOT?>/assets/js/Admin/updateadminusers.js"></script>  


        

</body>
</html>
