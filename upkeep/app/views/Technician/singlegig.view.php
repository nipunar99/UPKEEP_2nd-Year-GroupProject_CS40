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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gig.css">
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
            

            <div class="top">
                <!-- <h1>GIGS</h1> -->
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

            <div class="gig-container">
                <div>
                    <div class="gigDetails">
                        <div class="image-caraousel">
                            <div class="slide fade">
                                <img src="<?=ROOT?>/assets/images/Gigcover.jpg" alt="">
                            </div>
                            <div class="next">
                                <span class="material-icons-sharp">chevron_right</span>
                            </div>
                            <div class="prev">
                                <span class="material-icons-sharp">chevron_left</span>
                            </div>    
                        </div>
                        <h1>We will do all kinds of Air Conditioner Service</h1>
                        <p>Cool Air Services is your trusted maintenance company which provides repairing service to a wide range of domestic, commercial and industrial major home appliances. Such as air conditioners, home appliances, electronics and electrical appliances of world famous brands.
                            We specialize in air conditioning repair and maintenance of residential/commercial/industrial and automobile air conditioners throughout Colombo. Call us 24/7 at 0777742329 for fast, reliable, same day service! At any given situation we are only a phone call away. 
                            Our highly trained technicians and well equipped workshop will take care of your product and ensure that it is put back into smooth working order with the least possible delay.
                            Cool Air Services offers several exclusive guarantees that are unmatched in the industry. It's important to us that you feel completely comfortable choosing us as your AC repair and major home appliances company.</p>
                    </div>    
                </div>
            </div>
            
        
        </main>
    </div>


    <script src="<?= ROOT ?>/assets/js/addgig.js"></script>

</body>
</html>





