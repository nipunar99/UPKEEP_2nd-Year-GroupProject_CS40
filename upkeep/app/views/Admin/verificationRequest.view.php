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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/verificationRequest.css">
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
                <a href="<?=ROOT?>/Admin/AdminDashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#"class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="<?=ROOT?>/Admin/Technician">
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?=ROOT?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                
                <a href="<?=ROOT?> /Home/home">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main style="margin-right:5rem;">
            <h1 style="margin-left:8rem;">Verification Request</h1>
            <div>
                <h2 style="margin:3rem 0 1rem 0;font-size:large;">NIC Details</h2>
            </div>

            <div class="grid-container"style="height:10vh;grid-template-columns: 1fr 1fr 1fr;width:90%;gap:5rem;">
                
                
                    <div class="item" style="background-color:lightyellow;height:35vh;width:125%;border-radius:20px 20px 20px 20px;box-shadow: 0 1rem 2rem rgb(132 139 200 / 47%);">
                        <div class="photo-container" style="display: flex;
                                    justify-content: center;
                                    align-items: center;">
                                <img style="width: 150px;height: 150px;border-radius: 20%;text-align: center;margin:1rem;" 
                                    src="<?=ROOT?>/assets/images/frontId.png" alt="Profile photo">

                                
                        </div>
                        <div>
                            <h3 style="text-align:center;margin-top :2rem;">Front Photo Of NIC</h3>
                        </div>
                       
                            
                            
                    </div>

                    <div class="item" style="background-color:lightyellow;height:35vh;width:125%;border-radius:20px 20px 20px 20px;box-shadow: 0 1rem 2rem rgb(132 139 200 / 47%);">
                        <div class="photo-container" style="display: flex;
                                    justify-content: center;
                                    align-items: center;">
                                <img style="width: 150px;height: 150px;border-radius: 20%;text-align: center;margin:1rem;" 
                                    src="<?=ROOT?>/assets/images/rearId.png" alt="Profile photo">
                        </div>
                        <div>
                            <h3 style="text-align:center;margin-top :2rem;">Back Photo Of NIC</h3>
                        </div>
                            
                            
                    </div>

                    <div class="item" style="background-color:lightyellow;height:35vh;width:125%;border-radius:20px 20px 20px 20px;box-shadow: 0 1rem 2rem rgb(132 139 200 / 47%);">
                        <div class="photo-container" style="display: flex;
                                    justify-content: center;
                                    align-items: center;">
                                <img style="width: 150px;height: 150px;border-radius: 20%;text-align: center;margin:1rem;" 
                                    src="<?=ROOT?>/assets/images/bothId.jpg" alt="Profile photo">
                        </div>

                        <div>
                            <h3 style="text-align:center;margin-top :2rem;">Photo With ID</h3>
                        </div>
                        
                            
                            
                    </div>

            </div>
            <h2 style="font-size:medium;margin-top:14rem;">Personal Details...</h2>
            <div class="grid-container"style="height:10vh;grid-template-columns: 1fr;width:100%;">
                
                
                    <div class="item" style="background-color:#d1cfcfb4;height:25vh;width:100%;border-radius:30px 30px 30px 30px;margin-top:1rem;">
                        <p style="margin-top:2rem;font-size:medium;text-align:center;">My name is rusith siriwardhana,I have followed the technician course at Maharagama Youth Center...
                            And also I have 5year experience.</p>
                        
                       
                            
                            
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

            <div class="grid-container"style="height:10vh;grid-template-columns: 1fr;width:100%;">
                
                
                    <div class="item" style="margin-top:1rem;background-color: rgb(248, 244, 244);box-shadow: 0 1rem 2rem rgb(132 139 200 / 47%);height:75vh;width:70%;border-radius:30px 30px 30px 30px;">
                        <div class="photo-container" style="display: flex;
                                    justify-content: center;
                                    align-items: center;">
                                <img style="width: 150px;height: 150px;border-radius: 50%;text-align: center;margin:1rem;" 
                                    src="<?=ROOT?>/assets/images/profile-2.jpg" alt="Profile photo">

                                
                        </div>

                        <div>
                            <h3 style="text-align:center;font-size:20px;">Rusith Siriwardhana</h3>
                            <h3 style="text-align:center;font-size:12px;">Auto Mobile|Maharagama</h3>
                        </div>
                        <div>
                            <h3 style="margin:4rem 0 0 2rem;text-align:left;font-size:15px;color:lightgreen;">rusith@gmail.com</h3>
                            <h3 style="margin:2rem 0 0 2rem;text-align:left;font-size:15px;color:red;">0702050812</h3>
                        </div>

                        <div class="button-container" style="display: flex;justify-content: space-between;margin:6rem 3rem 0 3rem;">
                            <button class="first-button" style="margin-right: 10px;
                                padding: 10px 20px;
                                font-size: 15px;
                                font-weight: bold;
                                background-color: #4CAF50;
                                color: white;
                                border: none;
                                border-radius: 15px;
                                cursor: pointer;">Verify</button>
                            <button class="second-button" style="padding: 10px 20px;
                                font-size: 15px;
                                font-weight: bold;
                                background-color: #f44336;
                                color: white;
                                border: none;
                                border-radius: 15px;
                                cursor: pointer;">Reject</button>
                        
                        </div>

                        
                       
                            
                            
                    </div>

            </div>
        </div>
    </div>


    

</body>
</html>


