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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/conversation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">

</head>
<body>
    <div class="container">
        <aside>
            <div class="header nbs top">
                <div class="left">
                </div>
                <div class="center">
                    <div class="header-logo">
                        <a><img src="<?=ROOT?>/assets/images/headerlogo2.svg" alt=""></a>
                    </div>
                </div>
                <div class="right"></div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>
            </div>

            <<div class="middle">
            <?php if ($_SESSION['user_role'] === 'technician') : ?>
                    <div class="sidebar">
                        <a href="<?= ROOT ?>/Technician/Dashboard">
                            <span class="material-icons-sharp">grid_view</span>
                            <h3>Dashboard</h3>
                        </a>

                        <a href="<?= ROOT ?>/Technician/Findjobs">
                            <span class="material-icons-sharp">work</span>
                            <h3>Find Jobs</h3>
                        </a>

                        <a href="<?= ROOT ?>/Technician/Orders">
                            <span class="material-icons-sharp">list_alt</span>
                            <h3>Orders</h3>
                        </a>

                        <a href="<?= ROOT ?>/Technician/Gigs">
                            <span class="material-icons-sharp">task</span>
                            <h3>Gigs</h3>
                        </a>


                        <a href="<?= ROOT ?>/Community" class="active">
                            <span class="material-icons-sharp">forum</span>
                            <h3>Community</h3>
                        </a>


                        <a href="<?= ROOT ?>/Coversation">
                            <span class="material-icons-sharp">mail_outline</span>
                            <h3>Conversation</h3>
                        </a>

                        <a href="<?= ROOT ?>/Technician/Statistics">
                            <span class="material-icons-sharp">analytics</span>
                            <h3>Statistics</h3>
                        </a>
                        <a href="<?= ROOT ?>/accountsettings" >
                            <span class="material-icons-sharp">settings</span>
                            <h3>Settings</h3>
                        </a>
                    </div>
                <?php elseif ($_SESSION['user_role'] === 'item_owner') : ?>
                    <div class="sidebar">
                        <a href="<?= ROOT ?>/itemowner/Userdashboard">
                            <span class="material-icons-sharp">grid_view</span>
                            <h3>Dashboard</h3>
                        </a>

                        <a href="<?= ROOT ?>/itemowner/item">
                            <span class="material-icons-sharp">view_in_ar</span>
                            <h3>Item</h3>
                        </a>

                        <a href="<?= ROOT ?>/itemowner/TechnicianGigs">
                            <span class="material-icons-sharp">person</span>
                            <h3>Technician</h3>
                        </a>

                        <a href="<?= ROOT ?>/Community">
                            <span class="material-icons-sharp">forum</span>
                            <h3>Community</h3>
                        </a>


                        <a href="<?= ROOT ?>/Conversation" class="active">
                            <span class="material-icons-sharp">mail_outline</span>
                            <h3>Conversation</h3>
                            <span class="message-count">11</span>
                        </a>

                        <a href="<?= ROOT ?>/itemowner/statistic">
                            <span class="material-icons-sharp">trending_up</span>
                            <h3>Statistics</h3>
                        </a>

                        <a href="<?= ROOT ?>/accountsettings" >
                            <span class="material-icons-sharp">settings</span>
                            <h3>Settings</h3>
                        </a>

                    </div>
                <?php endif; ?>
            </div>

            <div class="bottom">
                <a href=<?=ROOT."/Signout"?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>
        </aside>

        <main class="main1">
            <div class="boardtitle">
                <h1>Conversation</h1>
            </div>

            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="massagebox">
                <div class="title">
                    <img src="<?= ROOT ?>/assets/images/profile-1.jpg"  alt=""class="user">
                    <div class="titleDetails">
                        <h3>Kavindu Pramod</h3>
                        <h4>Avg. response time : <b>1 day</b></h4>
                    </div>
                    
                </div>
                <div class="msgtextarea"> 

                    <div class="outgoing chat">
                        <div class="details outgoingdetails">
                            <p>Lore</p>
                            <h4>11.00 a.m.</h4>
                        </div>
                    </div>
                    <div class="incomming chat">
                        <img src="" alt="">
                        <div class="details incommingdetails">
                            <p>test</p>
                            <h4>11.00 a.m.</h4>
                        </div>
                    </div>
                    <div class="incomming chat">
                        <img src="" alt="">
                        <div class="details incommingdetails">
                            <p>affLorem ipsum dolor sit amet consectetur adipisicing elit. Modi nemo, sapiente sed inventore obcaecati aperiam nobis totam voluptatibus soluta. Et consectetur, quae magni illum ducimus officia nesciunt. Eveniet, ut mollitia!</p>
                        </div>
                    </div>
                    <div class="outgoing chat">
                        <div class="details outgoingdetails">
                            <p>Lorem ipsum dolor sit em ipsum dolor sit amet consectetur ad </p>
                        </div>
                    </div>
                    <div class="incomming chat">
                        <img src="" alt="">
                        <div class="details incommingdetails">
                            <p>affLorem ipsum dolor sit amet consectetur adipisicing elit. Modi nemo, sapiente sed inventore obcaecati aperiam nobis totam voluptatibus soluta. Et consectetur, quae magni illum ducimus officia nesciunt. Eveniet, ut mollitia!</p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="typearea">
                <span class="material-icons-sharp">emoji_emotions</span>
                <input class="msgDetails" type="text" name="" id="" placeholder="Type a massage">
                <button class="btnSend"><span class="material-icons-sharp">send</span>Send</button>
            </div> 
        </main>

        <!-- End of Main -->

        <div class="right">
            <div class="header nbs">
                <div class="right">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>

                    <div class="notification">
                        <div>
                            <span class="material-icons-sharp" onclick="openNav()">notifications</span>
                            <span class="badge">3</span>
                        </div>
                    </div>

                    <div class="profile dropdown">
                        <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                        <div class="info">
                            <div class="name">
                                <p><?= $_SESSION['USER']->first_name . " " . $_SESSION['USER']->last_name ?></b></p>
                            </div>
                            <small class="text-muted role"><?= ucfirst($_SESSION['user_role']) ?></small>
                        </div>
                        <div class="profile-photo">
                            <div><img src="<?= ROOT ?>/assets/images/photo2.png" alt=""></div>
                        </div>
                        <div class="dropdown-content hidden">
                            <a href="<?= ROOT ?>/Profile"><span class="material-icons-sharp">person</span>Profile</a>
                            <a href="<?= ROOT ?>/Accountsettings"><span class="material-icons-sharp">settings</span>Settings</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="conversationDetails">
                <h2>Messages</h2>
                <div class="msgSearch">
                    <input type="search" name="" id="searchusers" placeholder="Search">
                    <span class="material-icons-sharp">search</span>
                </div>
                
                <div class="users">
                    <p>Loading</p>
                </div>

            </div>
        </div>

    </div>
    <div id="mySidenav" class="sidenav notification hiddenNotify">
        <div class="header">
            <div class="center">
                <h2>Notifications</h2>
            </div>
            <div class="tabs">
                <div class="tab-item active">
                    <i class="tab-icon fas fa-bell"></i>
                    Alert
                </div>
                <div class="tab-item">
                    <i class="tab-icon fas fa-clock"></i>
                    History
                </div>
                <div class="line"></div>
            </div>
            <span class="closebtn" onclick="closeNav()">&times;</span>
        </div>
        <div class="tab-content" >
            <div class="tab-pane active" id="">
                <ol id="notification-list-unread">

                </ol>


            </div>

            <div class="tab-pane" id="">
                <ol id="notification-list-history">

                </ol>

            </div>
    </div>

    <?php
        echo "<script> var ROOT = '".ROOT."'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/conversation.js"></script>
    <script src="<?= ROOT ?>/assets/js/Itemowner/public.js"></script>
    <script src="<?=ROOT?>/assets/js/notification.js"></script>
</body>
</html>