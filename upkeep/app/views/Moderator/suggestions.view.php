<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/suggestions.css">
     <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
</head>

<body>
    <div class="container">
        <aside>

            <div class="top">
                <img src="<?= ROOT ?>/assets/images/logo.png " alt="">
                <img src="<?= ROOT ?>/assets/images/title.png" alt="">
            </div>

            <div class="sidebar">
                <a href="<?= ROOT ?>/Moderator/Moderatordashboard">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Itemtemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Complaint">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Statistics">
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Statistics</h3>
                </a>
                <a href="<?= ROOT ?>/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>

        </aside>

        <main>

            <div class="mainHeader">

                <h1>Suggestions</h1>

                <div class="right">

                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>

                    <div class="profile">

                        <div class="info">
                            <p>Hey,<b>Saman</b> </p>
                            <small class="text-muted">User</small>
                        </div>

                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                        </div>

                    </div>

                </div>

            </div>

            <div class="insight">

                <div class="swiper mySwiper item">

                    <h1>Item Suggestions</h1>
                    <div class="swiper-wrapper card-main">
                    
    <!-- <button class="arrow" onclick="scrollL()"><span class="material-icons-sharp">chevron_left</span></button> -->

                        <a href="<?= ROOT ?>/Moderator/Itemsuggestion">
                            <div class="swiper-slide card-1" role="button">

                                <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                                <h3><b>Non Inverter</b></h3>
                                <p>Air Conditioner</p>
                                <div class="c-1">
                                    <h2 class="warning">25</h2>
                                    <p class="u">users</p>
                                </div>
                        </a>
                    </div>
                    <a href="<?= ROOT ?>/Moderator/Itemsuggestion">
                        <div class="swiper-slide card-2" role="button">

                            <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                            <h3><b>Non Inverter</b></h3>
                            <p>Air Conditioner</p>
                            <div class="c-2">
                                <h2 class="warning">25</h2>
                                <p class="u">users</p>
                            </div>
                    </a>
                </div>


                <a href="<?= ROOT ?>/Moderator/Itemsuggestion">
                    <div class="swiper-slide card-3" role="button">

                        <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                        <h3><b>Non Inverter</b></h3>
                        <p>Air Conditioner</p>
                        <div class="c-3">
                            <h2 class="warning">25</h2>
                            <p class="u"> users</p>
                        </div>
                </a>
            </div>

            <a href="<?= ROOT ?>/Moderator/Itemsuggestion" role="button">
                <div class="swiper-slide card-4">

                    <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                    <h3><b>Non Inverter</b></h3>
                    <p>Air Conditioner</p>
                    <div class="c-4">
                        <h2 class="warning">25</h2>
                        <p class="u"> users</p>
                    </div>
            </a>
    </div>
    <a href="<?= ROOT ?>/Moderator/Itemsuggestion" role="button">
                            <div class="swiper-slide card-5" >

                                <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                                <h3><b>Non Inverter</b></h3>
                                <p>Air Conditioner</p>
                                <div class="c-5">
                                    <h2 class="warning">25</h2>
                                    <p class="u"> users</p>
                                </div>
                        </a>    </div>
                        <!-- <button class="arrow" onclick="scrollR()"><span class="material-icons-sharp">navigate_next</span></button> -->
                        <a href="<?= ROOT ?>/Moderator/Itemsuggestion" role="button">
                            <div class="swiper-slide card-6" >

                                <img src="<?= ROOT ?>/assets/images/item1.png" alt="">
                                <h3><b>Non Inverter</b></h3>
                                <p>Air Conditioner</p>
                                <div class="c-6">
                                    <h2 class="warning">25</h2>
                                    <p class="u"> users</p>
                                </div>
                        </a>    </div>
                    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
    </div>

    <div class="maintenance">

        <h1>Maintenance Suggestions</h1>

        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Sub Component</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="show-r-1">
                        <td>Description</td>
                        <td>Sub Component</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    <tr class="show-r-2" role="button">
                        <td>Description</td>
                        <td>Sub Component</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    <tr class="show-r-3" role="button">
                        <td>Description</td>
                        <td>Sub Component</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                    <tr class="show-r-4 " role="button">
                        <td>Description</td>
                        <td>Sub Component</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

    </div>

    </main>
    <div class="popupview hidden">
        <button class="closebtn">&times;</button>
        <div class="popup-text">
            <div class="1">
                <span class="material-icons-sharp">view_in_ar</span>
                <h4>Item name</h4>
                <h4><B>Samsung Inverter Windfree AC</B> </h4>
            </div>
            <div class="2">
                <span class="material-icons-sharp">chat_bubble_outline</span>
                <h4>Maintenance task</h4>
                <h4><b>Replace HAVC air filters</b></h4>
            </div>
            <div class="3">
                <span class="material-icons-sharp">construction</span>
                <h4>Sub Component</h4>
                <h4><b>Air filter</b></h4>
            </div>
        </div>
        <div class="actions">
            <button>Add to template</button>
            <button>Edit</button>
            <button>Reject</button>
        </div>
    </div>


    <div class="overlayview hidden"></div>
    </div>
    <script src="<?= ROOT ?>/assets/js/Moderator/maintenance_suggestions.js"></script>
    <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->
</body>

</html>