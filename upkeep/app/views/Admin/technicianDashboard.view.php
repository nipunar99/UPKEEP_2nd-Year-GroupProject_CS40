<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technician</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/techniciandashboard.css">
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
                <a href="#" class="active">
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

        <main>
            <div class="mainhead" style="margin-left:25rem; gap:5rem; margin-top:10px;">
                
                <h1>Technician</h1>

                <div class="heading">
                    <div class="tp" style ="display:flex;gap:1rem;">
                        <button id="menu-btn">
                            <span class="material-icons-sharp">menu</span>
                        </button>
        
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
            

            
            <div class="top" style="margin-top:2rem;">
            <div class="boxContainer" >
                        <form action="" >
                            <input type="text" placeholder="Search..." style="padding: 0.5em 2em;
                            font-size: 16px;
                            border-radius: 10px 10px 10px 10px;
                            border: 1px solid gray;
                            flex-grow: 10;">
                            <a href ="#">
                            <button type="submit" style ="padding: 0.5em 1em;
                                background-color: lightgray;
                                border-radius: 10px 10px 10px 10px;
                                border: 1px solid gray;
                                cursor: pointer;">
                                
                                Search</button></a>
                            
                          </form>
                          
                
                    </div>
                    <div class="accounts">
                        <h2>Accounts 68</h2>

                    </div>
                    <div class="filter" style="padding: 0.5em 2em;
                            background-color: rgb(14, 221, 159);
                            border: 1px solid rgb(244, 248, 247);
                            border-radius: 20px 20px 20px 20px;
                            cursor: pointer;
                        ">
                        <button id="filter-btn" style="background-color:transparent;"><h2>Filter</h2></button>
                    </div>


                    
                
            </div>
            
              
            
            <div class="summary"> 
                <h2>Verification Request</h2>   
                <div class="summaryBoxes">
                    
                    
                    <div class="summaryBox" style="height: 250px;">
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
                                <div style="margin-left:7rem;">
                                <span class="guy"> <h2>Kasuni</h2></span>
                                </div>
                                
                                <div style="margin-left:9rem;">
                                    <span class="material-icons-sharp">Email</span>
                                    <h4>kkk@123</h4>
                                </div>
                                <div class="maintenanceStatus" style="margin-left:9rem;">
                                    <span class="material-icons-sharp">phone</span>
                                    <h4>0702050912</h4>
                                </div>
                            </div>
                            
                    </div>
                    <div class="summaryBox" style="height: 250px;">
                        <div class="container" style="display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 20vh;">
                            <div class="top" style="width: 100px;
                            height: 100px;
                             
                            overflow: hidden;
                            border-radius: 20%;">
                                <img src="<?=ROOT?>/assets/images/profile-2.jpg">
                            </div>
                        </div>
                            <div class="middle" style="margin:-2rem;">
                                <div style="margin-left:7rem;">
                                <span class="guy"> <h2>rusith</h2></span>
                                </div>
                                
                                <div style="margin-left:9rem;">
                                    <span class="material-icons-sharp">Email</span>
                                    <h4>kkk@123</h4>
                                </div>
                                <div class="maintenanceStatus" style="margin-left:9rem;">
                                    <span class="material-icons-sharp">phone</span>
                                    <h4>0702050912</h4>
                                </div>
                            </div>
                            
                    </div>
                    <div class="summaryBox" style="height: 250px;">
                        <div class="container" style="display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 20vh;">
                            <div class="top" style="width: 100px;
                            height: 100px;
                             
                            overflow: hidden;
                            border-radius: 20%;">
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg">
                            </div>
                        </div>
                            <div class="middle" style="margin:-2rem;">
                                <div style="margin-left:7rem;">
                                <span class="guy"> <h2>Kavindu</h2></span>
                                </div>
                                
                                <div style="margin-left:9rem;">
                                    <span class="material-icons-sharp">Email</span>
                                    <h4>kkk@123</h4>
                                </div>
                                <div class="maintenanceStatus" style="margin-left:9rem;">
                                    <span class="material-icons-sharp">phone</span>
                                    <h4>0702050912</h4>
                                </div>
                            </div>
                            
                    </div>
                    

                    
                    
                </div>
            </div>

            <div class="modarotorList" style="margin-top:10rem;">
                
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Item Type</th>
                            <th>Email</th>
                            <th>Contact No</th>
                            <th>Join Date</th>
                            <th>Status</th>
                        </tr> 
                        <tr>
                            <td>aaaa</td>
                            <td>fridge</td>
                            <td>wdweddhd@777</td>
                            <td>00000</td>
                            <td>2020/01/02</td>
                            <td>single</td>
                        </tr>
                        <tr>
                            <td>aaaa</td>
                            <td>fridge</td>
                            <td>wdweddhd@777</td>
                            <td>00000</td>
                            <td>2020/01/02</td>
                            <td>single</td>
                        </tr>
                        <tr>
                            <td>aaaa</td>
                            <td>fridge</td>
                            <td>wdweddhd@777</td>
                            <td>00000</td>
                            <td>2020/01/02</td>
                            <td>single</td>
                        </tr>
                       
                    </thead>
                    
                   
                </table>
            </div>

        </main>
        <!-- End of Main -->
        

</body>
</html>