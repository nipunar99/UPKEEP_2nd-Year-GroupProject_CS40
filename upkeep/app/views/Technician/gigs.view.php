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
                <a href="<?=ROOT?>/Technician/Dashboard" >
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
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
                    <span class="material-icons-sharp">error</span>
                    <h3>Reports</h3>
                </a>

                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <h1>GIGS</h1>
            <div class="">
            <button class="show-modal addGig"><h3>Add a Gig</h3></button> 
            </div>
            
            

            <div class="insight">
                <div class="sales">
                    <div class="middle">
                        <div class="gig-cover">
                            <img src="images/Gigcover.jpg" alt="">
                        </div>
                        <div >
                            <p>Welcome to The World of Creative Logo Design.
                                Are You Looking For Creative And Minimalist Logo Design?
                                You Are At The Perfect Place For All Types Of Creative Logo Design.
                                We Understand The Value Of Your Logo And Surely Create A Unique Design .</p>
                        </div>
                    </div>
                    <small class="text-muted">More Details</small>
                </div>

                </div>
        </main> 

        <!-- End of Main -->

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
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src="images/profile-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <!-- End of top -->

            </div>
        </div>
    </div>

    <div class="popupview hidden">
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
    
    <div class="overlayview hidden"></div>

    <script src="<?=ROOT?>/assets/js/gigPopup.js"></script>;
</body>
</html>


