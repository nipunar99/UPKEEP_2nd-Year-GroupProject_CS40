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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
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

                <a href="<?= ROOT ?>/Community">
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

                <a href="<?= ROOT ?>/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        <main class="main1">
            <div class="boardtitle">
                <h1>Item</h1>
            </div>
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="insight">
                    
                <div class="mainDisplay1">
                    
                </div>

                <div class="mainDisplay2">
                    
                </div>

                <div class="mainDisplay3">
                    
                </div>

                <div class="addMaitenanceEm" role="button">
                    <span class="material-icons-sharp">add</span>
                        <h3>Add Maintenance task</h3>
                </div>
            </div>

            <div class="upMaintenceList">
                <h2>Upcomming Maintenance</h2>
                
                <div class="maintenceBoxes">

                </div>
            </div>

            <div class="upMaintenceList">
                <h2 id="overdueh2">Overdue Maintenance</h2>

                <div class="overduemaintenceBoxes"></div>
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
                    <a href="<?= ROOT ?>/Itemowner/Documentation"><button class="docbtn" >Docs</button></a>
                    <button class="deletebtn">Delete</button>
                </div>

                <div class="itembtnsection2">
                    <button class="findtecbtn">Find technician</button>
                    <button class="communitybtn">Community</button>
                </div>

                <div class="itembtnsection3">
                    <button class="disposebtn">Dispose Guide</button>
                    <button class="communitybtn">Community</button>
                </div>

            </div>
        </div>

        <!-- End right -->

        <div class="overlayview hidden"></div>

        <div class="popupview hidden deleteMsg">
            
            <h2>Are sure you want to permanently delete this item ?</h2>

            <div class="action_btn">
                <button class="confirmbtn">Confirm</button>
                <button class="closebtn1">Cancel</button>
                <a href="<?= ROOT ?>/itemowner/item" style='display:none;' class="autoclick"></a>
            </div>

        </div>

        <div class="popupview addMaintenanceForm hidden" id="addMaitenanceFromPopup">
            <button class="closebtn">&times;</button>

            <div class="content content1">

                <form method="post" enctype="multipart/form-data" id="form_reminderDetails">
                <h2>Maintenance Details</h2>
                    <div class="itemDetails">
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <input type="text" name="description" id="" required placeholder="Enter description">
                        </div>
                        
                        <div class="middleInput">
                            <div class="input-box">
                            <span class="details">Sub Component</span>
                                <input type="text" name="sub_component" id=""  placeholder="Enter Sub component">
                            </div>
                            <div class="input-box">
                                <span class="details">Sub Component Image</span>
                                <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="Enter Image">
                            </div>
                            <div class="input-box">
                                <span class="details">Start Date</span>
                                <input type="date" name="start_date" id="startDate" required placeholder="Enter Brand">
                            </div>

                        </div>

                        <div onclick="addreminder()" class="button">
                            <input type="button" value="Add a Maintenance" id="addReminderbtn"> 
                        </div>
        
                    </div>
                </form>

            </div>
        </div>

        
        <div class="popupview addMaintenanceForm2 hidden" >
            <button class="closebtn closebtn2">&times;</button>
            
            <div class="content content1">
                
                <form id="form_maintenanceDetails">
                    <h2>Maintenance Details</h2>
                    <div class="itemDetails">
                        
                        <div class="input-box">
                            <span class="details">Sub Component</span>
                            <input type="text" name="sub_component" id="" required placeholder="Enter Sub component">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <input type="text" name="description" id="" required placeholder="Enter description">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Sub Component Image</span>
                            <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="Enter Image">
                        </div>

                        <h2>Time frame</h2>
                        
                        <div class="middleInput">
                            
                            <div class="input-box">
                                <span class="details">Yearly</span>
                                <input type="number" min="0" max="10" name="years" id=""  placeholder="Years">                                
                            </div>


                            <div class="input-box">
                                <span class="details">Monthly</span>
                                <input type="number" min="0" max="12" name="months" id=""  placeholder="Months">                                
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Weekly</span>
                                <input type="number" min="0" max="4" name="weeks" id=""  placeholder="Weeks">                                
                            </div>
            
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Due date</span>
                            <input type="date" name="start_date" id="start_date" required placeholder="Enter Brand">
                        </div>
                        
                        <div class="button">
                            <input type="submit" value="Add a Maintenance" id="addMaintenancebtn"> 
                            
                        </div>
                        
                    </div>
                </form>
                
            </div>
        </div> 
        
        <main class="main2 hidden">
            <div class="date">
                <p>14/11/2022</p>
            </div>
            
            <button class="back">Back</button>
            
            <div class="tableView maintenanceUp">
                <h2>Upcomming Maintenance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Sub Component</th>
                            <th>Due date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td class="danger">07/02/2023</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
            <div class="tableView maintenanceMissed">
                <h2 class="danger">Overdue Maintenance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Sub Component</th>
                            <th>Due date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td class="danger">07/02/2023</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
            <div class="tableView maintenanceList">
                <h2>Maintenance Tasks List </h2>
        
                <button class="addMaintainTask">Add Maintain Task</button>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Sub Component</th>
                            <th>Start Date</th>
                            <th>Time frame</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="maintenanceListTbody"></tbody>
                </table>
            </div>
        
        </main>

        <main class="main3 hidden">
            <div class="date">
                <p>14/11/2022</p>
            </div>
            
            <button class="back2">Back</button>
            
            <div class="disposalMain">
                <h1>Disposal Guide</h1>
                <div class="buttonmenu">
                    <button class="predisposalbtn">Pre Disposal</button>
                    <button class="reusebtn">Reuse</button>
                    <button class="resellbtn">Resell</button>
                    <button class="scrapbtn">Scrap</button>
                </div>
                <div class="disposalMenu">
                    <div class="predisposal">
                        <h1>Pre Disposal</h1>
                        <div class="inputarea">
                            <input type="text"  class="prompt" name="" id="">
                            <button class="send"><span class="material-icons-sharp">send</span></button>
                        </div>
                        <textarea class="textArea"></textarea>
                    </div>
                    <div class="reuse hidden">
                        <h1>reuse</h1>
                    </div>
                    <div class="resell hidden">
                        <h1>resell</h1>
                    </div>
                    <div class="scrap hidden">

                        <h1>Scrap</h1>
                        <div class="mapContainer">
                            <div class="mapdiv">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.392816511548!2d80.0781035146864!3d6.343145095409712!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae22ac34166e76f%3A0x6e0e0605a3a77ead!2zVXJhZ2FzbWFuaGFuZGl5YSBKdW5jdGlvbiAtIOC2jOC2u-C2nOC3g-C3iuC2uOC2guC3hOC2seC3iuC2r-C3kuC2ug!5e0!3m2!1sen!2slk!4v1677867424230!5m2!1sen!2slk" width="700" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="diposalplaces">
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        
        </main>

    </div>
    <script src="<?= ROOT ?>/assets/js/Itemowner/viewitem.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/sse.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/script.js"></script>
</body>
</html>