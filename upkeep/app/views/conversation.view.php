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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/conversation.css">
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
                <a href="<?= ROOT ?>/Itemowner/Userdashboard/" >
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="<?= ROOT ?>/Community">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#" class="active">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="<?= ROOT ?>/Signout">
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
            <div class="heading">
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
                            <small class="text-muted">User</small>
                        </div>
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="conversationDetails">
                <h2>Messages</h2>
                <div class="msgSearch">
                    <input type="search" name="" id="" placeholder="Search">
                    <span class="material-icons-sharp">search</span>
                </div>
                
                <div class="users">
                    <p>Loading</p>
                </div>

            </div>
        </div>

    </div>
        <script src="<?= ROOT ?>/assets/js/conversation.js"></script>
</body>
</html>