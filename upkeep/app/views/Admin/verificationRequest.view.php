<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verificationRequest</title>
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
                    <img src="<?=ROOT?>/assets/images/logo.png" alt="">
                    <img src="<?=ROOT?>/assets/images/title.png" alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="<?=ROOT?>/Admin/Technician" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technicians</h3>
                </a>


                <a href="<?=ROOT?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        <main style="">
            <div class="mainhead">
                
                <h1 style="margin-left:15rem;font-size:25px;">verification Request</h1>

                
                
            </div>
            

            
            <div class="top">
                    <div class="boxContainer">
                        
                
                    </div>
                    
                    


                    
                
            </div>
            
              
                <h2 style="margin-top:3rem;">NIC Details</h2>
                <div class="summary" style="gap:1rem;"> 
                    
                    <div class="summaryBox" style="height: 150px;weight:12rem;">
                            <div class="container" style="display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 20vh;">
                                <div class="top" style="width: 100px;
                                height: 100px;
                                
                                overflow: hidden;
                                border-radius: 20%;">
                                    <img src="<?=ROOT?>/assets/images/profile-3.jpg">
                                </div>
                            </div>
                                <div class="middle" style="margin:-2rem;">
                                    <div style="margin-left:1rem;">
                                    <span class="guy"> <h2 style="color:black;font-size:15px;">Front Photo Of NIC</h2></span>
                                    </div>
                                    
                                    
                                </div>

                                
                    </div>
                    <div class="summaryBox" style="height: 150px;">
                            <div class="container" style="display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 20vh;">
                                <div class="top" style="width: 100px;
                                height: 100px;
                                
                                overflow: hidden;
                                border-radius: 20%;">
                                    <img src="<?=ROOT?>/assets/images/profile-3.jpg">
                                </div>
                            </div>
                                <div class="middle" style="margin:-2rem;">
                                    <div style="margin-left:1rem;">
                                    <span class="guy"> <h2 style="color:black;font-size:15px;">Back Photo of NIC</h2></span>
                                    </div>
                                    
                                    
                            </div>

                                
                    </div>
                    <div class="summaryBox" style="height: 150px;width:30rem;">
                            <div class="container" style="display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 20vh;">
                                <div class="top" style="width: 100px;
                                height: 100px;
                                
                                overflow: hidden;
                                border-radius: 20%;">
                                    <img src="<?=ROOT?>/assets/images/profile-3.jpg">
                                </div>
                            </div>
                                <div class="middle" style="margin:-2rem;">
                                    <div style="margin-left:1rem;">
                                    <span class="guy"> <h2 style="color:black;font-size:15px;">Photo With ID</h2></span>
                                    </div>
                                    
                                    
                            </div>

                                
                    </div>

                    <div class="summaryBox" style="height: 500px;width:50rem;margin-left:10rem;">
                            <div class="container" style="display: flex;
                                justify-content: center;
                                align-items: center;
                                height: 70vh;">
                                <div class="top" style="width: 100px;
                                height: 100px;
                                
                                overflow: hidden;
                                border-radius: 20%;">
                                    <img src="<?=ROOT?>/assets/images/profile-1.jpg">
                                </div>
                            </div>
                                <div class="middle" style="margin:-2rem;">
                                <a href="3">
                                    <div style="margin-left:3.5rem;">
                                    <span class="guy"> <h2 style="color:black;font-size:15px;background-color:red;border-radius: 30%;">Reject</h2></span>
                                    </div></a>
                                    
                                    
                            </div>

                                
                    </div>

                       
                    

                
                    <!-- </div>
                                <a href="<?=ROOT?>/Admin/Addmoderator" class="btn_action addMode" style="color:red;">Reject</a>
                            </div> -->
                
                        <!-- <div class="nic-side front">
                            <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Front of NIC">
                            <h3>Front Photo of NIC</h3>
                        </div> -->
                        <!-- <div class="nic-side back">
                            <img src="<?=ROOT?>/assets/images/profile-2.jpg" alt="Back of NIC">
                            <h3></h3>
                        </div> -->
                        <!-- <div class="nic-side back">
                            <img src="<?=ROOT?>/assets/images/profile-4.jpg" alt="Back of NIC">
                            <h3>Photo With ID</h3>
                        </div> -->
                    
                    
                </div>   
                
                <h2>Personal Details</h2>
                <div class="summaryBoxes">

                    
            
                    <div class="summaryBox" style="width:48rem;">
                        <input type="text" style="width:48rem;">
                    </div>
                        
                
                
                    
                </div>
                    

                    
                    
                </div>
    </div>

            

        </main>
</div>
        <!-- End of Main -->

        <rightside>
            


        
    
        
        </rightside>
        
            
        

        

</body>
</html>