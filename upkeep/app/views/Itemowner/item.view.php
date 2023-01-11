<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpKeep</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/items.css">
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
                <a href="<?= ROOT ?>/Itemowner/Userdashboard/">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Notifications</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">error</span>
                    <h3>Reports</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <div class="mainHeader">
                <h1>Items</h1>
                <div class="right">
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
                                <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End of top -->
        
                    <!-- End of recent updates -->
        
                </div>
    
            </div>
            
            <div class="toolbar">
                <div class="searchBar">
                    <input type="search" name="" id="" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div>
                <button class="addItem">Add an Item</button>
                
                <button class="availItem">Available Items</button>
            </div>

            <div class="insight"></div>
            
        </main> 

        <div class="popupview popupview1 hidden">
            <button class="closebtn">&times;</button>

            <div class="content content1">

                <form method="post" enctype="multipart/form-data" id="form_itemDetails">
                <h2>Item Details</h2>
                    <div class="itemDetails">
                        <div class="input-box">
                            <span class="details">Item Name</span>
                            <input type="text" name="item_name" id="" required placeholder="Enter Item Name">
                        </div>
        
                        <div class="input-box">
                            <span class="details">Item type</span>
                            <select name="item_type" id="itemtype" ></select>
                        </div>

                        <div class="input-box">
                                <span class="details">Image</span>
                                <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="Enter Brand">
                        </div>
                        
                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Brand</span>
                                <input type="text" name="brand" id="" required placeholder="Enter Brand">
                            </div>
            
                            <div class="input-box">
                                <span class="details">Model</span>
                                <input type="text" name="model" id=""  placeholder="Enter Model">
                            </div>
            
                            <div class="input-box">
                                <span class="details">Purchase Price(Rs.)</span>
                                <input type="number" name="purchase_price" id=""  placeholder="Purchase Price">
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" name="description" id=""  placeholder="Enter Description about item">
                            </div>

                            <div class="input-box">
                                <span class="details">Purchase Date</span>
                                <input type="date" name="purchase_date" id=""  placeholder="Enter Purchase Date">
                            </div>

                            <div class="input-box">
                                <span class="details">Warrenty Date</span>
                                <input type="date" name="warrenty_date" id=""  placeholder="Enter Warrenty Date">
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Next" id="nextBtn"> 
                            <!-- itemDetails -->
                        </div>
        
                    </div>
                </form>

            </div>
        </div>

        <div class="popupview popupview2 hidden">
            <button class="closebtn1">&times;</button>

            <div class="content content2">

                <!-- <form method="post" enctype="multipart/form-data" id=""> -->
                    
                    <div class="itemDetails">
                        <h2>Documentation</h2>
                        <div class="middleInput">                            
                            <div class="input-box">
                                <span class="details">Bill</span>
                                <input type="file" class = "imgInput" name="image" id=""  placeholder="Enter Brand">
                            </div>

                            <div class="input-box">
                                    <span class="details">Warrenty Card</span>
                                    <input type="file" class = "imgInput" name="image" id=""  placeholder="Enter Brand">
                            </div>

                            <div class="input-box">
                                    <span class="details">User Manual</span>
                                    <input type="file" class = "imgInput" name="image" id=""  placeholder="Enter Brand">
                            </div>
                    </div>

                    <button id="finishBtn">Finish</button>
                    </div>
                </form>

        </div>
    </div>
        
    <div class="overlayview hidden"></div>
    
    
    <script src="<?= ROOT ?>/assets/js/Itemowner/items.js"></script>
</body>
</html>
