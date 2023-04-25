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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/findjobs.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a href="<?=ROOT?>/Technician/Dashboard" >
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Findjobs" >
                        <span class="material-icons-sharp">work</span>
                        <h3>Find Jobs</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Orders" class="active" >
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
                    <h1>My Orders</h1>
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

            <div class="toolbar">
                <div class="filter-search">
                    <div>
                        <div class="filter-container">
                            <div class="filter-item">
                                <label for="category">Category:</label>
                                <select id="category">
                                    <option value="all">All</option>
                                    <option value="category1">Category 1</option>
                                    <option value="category2">Category 2</option>
                                </select>
                            </div>
                            <div class="filter-item">
                                <label for="sort">Sort:</label>
                                <select id="sort">
                                    <option value="newest">Newest</option>
                                    <option value="oldest">Oldest</option>
                                </select>
                            </div>
                            <div class="filter-item">
                                <label for="items">Items:</label>
                                <select id="items">
                                    <option value="A/C">A/C</option>
                                    <option value="Refridgerator">Refridgerator</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="searchBar">
                        <input type="search" name="" id="" placeholder="Search item">
                        <span class="material-icons-sharp">search</span>
                    </div>

                </div>
            </div>

            <div class="warpper">
                <input class="radio" id="one" name="group" type="radio" checked>
                <input class="radio" id="two" name="group" type="radio">
                <div class="tabs">
                    <label class="tab" id="one-tab" for="one">UPCOMMING ORDERS</label>
                    <label class="tab" id="two-tab" for="two">COMPLETED ORDERS</label>
                </div>
                <div class="panels">
                    <div class="panel" id="one-panel">
                        <div class="recent-orders">
                            <table>
                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                    <tr>
                                        <td>
                                            <div class="order">

                                                <div class="left date">
                                                    <h1>Apr</h1>
                                                    <h4>02</h4>
                                                </div>

                                                <div class="description">
                                                    <h1>Need a A/C Technician</h1>
                                                    <p>Need to repair the fans of the air condition which are broken due to rusting.
                                                        The fan is making a strange noice when working
                                                    </p>
                                                    <a>AC Repair</a>
                                                    <a>AC Fan</a>
                                                </div>
                                                <div class="action">
                                                    <div class="details">
                                                        <h4><span class="material-icons-sharp">place</span>Maharagama</h4>
                                                        <h4><span class="material-icons-sharp">event</span>2023/04/02</h4>
                                                    </div>
                                                    <div class="actions">
                                                        <a class="btn apply">Complete</a>
                                                        <a class="btn reschedule">Request Reschedule</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endfor; ?>


                            </table>
                            <a href="#">Load More</a>
                        </div>
                    </div>
                    <div class="panel" id="two-panel">
                        <div class="recent-orders">
                            <table>
                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                    <tr>
                                        <td>
                                            <div class="order">

                                                <div class="left success">
                                                    <span class="material-icons-sharp">task_alt</span>
                                                </div>

                                                <div class="description">
                                                    <h1>Need a A/C Technician</h1>
                                                    <p>Need to repair the fans of the air condition which are broken due to rusting.
                                                        The fan is making a strange noice when working
                                                    </p>
                                                    <a>AC Repair</a>
                                                    <a>AC Fan</a>
                                                </div>
                                                <div class="action">
                                                    <div class="details">
                                                        <h4><span class="material-icons-sharp">place</span>Maharagama</h4>
                                                        <h4><span class="material-icons-sharp">event</span>2023/04/02</h4>
                                                    </div>
                                                    <div class="actions">
                                                        <a class="btn view">View Report</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endfor; ?>


                            </table>
                            <a href="#">Load More</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="jobs"> -->

            <!-- </div>     -->
        </main>
    </div>


    <script src="<?= ROOT ?>/assets/js/addgig.js"></script>

</body>

</html>