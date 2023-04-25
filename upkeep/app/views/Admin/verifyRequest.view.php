<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Admin/verifyrequest.css">
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
                <a href="<?= ROOT ?> /Admin/Admindashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="<?= ROOT ?>/Admin/Technician">
                    <span class="material-icons-sharp">person</span>
                    <h3>Technicians</h3>
                </a>


                <a href="<?= ROOT ?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="#">
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
            <div class="mainhead" style="margin-left:3rem;margin-right:3rem;gap:0rem;margin-top :10px;">

                <h1>Verification Request</h1>

                <div class="heading">
                    <div class="top" style="display:flex;gap:1rem;">
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




            <div class="top" style="margin-top:3rem;">
                <div class="boxContainer">
                    <form action="">
                        <input type="text" placeholder="Search..." style="border-radius: 10px 10px 10px 10px;">


                        <button type="submit">

                            Search</button>
                    </form>

                </div>
                <div class="accounts">
                    <h2>Accounts 68</h2>

                </div>
                <div class="filter" style="color:green;">
                    <button id="filter-btn" style="background-color:transparent;">
                        <h2>Filter</h2>
                    </button>
                </div>




            </div>

            <div style="color:#05B2E9;margin:2rem;">
                <h2>Verification Request</h2>
            </div>
            <div class="summary" style="display:flex;">

                <div class="summaryBoxes" style="height:50vh;display:flex;margin:3rem 1rem;">

                    <div class="summaryBox">
                        <a href="<?= ROOT ?>/Admin/VerificationRequest">
                            <div class="summaryBox" style="height: 300px;">
                                <div class="container" style="display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 25vh;">
                                    <div class="top" style="width: 100px;
                            height: 100px;
                             
                            overflow: hidden;
                            border-radius: 20%;">
                                        <img src="<?= ROOT ?>/assets/images/profile-3.jpg">
                                    </div>
                                </div>
                                <div class="middle" style="margin:-2rem;">
                                    <div style="margin-left:7rem;">
                                        <span class="guy">
                                            <h2>Kasuni</h2>
                                        </span>
                                    </div>
                                    <div style="margin-left:9rem;">
                                        <span class="guy">
                                            <h4>Auto Mobile|Maharagama</h4>
                                        </span>
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
                        </a>
                    </div>

                    <div class="summaryBox">
                        <a href="<?= ROOT ?>/Admin/VerificationRequest">
                            <div class="summaryBox" style="height: 300px;">
                                <div class="container" style="display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 25vh;">
                                    <div class="top" style="width: 100px;
                            height: 100px;
                             
                            overflow: hidden;
                            border-radius: 20%;">
                                        <img src="<?= ROOT ?>/assets/images/profile-3.jpg">
                                    </div>
                                </div>
                                <div class="middle" style="margin:-2rem;">
                                    <div style="margin-left:7rem;">
                                        <span class="guy">
                                            <h2>Kasuni</h2>
                                        </span>
                                    </div>
                                    <div style="margin-left:9rem;">
                                        <span class="guy">
                                            <h4>Auto Mobile|Maharagama</h4>
                                        </span>
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
                        </a>
                    </div>

                    <div class="summaryBox">
                        <a href="<?= ROOT ?>/Admin/VerificationRequest">
                            <div class="summaryBox" style="height: 300px;">
                                <div class="container" style="display: flex;
                            justify-content: center;
                            align-items: center;
                            height: 25vh;">
                                    <div class="top" style="width: 100px;
                            height: 100px;
                             
                            overflow: hidden;
                            border-radius: 20%;">
                                        <img src="<?= ROOT ?>/assets/images/profile-3.jpg">
                                    </div>
                                </div>
                                <div class="middle" style="margin:-2rem;">
                                    <div style="margin-left:7rem;">
                                        <span class="guy">
                                            <h2>Kasuni</h2>
                                        </span>
                                    </div>
                                    <div style="margin-left:9rem;">
                                        <span class="guy">
                                            <h4>Auto Mobile|Maharagama</h4>
                                        </span>
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
                        </a>
                    </div>

                </div>










            </div>
    </div>



    </main>
    <!-- End of Main -->


</body>

</html>