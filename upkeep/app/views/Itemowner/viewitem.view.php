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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/viewItem.css">
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
                <a href="<?= ROOT ?>/Itemowner/Userdashboard/" >
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active" >
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
            <div class="boardtitle">
                <h1>Items</h1>
            </div>
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="insight">
                
                <div class="mainDisplay1">
                    <div class="middle">
                        <span class="material-icons-sharp">construction</span>
                        <div class="left">
                            <h3><span>12</span></h3>
                            <h3>Days more</h3>
                        </div>
                    </div>
                    <h4>Replace or clean Air Conditioner filter</h4>
                </div>

                <div class="mainDisplay2">
                    <div class="middle">
                        <span class="material-icons-sharp">today</span>
                        <div class="left">
                            <h3><span>254</span></h3>
                            <h3>Days more</h3>
                        </div>
                    </div>
                    <h4>Warranty Date: 04/05/2024 </h4>
                </div>

                <div class="mainDisplay3">
                    <div class="middle">
                        <span class="material-icons-sharp">remove_moderator</span>
                        <div class="left">
                            <h3><span>3</span></h3>
                            <h3>Days left</h3>
                        </div>
                    </div>
                    <h4>Replace or clean Air Conditioner filter</h4>
                </div>

                <div class="addMaitenanceEm">
                    <span class="material-icons-sharp">add</span>
                        <h3>Add Maintenance task</h3>
                </div>
            </div>

            <div class="upMaintenceList">
                <h2>Upcomming Maintenance</h2>
                
                <div class="maintenceBoxes">
                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                    <div class="maintenceBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h3>Maintenance Schedule</h3>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">chat_bubble_outline</span>
                                <h4>Clean air filter</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">calendar_today</span>
                                <h4>21/25/2022</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Air filter</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">error_outline</span>
                                <h4>Pending</h4>
                            </div>
                        </div>
                        <button class="btn_action">Action</button>
                    </div>

                </div>
            </div>

            <div class="recent-orders">
                <h2>Suggections  maintenance for your device</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Sub component</th>
                            <th>Time range</th>
                            <th>Description</th>
                            <th>Priority status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sub component</td>
                            <td>Time range</td>
                            <td class="primary">Description</td>
                            <td class="warning">Priority status</td>
                            <td class="success">Action</td>
                        </tr>

                        <tr>
                            <td>Sub component</td>
                            <td>Time range</td>
                            <td class="primary">Description</td>
                            <td class="warning">Priority status</td>
                            <td class="success">Action</td>
                        </tr>

                        <tr>
                            <td>Sub component</td>
                            <td>Time range</td>
                            <td class="primary">Description</td>
                            <td class="warning">Priority status</td>
                            <td class="success">Action</td>
                        </tr>

                        <tr>
                            <td>Sub component</td>
                            <td>Time range</td>
                            <td class="primary">Description</td>
                            <td class="warning">Priority status</td>
                            <td class="success">Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </main>
        <!-- End of Main -->

        <div class="right">
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
                            <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="item-details">
            <?php 
                if(!empty($result)){
                foreach ($result as $row)
                    // show($row);
                        echo "
                            <div class='image-container'>
                            <img src='http://localhost/UpKeep/upkeep/public/assets/images/uploads/".$row->image."'>
                            </div>

                            <h2>".$row->item_name."</h2>
                            <h4>".$row->brand."</h4>

                            <div class='details'>

                                <div style='display:none;'>
                                    <h4>Item id</h4>
                                    <p class='item_id'>".$row->item_id."</p>
                                </div>

                                <div>
                                    <h4>Item Name</h4>
                                    <p>".$row->item_name."</p>
                                </div>

                                <div>
                                    <h4>Item Type</h4>
                                    <p>".$row->item_type."</p>
                                </div>

                                <div>
                                    <div>
                                        <h4>Brand</h4>
                                        <p>".$row->brand."</p>
                                    </div>
                                    <div>
                                        <h4>Model</h4>
                                        <p>".$row->model."</p>
                                    </div>
                                    <div>
                                        <h4>Purchase Price</h4>
                                        <p>Rs.".$row->purchase_price."</p>
                                    </div>
                                    <div>
                                        <h4>Warranty date</h4>
                                        <p>".$row->warrenty_date."</p>
                                    </div>
                
                                    <div>
                                        <h4>Used date</h4>
                                        <p>175 Days</p>
                                    </div>
                
                                    <div>
                                        <h4>Maintenance cost</h4>
                                        <p>Rs.12500</p>
                                    </div>
                                </div>

                            </div>
                            
                        ";
                }
            ?>

                <div class="itembtnsection1">
                    
                    <button class="morebtn">More</button>
                    <button class="editbtn">Edit</button>
                    <button class="deletebtn">Delete</button>
                    <!-- <form  method='post'>
                        <input  style='display:none;' type='text' name='item_id' value='".$row->item_id."'>
                        <input  style='display:none;' type='text' name='owner_id' value='".$row->owner_id."'>
                        <div class='deletebtn'>
                            <input type='submit' value='Delete'>
                        </div>
                    </form> -->
                </div>

                <div class="itembtnsection2">
                    <button class="findtecbtn">Find technician</button>
                    <button class="communitybtn">Community</button>
                </div>

            </div>
        </div>

        <!-- Delete form alert -->

        <div class="overlayview hidden"></div>

        <div class="popupview hidden deleteMsg">
            
            <h2>Are sure you want to permanently delete this item ?</h2>

            <div class="action_btn">
                <button class="confirmbtn">Confirm</button>
                <button class="closebtn1">Cancel</button>
                <a href="<?= ROOT ?>/itemowner/item" style='display:none;' class="autoclick"></a>
            </div>

        </div>
        
        <script src="<?= ROOT ?>/assets/js/Itemowner/viewitem.js"></script>
</body>
</html>