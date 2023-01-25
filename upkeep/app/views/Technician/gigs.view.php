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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css">
</head>
<body>
    <div class="container">
    <aside>
            <div class="top">
                <script>console.log("Loaded")</script>

                <div class="logo">
                    <img src=<?=ROOT."/assets/images/logo.png"?> alt="">
                    <img src=<?=ROOT."/assets/images/title.png"?> alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Technician/Dashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">work</span>
                    <h3>Find Jobs</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">list_alt</span>
                    <h3>Orders</h3>
                </a>

                <a href="<?=ROOT?>/Technician/Gigs" class="active">
                    <span class="material-icons-sharp">task</span>
                    <h3>Gigs</h3>
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
                    <span class="material-icons-sharp">analytics</span>
                    <h3>Statistics</h3>
                </a>

                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>

        </aside>

        <main>
            <h1>GIGS</h1>

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
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="toolbar">
                <a class="show-modal addGig" href="#addgig">Add GIG</a> 
                <a class="viewitem" href="#">View Available Items</a> 
            </div>
            
            <?php if(!empty($data['gigList'])) : ?>
            <div class="insight">
            <?php foreach($data["gigList"] as $gig) : ?>
                <div class="gig-card">
                    <div class="middle">  
                        <div class='gig-cover'>
                            <img src='http://localhost/upkeep/upKeep/public/assets/images/Gigcover.jpg'  alt=''>
                        </div>
                        <h1><?=$gig->title?></h1>
                        <div class="description">
                            <p>
                                <?=$gig->description?>
                            </p>
                            <div class="dots">...</div>
                        </div>
                        
                    </div>
                    <small class="text-muted">More Details</small>
                </div>
                <?php endforeach;?>
            </div>
            <?php endif; ?>
        <!-- </main>  -->

        <!-- End of Main -->

        <!-- <div class="right"> -->
            
            <!-- End of top -->

        <!-- </div> -->
        </main>
    </div>

    <div id="addgig" class="overlay">
        <div class="popup">
            <div class="middle">
                <a class="close" href="#"><span class="material-icons-sharp">cancel</span></a>
                <h1>Create Gig</h1>
            </div>
            <!-- <div class="form"> -->
                <form class="form" action="<?=ROOT?>/Technician/Gigs/" id="addgigform" method="POST">
                    <div class="gigDetails">
                        <div class="inline">
                            <div class="input-box inline">
                                <span class="details">Choose Item</span>
                                <!-- <input type="text" name="item" id="item" required placeholder=""> -->
                                <select id="item" name="item">
                                    <option value="A/C">A/C</option>
                                    <option value="Refrigerator">Refridgerator</option>
                                    <option value="Washing Machine">Washing Machine</option>
                                    <option value="Gas Cooker">Gas Cooker</option>
                                </select>
                            </div>
                            
                            <div class="input-box inline">
                                <span class="details">Location</span>
                                <input type="text" name="location" id="location" required placeholder="Enter Description about item">
                            </div>
                        </div>

                        <div class="input-box">
                            <span class="details">Title</span>
                            <input type="text" name="title" id="title" required placeholder="I Will do... (etc) ">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea type="text" name="description" id="description" required placeholder="Enter Description about work that can be done"></textarea>
                        </div>
        
                        <div class="input-box">
                            <span class="details">Work Tags</span>
                            <input type="text" name="work_tags" id="work_tags" required placeholder="Tags to specify work. Ex - A/C Repair, A/C Gas Filling">
                        </div>

                        <div class="input-box">
                            <span class="details">Add Photo</span>
                            <!-- <input type="file" name="image" id="image" placeholder="add images related to your work"> -->
                            <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="add images related to your work">
                        </div>

                    </div>
                    <div class="button">
                        <input type="submit" value="Submit">
                    </div>
                </form>
            <!-- </div> -->
                
        </div>
    </div>    

    <script src="<?= ROOT ?>/assets/js/addgig.js"></script>

</body>
</html>






<!-- <div class="popupview hidden">
        <button class="closebtn">&times;</button>
        <form action="#">
            <div class="gigDetails">

                <div class="input-box">
                    <span class="details">Title</span>
                    <input type="text" name="" id="" required placeholder="Enter Item Name">
                </div>

                <div class="input-box">
                    <span class="details">District</span>
                    <select name="Select Item Type" id="district" ></select>
                </div>
                
                <div class="middleInput">
                    <div class="input-box">
                        <span class="details">Brand</span>
                        <input type="text" name="" id="" required placeholder="Enter Brand">
                    </div>
    
                    <div class="input-box">
                        <span class="details">Model</span>
                        <input type="text" name="" id="" required placeholder="Enter Model">
                    </div>
    
                    <div class="input-box">
                        <span class="details">Purchase Price(Rs.)</span>
                        <input type="number" name="" id="" required placeholder="Purchase Price">
                    </div>
                    
                    <div class="input-box">
                        <span class="details">Description</span>
                        <input type="text" name="" id="" required placeholder="Enter Description about item">
                    </div>

                    <div class="input-box">
                        <span class="details">Purchase Date</span>
                        <input type="date" name="" id="" required placeholder="Enter Purchase Date">
                    </div>

                    <div class="input-box">
                        <span class="details">Warrenty Date</span>
                        <input type="date" name="" id="" required placeholder="Enter Warrenty Date">
                    </div>
                </div>
                

                <div class="button">
                    <input type="submit" value="Add Item">
                </div>

            </div>
        </form>
    </div>
    
    <div class="overlayview hidden"></div> -->