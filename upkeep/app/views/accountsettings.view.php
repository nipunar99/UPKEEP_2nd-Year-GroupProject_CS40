
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
                    <h1>Settings</h1>
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

            <div>
                <div class="tabs">
                    <div class="tab-item active">
                        <i class="tab-icon fas fa-briefcase"></i>
                        Profile Settings
                    </div>
                    <div class="tab-item">
                        <i class="tab-icon fas fa-clock"></i>
                        Account Settings
                    </div>

                    <div class="line"></div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="card">
                            <div class="card-header">
                                <h3>Basic Details</h3>
                                <div class="btn-container">
                                    <a class="btn" id="save_changes" aria-disabled="true">Save Changes</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="profile-pic-form" enctype="multipart/form-data">
                                    <div class="input-field">
                                        <div class="input-group">
                                            <div class="current-picture">
                                                <img src="" alt="Current Profile Picture" id="profile_picture">
                                                <div class="overlay-div hidden" id="overlay_div">
                                                    <svg class="loader" xmlns="http://www.w3.org/2000/svg" version="1.2" baseProfile="tiny" x="0" y="0" viewBox="0 0 200 200" xml:space="preserve"><path class="loaderreverse" d="M200 100c0-30.3-13.5-57.5-34.8-75.8 -4.8-4.1-12.2-3-15.8 2.3v0c-3 4.5-2.4 10.7 1.8 14.2 16.6 14.4 27.1 35.6 27.1 59.3s-10.5 44.9-27.1 59.3c-4.1 3.6-4.8 9.7-1.8 14.2v0c3.6 5.3 11 6.4 15.8 2.3C186.5 157.5 200 130.3 200 100z"/><path d="M156.7 100c0-14.9-5.8-28.5-15.2-38.6 -4.6-4.9-12.6-4.1-16.3 1.4l-0.4 0.6c-2.8 4.1-2.2 9.5 1.2 13.2 5.7 6.2 9.1 14.4 9.1 23.5 0 9-3.4 17.3-9.1 23.5 -3.3 3.7-3.9 9-1.2 13.2l0.4 0.6c3.7 5.6 11.7 6.3 16.3 1.4C150.9 128.5 156.7 114.9 156.7 100z"/></svg>
                                                </div>
                                            </div>
                                            <div class="btn-container" id="profile-pic-btns">
                                                <div>
                                                    <label for="profile_picture_input" id="update-profilepic-label">Update
                                                        <input type="file" id="profile_picture_input" name="profile_picture">
                                                    </label>
                                                    <small>error</small>
                                                </div>
                                                <div>
                                                    <a class="btn remove-profilepic" id="remove_profile_picture">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="profile-settings-form" enctype="multipart/form-data">
                                    <div class="input-group">
                                    <div class="input-field">
                                        <label for="first-name">First Name</label>
                                        <div class="inline">
                                            <input type="text" id="first_name" value="" readonly>
                                            <button class="edit-btn" data-input="first_name"><i class="material-icons-sharp">edit</i></button>
                                        </div>
                                        <small>error</small>
                                    </div>
                                    <div class="input-field">
                                        <label for="last-name">Last Name</label>
                                        <div class="inline">
                                            <input type="text" id="last_name" value="" readonly>
                                            <button class="edit-btn" data-input="last_name"><i class="material-icons-sharp">edit</i></button>
                                        </div>
                                        <small>error</small>
                                    </div>
                                    </div>
                                    <div class="input-field">
                                        <label for="username">Username</label>
                                        <div class="inline">
                                            <input type="text" id="user_name" value="" readonly>
                                            <button class="edit-btn" data-input="user_name"><i class="material-icons-sharp">edit</i></button>
                                        </div>
                                        <small>error</small>
                                    </div>
                                    <div class="input-group">
                                    <div class="input-field">
                                        <label for="username">Email</label>
                                        <div class="inline">
                                            <input type="text" id="email" value="" readonly>
                                            <button class="edit-btn" data-input="email"><i class="material-icons-sharp">edit</i></button>
                                        </div>
                                        <small>error</small>
                                    </div>
                                    <div class="input-field">
                                        <label for="username">Mobile Number</label>
                                        <div class="inline">
                                            <input type="number" id="mobile_no" value="" readonly>
                                            <button class="edit-btn" data-input="mobile_no"><i class="material-icons-sharp">edit</i></button>
                                        </div>
                                        <small>error</small>
                                    </div>
                                    </div>
                                    <?php if((json_decode($user))->user_role=='technician'):?>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <div class="input-group">
                                            <textarea id="description" name="description" readonly></textarea>
                                            <button class="edit-btn" data-input="description"><i class="material-icons-sharp">edit</i></button>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
                        <div class="card">
                            <div class="card-header">
                                <h3>Change Password</h3>
                            </div>
                            <div class="card-body">
                                <form id="password-settings-form" enctype="multipart/form-data">
                                    <div class="input-field">
                                        <label for="username">Current Password</label>
                                        <div class="inline">
                                            <input type="text" id="current_password" value="">
                                        </div>
                                        <small>error</small>
                                    </div>
                                    <div class="input-field">
                                        <label for="username">New Password</label>
                                        <div class="inline">
                                            <input type="password" id="new_password" value="">
                                        </div>
                                        <small>error</small>
                                    </div>
                                    <div class="input-field">
                                        <label for="username">Repeat New Password</label>
                                        <div class="inline">
                                            <input type="password" id="repeat_new_password" value="">
                                        </div>
                                        <small>error</small>
                                    </div>
                                    <div class="btn-container">
                                        <a class="btn" id="update_password" aria-disabled="true">Update Password</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

<!--            <div class="tabs">-->
<!--                <div class="tab-link-container">-->
<!--                    <a href="#" class="tab-link current" data-tab="profile-settings">Profile Settings</a>-->
<!--                    <a href="#" class="tab-link" data-tab="account-settings">Account Settings</a>-->
<!--                </div>-->

<!--                <div id="account-settings" class="tab-content">-->
<!--                    <div class="form-group">-->
<!--                        <label for="email">Change Email</label>-->
<!--                        <input type="email" id="email">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="password">Change Password</label>-->
<!--                        <input type="password" id="password">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </main>

        <div class="overlay hidden" id="overlay"></div>
        <div class="popup hidden" id="message">
            <div class="content"></div>
            <div class="content hidden" id="msg">

        </div>


    <script>
        const ROOT = "<?=ROOT?>";
        const user = <?=$user?>;
        // console.log(user[0]);
    </script>
    <script src="<?=ROOT?>/assets/js/Technician/popupform.js  "></script>
    <script src="<?=ROOT?>/assets/js/accountsettings.js  "></script>
    <script src="<?=ROOT?>/assets/js/Technician/tabs.js  "></script>
</body>
</html>



<!--<svg width='88px' height='88px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">-->
<!--    <rect x="0" y="0" width="100" height="100" fill="none">-->
<!--    </rect>-->
<!--    <circle cx="50" cy="50" r="40" stroke="#fff" stroke-opacity="0.2" fill="none" stroke-width="8" stroke-linecap="round">-->
<!--        <animate id="animation1"-->
<!--                 attributeName="opacity"-->
<!--                 from="0.5" to="1" dur="1s"-->
<!--                 begin="0s;animation2.end" />-->
<!--        <animate id="animation2"-->
<!--                 attributeName="opacity"-->
<!--                 from="1" to="0.5" dur="1s"-->
<!--                 begin="animation1.end" />-->
<!--    </circle>-->
<!--    <circle cx="50" cy="50" r="40" stroke="#fff" fill="none" stroke-width="8" stroke-linecap="round">-->
<!--        <animate attributeName="stroke-dashoffset" dur="1.5s" repeatCount="indefinite" from="0" to="502">-->
<!--        </animate>-->
<!--        <animate attributeName="stroke-dasharray" dur="1.5" repeatCount="indefinite" values="150.6 100.4;1 250;150.6 100.4">-->
<!--        </animate>-->
<!--    </circle>-->
<!--</svg>-->
