<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Verified!</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gig.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/verifypage.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="top">
            <div class="header-logo">
                <a href="<?=ROOT?>/technician/dashboard">
                    <img src="<?=ROOT?>/assets/images/headerlogo.png" alt="">
                    <!-- <img src="<?=ROOT?>/assets/images/title.png" alt=""> -->
                </a> 
            </div>
            <h1>GIGS</h1>
            <div class="right">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>

                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey,<b><?=$_SESSION['user_name']?></b></p>
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <main>
            <!-- top was here -->
            <div class="left">
                <div class="congrats">
                    <img src="<?=ROOT?>/assets/images/congrats.png" alt="">
                    <h1>Congratulations!</h1>
                    <h2>You are almost there!</h2>
                    <p>We need to Recognize you as a Technician and your personality to provide you with the best experience.</p>
                </div>
            </div>
            <div class="right">
                <h1>Few more steps to go!</h1>
                <p>Verify your identity and personality to get started.</p>
                <div class="verification-methods">
                    <div class="method-card">
                        <div class="icon">
                            <span class="material-icons-sharp">phone_iphone</span>
                        </div>
                        <h1>Contact Verification</h1>
                    </div>
                    <div class="method-card">
                        <div class="icon">
                            <span class="material-icons-sharp">how_to_reg</span>
                        </div>
                        <h1>identity Verification</h1>
                    </div>
                    <div class="method-card">
                        <div class="icon">
                            <span class="material-icons-sharp">person</span>
                        </div>
                        <h1>Setup profile</h1>
                    </div>
                </div>
                <div class="button">
                    <a class="btn viewcommunity" href="<?=ROOT?>/technician/dashboard">View Community</a>
                    <a class="btn logout" href="<?=ROOT?>/Signout">Logout</a>
                </div>

            </div>
                
        </main>
        

    </div>

    <div id="edit" class="overlay">
        <div class="popup">
            <div class="middle">
                <a class="close" href="#"><span class="material-icons-sharp">cancel</span></a>
                <h1>Edit Gig</h1>
            </div>
            <!-- <div class="form"> -->
                <form class="form" action="<?=ROOT?>/Technician/Gigs/" id="addgigform" method="POST">
                    <div class="gigDetails">

                        <div class="input-box">
                            <span class="details">Title</span>
                            <input type="text" name="title" id="title" required placeholder="I Will do... (etc) " value="<?=$gigDetails[0]->title?>">
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea type="text" name="description" id="description" required placeholder="Enter Description about work that can be done"><?=$gigDetails[0]->description?></textarea>
                        </div>
        
                        <div class="input-box">
                            <span class="details">Work Tags</span>
                            <input type="text" name="work_tags" id="work_tags" required placeholder="Tags to specify work. Ex - A/C Repair, A/C Gas Filling" value="<?=$gigDetails[0]->work_tags?>">
                        </div>

                        <div class="input-box">
                            <span class="details">Add Photo</span>
                            <!-- <input type="file" name="image" id="image" placeholder="add images related to your work"> -->
                            <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="add images related to your work">
                        </div>

                    </div>
                    <div class="button">
                        <input type="submit" value="Update">
                    </div>
                </form>
            <!-- </div> -->
                
        </div>
    </div>


    <script src="<?= ROOT ?>/assets/js/addgig.js"></script>

</body>
</html>





