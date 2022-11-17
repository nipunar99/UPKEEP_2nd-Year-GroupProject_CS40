<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpKeep</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/viewItem.css">
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
                <a href="<?= ROOT ?>/Itemowner/Userdashboard/">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Notifications</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">error</span>
                    <h3>Reports</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <div class="mainHeader">
                <h1>Items</h1>
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
                                <small class="text-muted">User</small>
                            </div>
                            <div class="profile-photo">
                                <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End of top -->
        
                    <!-- End of recent updates -->
        
                </div>
    
            </div>
            
            <div class="toolbar">
                <div class="searchBar">
                    <input type="search" name="" id="" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div>
                <a href="<?= ROOT ?>/Itemowner/Additem"><button class="addItem">Add an Item</button></a>
                
                <button class="availItem">Available Items</button>
            </div>

            <div class="insight">
                
            <?php 
                if(!empty($result)) {
                    foreach($result as $row)
                        echo "
                        <div class=''>
                        <span class='material-icons-sharp'>analytics</span>
                        <div class='middle'>
                            <div class='left'>
                                <h3>".$row->item_name."</h3>
                                <h2>".$row->item_type."</h1>
                            </div>
                            <div class='progress'>
                                <img src='http://localhost/UpKeep/public/assets/images/item1.png'>
                            </div>
                        </div>
                        <small class='text-muted'>More Details</small>
                    </div>
                        ";
                }
            ?>

                <!-- End of Sales  -->
            </div>
        </main> 

    </div>
</body>
</html>
