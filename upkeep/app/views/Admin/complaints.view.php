<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/complaints.css">
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
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Administrative Users</h3>
                </a>
                <a href="<?=ROOT?>/Admin/UserTab">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>


                <a href="#" class="active">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?=ROOT?>/Admin/ItemTemplate" >
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
                
                <h1>Complaints</h1>

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

            
            <div class="content">
                <div class="action-bar">
                    <div class="button-container">
                        <div class="search-bar-container">
                            <input type="text" placeholder="Search...">
                            <button class="search-button"><span class="material-icons-sharp">search</span></button>
                        </div>
                        
                        <!-- <button  ></button> -->

                    </div>
                </div>

                <div class="table-container">
                    <table class="technician-table">
                        <thead>
                            <tr>
                            
                            <th>Complaint Id</th>
                            <th>Post Id</th>
                            <th>Complaint Type</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                            <tr>                                         
                            <?php for($i=0;$i<count($complaints);$i++):?>
                                <tr>                                         
                                    <td><?=$complaints[$i]->complaint_id ?></td>
                                    <td><?=$complaints[$i]->post_id ?></td>
                                    <td><?=$complaints[$i]->complaint_type ?></td>
                                    <td><?=$complaints[$i]->description ?></td>
                                    <td><?=$complaints[$i]->status ?></td>
                                    <td>
                                        <div class="button_container1">
                                            <button class="view-button">View</button> 
                                            <button class="remove-button">Remove</button>
                                        </div>
                                    </td>
                                    
                                    
                                </tr>
                            <?php endfor;?>
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td></td>
                                <td>
                                        <div class="button_container1">
                                            <button class="view-button">View</button> 
                                            <button class="remove-button">Remove</button>
                                        </div>
                                    </td>
                                
                                
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td></td>
                                <td>
                                        <div class="button_container1">
                                            <button class="view-button">View</button> 
                                            <button class="remove-button">Remove</button>
                                        </div>
                                    </td>
                                
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td></td>
                                <td>
                                        <div class="button_container1">
                                            <button class="view-button">View</button> 
                                            <button class="remove-button">Remove</button>
                                        </div>
                                    </td>
                                        
                                    
                            </tr>
                            <tr>                                         
                                <td>Nipuna Rahal</td>
                                <td>5</td>
                                <td>rahal@gmail.com</td>
                                <td>verified</td>
                                <td></td>
                                <td>
                                        <div class="button_container1">
                                            <button class="view-button">View</button> 
                                            <button class="remove-button">Remove</button>
                                        </div>
                                    </td>
                                        
                                    
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            

            
            
       
            </div>

        </main>
        <!-- End of Main -->
        

</body>
</html>