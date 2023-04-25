
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
    <link rel="stylesheet" href=<?=ROOT."/assets/css/accountsettingPage.css"?>>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
    <div class="container">
        <aside class="close">
            <div class="header nbs">
                <div class="left">
                </div>
                <div class="center">
                    <div class="header-logo">
                        <a><img src="<?=ROOT?>/assets/images/headerlogo2.svg" alt=""></a>
                    </div>
                </div>
                <div class="right"></div>
            </div>

            <div class="middle">
                <div class="sidebar">
                    <a href="<?=ROOT?>/Technician/Dashboard" class="active">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Findjobs" >
                        <span class="material-icons-sharp">work</span>
                        <h3>Find Jobs</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Orders" >
                        <span class="material-icons-sharp">list_alt</span>
                        <h3>Orders</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Gigs">
                        <span class="material-icons-sharp">task</span>
                        <h3>Gigs</h3>
                    </a>


                    <a href="<?=ROOT?>/Community">
                        <span class="material-icons-sharp">forum</span>
                        <h3>Community</h3>
                    </a>


                    <a href="<?=ROOT?>/Coversation">
                        <span class="material-icons-sharp">mail_outline</span>
                        <h3>Conversation</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Statistics">
                        <span class="material-icons-sharp">analytics</span>
                        <h3>Statistics</h3>
                    </a>
                </div>
            </div>

            <div class="bottom">
                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>


        </aside>

        <main>
            <div class="header nbs">
                <div class="left">

                </div>
                <div class="center">
                    <h1>Account Settings</h1>
                </div>
                <div class="right">
                    <div class="notification">
                        <span class="material-icons-sharp">notifications</span>
                    </div>

                    <div class="profile">
                        <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                        <div class="info">
                            <div class="name">
                                <p><?= $_SESSION['USER']->first_name . " " . $_SESSION['USER']->last_name ?></b></p>
                            </div>
                            <small class="text-muted role"><?= ucfirst($_SESSION['user_role']) ?></small>
                        </div>
                        <div class="profile-photo">
                            <div><img src="<?= ROOT ?>/assets/images/user.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tabs">
                <div class="tab-link-container">
                    <a href="#" class="tab-link current" data-tab="profile-settings">Profile Settings</a>
                    <a href="#" class="tab-link" data-tab="account-settings">Account Settings</a>
                </div>
                <div id="profile-settings" class="tab-content current">
                    <div class="form-group">
                        <label for="profile-picture">Profile Picture</label>
                        <div class="current-picture">
                            <img src="https://via.placeholder.com/150" alt="Current Profile Picture">
                        </div>
                        <input type="file" id="profile-picture">
                    </div>
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <div class="input-group">
                            <input type="text" id="first-name" value="John" readonly>
                            <button class="edit-btn" data-input="first-name"><i class="material-icons-sharp">edit</i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <div class="input-group">
                            <input type="text" id="last-name" value="Doe" readonly>
                            <button class="edit-btn" data-input="last-name"><i class="material-icons-sharp">edit</i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <input type="text" id="username" value="johndoe123" readonly>
                            <button class="edit-btn" data-input="username"><i class="material-icons-sharp">edit</i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <div class="input-group">
                            <textarea id="bio" readonly>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
                            <button class="edit-btn" data-input="bio"><i class="material-icons-sharp">edit</i></button>
                        </div>
                    </div>
                </div>
                <div id="account-settings" class="tab-content">
                    <div class="form-group">
                        <label for="email">Change Email</label>
                        <input type="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Change Password</label>
                        <input type="password" id="password">
                    </div>
                </div>
            </div>
        </main>


    <script src="<?=ROOT?>/assets/js/accountsettings.js  "></script>
</body>
</html>