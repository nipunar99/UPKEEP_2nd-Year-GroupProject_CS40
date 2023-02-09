<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ItemTemplates</title>
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
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="<?=ROOT?>/Admin/Technician">
                    <span class="material-icons-sharp">person</span>
                    <h3>Technicians</h3>
                </a>


                <a href="<?=ROOT?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="#" class="active" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="#">
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
                
                <h1>Item Templates</h1>

                <div class="heading">
                    <div class="tp">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>
        
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp">dark_mode</span>
                        </div>

                        <div class="profile">
                            <div class="info">
                                <p>Chamara Silva</p>
                                <!-- <small class="text-muted">User</small> -->
                            </div>
                            <div class="profile-photo">
                                <img src="<?=ROOT?>/assets/images/profile-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            

            
            <div class="top">
                    <div class="boxContainer">
                        <form action="">
                            <input type="text" placeholder="Search..." >
                            
                            
                            <button type="submit">
                                
                                Search</button>
                          </form>
                
                    </div>
                    
                    <div class="filter">
                        <button id="filter-btn"><h4>Add Item</h4></button>
                    </div>


                    
                
            </div>
            
              
            
            <div class="summary"> 
                  
                <div class="summaryBoxes">
                    
                    <a href ="<?=ROOT?>/Admin/ItemMaintenance">
                        <div class="summaryBox">
                                <div class="dp">
                                    <div>
                                        <span class="guy"><h2>Washing Machine</h2></span>
                                        </div>
                                    
                                </div>
                                <div class="middle">
                                    <img src="<?=ROOT?>/assets/images/item3.png">
                                    
                                </div>
                                
                        </div>
                    </a>
                    <div class="summaryBox">
                        <div class="dp">
                            <div>
                                <span class="guy"><h2>Oven</h2></span>
                                </div>
                            
                        </div>
                        <div class="middle">
                            <img src="<?=ROOT?>/assets/images/item4.png">
                            
                        </div>
                        
                </div>
                <div class="summaryBox">
                    <div class="dp">
                        <div>
                            <span class="guy"><h2>AC</h2></span>
                            </div>
                        
                    </div>
                    <div class="middle">
                        <img src="<?=ROOT?>/assets/images/item1.png">
                        
                    </div>
                    
            </div>
            <div class="summaryBox">
                <div class="dp">
                    <div>
                        <span class="guy"><h2>Refrigerator</h2></span>
                        </div>
                    
                </div>
                <div class="middle">
                    <img src="<?=ROOT?>/assets/images/item2.png">
                    
                </div>
                
        </div>
                <div class="summaryBox">
                    <div class="dp">
                        <div>
                            <span class="guy"><h2>Refrigerator</h2></span>
                            </div>
                        
                    </div>
                    <div class="middle">
                        <img src="<?=ROOT?>/assets/images/item2.png">
                        
                    </div>
                    
            </div>
            <div class="summaryBox">
                <div class="dp">
                    <div>
                        <span class="guy"><h2>Refrigerator</h2></span>
                        </div>
                    
                </div>
                <div class="middle">
                    <img src="<?=ROOT?>/assets/images/item2.png">
                    
                </div>
                
        </div>
                    
                
                
                
                
                    
                
                    

                    
                    
                </div>
            </div>

            

        </main>
        <!-- End of Main -->
        

</body>
</html>