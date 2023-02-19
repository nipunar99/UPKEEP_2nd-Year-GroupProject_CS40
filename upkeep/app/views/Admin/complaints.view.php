<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complaints</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/complaints.css">
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
                <a href="<?=ROOT?> /Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?=ROOT?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="<?=ROOT?>/Admin/User">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>


                <a href="#" class="active">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?=ROOT?>/Admin/ItemTemplate" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?> /Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>

                
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        <main>
            <div class="mainhead" style="gap:0rem;margin-left:3rem;">
                
                <h1>Complaints</h1>

                <div class="heading" style="margin-right:-5rem;">
                    <div class="tp" style ="display:flex;gap:1rem;">
                        
        
                        <div class="theme-toggler">
                            <span class="material-icons-sharp active">light_mode</span>
                            <span class="material-icons-sharp">dark_mode</span>
                        </div>

                        <div class="profile">
                            <div class="info">
                                <p>Saman</p>
                                <!-- <small class="text-muted">User</small> -->
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                </div>
            

            
            
            
            <div class="summary">    
                
                <h2 style="margin-top:4rem;margin-bottom:2rem;">Gigs Complaints</h2>
                <table style="border-radius:20px 20px 20px 20px;background-color:lightgrey">
                    <thead>
                        <tr>
                            <th>Technician</th>
                            <th>Item Type</th>
                            <th>Description</th>
                            <th>Date</th>
                            <td class="highlight">Number of Complaints</td>
                                <style>
                                .highlight {
                                    color: red;
                                }
                                </style>
                            
                        </tr> 
                        <tr>
                            <td>Kasun</td>
                            <td>A/C</td>
                            <td>Harmful activities</td>
                            <td>2020/01/02</td>
                            <td>25</td>
                            
                        </tr>
                        <tr>
                            <td>Kasun</td>
                            <td>A/C</td>
                            <td>Harmful activities</td>
                            <td>2020/01/02</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>Kasun</td>
                            <td>A/C</td>
                            <td>Harmful activities</td>
                            <td>2020/01/02</td>
                            <td>25</td>
                        </tr>
                       
                    </thead>
                    
                   
                </table>
            </div>

            <div class="modarotorList" style="margin-top:1rem;">
                <div style="margin-bottom:2rem;">
                    <h2>Community Complaints</h2>
                    <!-- <a href="<?=ROOT?>/Admin/Addmoderator" class="btn_action addMode">Add Moderator</a> -->
                    <!-- <button class="btn_action addMode">Add Moderator</button> -->
                </div>
                <table style="border-radius:20px 20px 20px 20px;background-color:lightgrey;">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Post ID</th>
                            <th>Description</th>
                            <th>Date</th>
                            <td class="highlight">Number of Complaints</td>
                                <style>
                                .highlight {
                                    color: red;
                                }
                                </style>

                           
                        </tr> 
                        <tr>
                            <td>rusith</td>
                            <td>001</td>
                            <td>not working properly</td>
                            <td>2020/01/02</td>
                            <td>10</td>



                            
                        </tr>
                        <tr>
                            <td>rusith</td>
                            <td>002</td>
                            <td>not working properly</td>
                            <td>2020/01/02</td>
                            <td>20</td>
                            
                        </tr>
                        <tr>
                            <td>rusith</td>
                            <td>003</td>
                            <td>not working properly</td>
                            <td>2020/01/02</td>
                            <td>20</td>
                        </tr>
                       
                    </thead>
                    
                   
                </table>
            </div>

        </main>
        <!-- End of Main -->
        

</body>
</html>