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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/additemtemplate.css">
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
                <a href="#" >
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
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
                <h1>Items Templates</h1>
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

            <div class="insight">
                <form method="post" action="#">
                    <div class="itemDetails">
        
                        <div class="input-box">
                            <span class="details">Item template Name</span>
                            <input type="text" name="name" id="" required placeholder="Enter Item template Name">
                        </div>
        
                        <div class="input-box">
                            <span class="details">Status</span>
                            <select name="" name="status" id="district" ></select>
                        </div>
                        
                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Item Type</span>
                                <input type="text" name="type" id="" required placeholder="Enter Description">
                            </div>
            
                            <div class="input-box">
                                <span class="details">Category</span>
                                <input type="text" name="category" id="" required placeholder="Enter Model">
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Description</span>
                                <input type="text" name="description" id="" required placeholder="Enter Description about item">
                            </div>

                            <div class="input-box">
                                <span class="details">Esti. lifespan </span>
                                <input type="date" name="date" id=""  placeholder="Enter Purchase Date">
                            </div>

                        </div>
                        
        
                        <div class="button">
                            <input type="submit" value="Add Item">
                        </div>
        
                    </div>
                </form>
            </div>
        </main> 

    </div>
    <script src="<?= ROOT ?>/assets/js/additemtemplate.js"></script>
</body>
</html>