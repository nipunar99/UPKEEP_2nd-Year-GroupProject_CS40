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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

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
                <a href="<?= ROOT ?>/Itemowner/Userdashboard/">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/TechnicianGigs" >
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

                <a href="#">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
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
            <div class="mainHeader">
                <h1>Items</h1>
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
            
            <div class="toolbar">
                <div class="searchBar">
                    <input type="search" name="" id="searchItem" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div>
                <button class="addItem">Add an Item</button>
                
                <button class="availItem">Available Items</button>
            </div>

            <div class="insight"></div>
            
        </main> 

        <div class="popupview popupview1 ">
            <button class="closebtn">&times;</button>

            <div class="content content1">

                <form method="post" enctype="multipart/form-data" id="form_itemDetails">
                <h2>Item Details</h2>
                    <div class="itemDetails">
                        <div class="input-box">
                            <span class="details">Item Name</span>
                            <input type="text" name="item_name" id="item_name" required placeholder="Enter Item Name">
                            <small></small>
                        </div>
                        
                        <div class="threeinputs"> 
                            <div class="input-box">
                                <span class="details">Categary</span>
                                <!-- check names -->
                                <select name="category" id="categary" ></select>
                                <small></small>
                                <input class="hidden" type="text" name="category_id" id="categoryid" >

                            </div>
                            <div class="input-box">
                                <span class="details">Items</span>
                                <select name="item_type" id="itemtype" ></select>
                                <small></small>
                                <input class="hidden" type="text" name="id" id="id" >
                            </div>
                            <div class="input-box hidden" id="subIteminput">
                                <span class="details">SubItems</span>
                                <select name="subitem_type" id="subitemtype" ></select>
                                <input class="hidden"  type="text" name="sub_id" id="sub_id" >
                                <small></small>
                            </div>
                            <div class="input-box hidden" id="altertypeinput">
                                <span class="details">Enter Item type</span>
                                <input type="text" name="alter_type" id="alter_type" required placeholder="Enter Type">
                                <small></small>
                            </div>
                        </div>

                        <div class="input-box">
                                <span class="details">Image</span>
                                <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="Enter Brand">
                        </div>
                        
                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Brand</span>
                                <input type="text" name="brand" id="brand" required placeholder="Enter Brand">
                                <small></small>
                            </div>
            
                            <div class="input-box">
                                <span class="details">Model</span>
                                <input type="text" name="model" id=""  placeholder="Enter Model">
                                <small></small>

                            </div>
            
                            <div class="input-box">
                                <span class="details">Purchase Price(Rs.)</span>
                                <input type="number" name="purchase_price" id="purchase_price"  placeholder="Purchase Price">
                                <small></small>
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" name="description" id=""  placeholder="Enter Description about item">

                            </div>

                            <div class="input-box">
                                <span class="details">Purchase Date</span>
                                <input type="date" name="purchase_date" id="purchase_date"  placeholder="Enter Purchase Date">
                                <small></small>
                            </div>

                            <div class="input-box">
                                <span class="details">Warrenty Date</span>
                                <input type="date" name="warrenty_date" id="warrenty_date"  placeholder="Enter Warrenty Date">
                                <small></small>
                            </div>
                        </div>
                        <div class="button">
                            <input type="submit" value="Next" id="nextBtn"> 
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="popupview popupview2 ">
            <button class="closebtn1">&times;</button>

            <div class="content content2">

                <form method="post" enctype="multipart/form-data" id="form_docFiles">
                    
                    <div class="itemDetails">
                        <h2>Documentation</h2>
                        <div class="middleInput">  

                            <div class="input-box">
                                <span class="details">Bill</span>
                                <input type="file" class = "imgInput billfile" name="bill_file" id=""  placeholder="Enter Bill file">
                                <small></small>
                            </div>

                            <div class="input-box">
                                    <span class="details">Warrenty Card</span>
                                    <input type="file" class = "imgInput Warrentyfile" name="Warrenty_file" id=""  placeholder="Enter Warrenty file">
                                    <small></small>
                            </div>

                            <div class="input-box">
                                    <span class="details">User Manual</span>
                                    <input type="file" class = "imgInput manualfile" name="manual_file" id=""  placeholder="Enter User Manual file">
                                    <small></small>
                            </div>
                    </div>

                    <button id="finishBtn">Finish</button>
                    </div>
                </form>

        </div>
    </div>


    <div class="overlayview "></div>
    
    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/Itemowner/items.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/public.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/validation.js"></script>
    <script src="<?=ROOT?>/assets/js/notification.js"></script>
</body> 
</html>
