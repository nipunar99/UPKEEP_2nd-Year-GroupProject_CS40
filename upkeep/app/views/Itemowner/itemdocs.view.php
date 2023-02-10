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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/itemdocs.css">
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

                <a href="<?= ROOT ?>/itemowner/item" class="active">
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

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <div class="mainHeader">
                <h1>Documentation</h1>
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
            <!-- <div class="toolbar">
                <div class="searchBar">
                    <input type="search" name="" id="" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div>
                <button class="addItem">Add an Item</button>
                <button class="availItem">Available Items</button>
            </div> -->

            <div class="insight">
                
                <div class="item">

                    <div class="itemImg">
                        <img src="<?= ROOT ?>/assets/images/upload/GEO-266.png" alt="">
                        <h2>
                        GEO Inverter Refrigerator
                        </h2>
                        <h3>Singer</h3>
                    </div>

                    <div class="itemDetails">
                        <div class="details">
                            <div class="subDetails">
                                <h3>Item Name</h3>
                                <h4>Samsung WindFree AirConditioner</h4>
                            </div>
                            <div class="subDetails">
                                <h3>Item Type</h3>
                                <h4>Air Conditioner</h4>
                            </div>
                            <div class="subDetails">
                                <h3>Brand</h3>
                                <h4>Samsung</h4>
                            </div>
                            <div class="subDetails">
                                <h3>Model</h3>
                                <h4>M-3511</h4>
                            </div>
                            <div class="subDetails">
                                <h3>Purches Price</h3>
                                <h4>Rs.100000</h4>
                            </div>
                            <div class="subDetails">
                                <h3>Warranty Date</h3>
                                <h4>01/03/2024</h4>
                            </div>
                        </div>
                        <div class="btnDetails">
                            <button class="addItem">Edit Item Details</button>
                        </div>
                    </div>
                    
                </div>

                <div >
                    <h2>documentation</h2>
                    <div class="documentation">
                        <div>
                            <img src="<?= ROOT ?>/assets/images/manual.jpg" alt="">
                            <h3>User Manual</h3>
                        </div>
                        <div>
                            <img src="<?= ROOT ?>/assets/images/manual.jpg" alt="">
                            <h3>Bill</h3></div>
                        <div>
                            <img src="<?= ROOT ?>/assets/images/manual.jpg" alt="">
                            <h3>Warranty Card</h3>
                        </div>

                        <div class="addDoc">
                            <span class="material-icons-sharp">add</span>
                            <h3>Add Document</h3>
                        </div>
                    </div>
                </div>

                <div>
                    <h2>Description</h2>
                    <div class="description">

                    </div>
                </div>
            </div>
        </main> 

    </div>
</body>
</html>