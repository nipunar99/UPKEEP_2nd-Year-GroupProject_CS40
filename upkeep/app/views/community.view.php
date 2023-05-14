<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/779982a7ac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/community.css">
    
</head>

<body>
    <div class="container">
        <aside class="close">
            <div class="header nbs">
                <div class="left">
                </div>
                <div class="center">
                    <div class="header-logo">
                        <a><img src="<?= ROOT ?>/assets/images/headerlogo2.svg" alt=""></a>
                    </div>
                </div>
                <div class="right"></div>
            </div>

            <div class="middle">
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

                        <a href="<?= ROOT ?>/Community" class="active">
                            <span class="material-icons-sharp">forum</span>
                            <h3>Community</h3>
                        </a>


                        <a href="<?= ROOT ?>/Conversation">
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
                <a href=<?= ROOT . "/Signout" ?>>
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>
            </div>


        </aside>

        <main>
            <div class="header nbs">
                <div class="center">
                    <h1>Community</h1>
                </div>
            </div>

            <div class="searchBar-container">
                <div class="searchBar">
                    <input type="search" name="" id="searchBarInput" placeholder="Search in the Community">
                    <span class="material-icons-sharp">search</span>
                </div>
            </div>

            <section class="main-content">
                <div class="list-container" id="create-post-input">
                    <div class="card">
                        <div class="card-col">
                            <div class="card-row">
                                <div class="user-profile">
                                    <img src="http://localhost/upkeep/upkeep/public/assets/images/profile-2.jpg">
                                </div>

                                <div class="post-input-container">
                                    <input type="text" rows="3" placeholder="What do you need to ask or share?" id="create-post-btn"></input>
                                </div>
                            </div>
                            <div class="card-row">
                                <a class="post-type text-muted"><i class="fa fa-question-circle"></i>Ask from Community</a>
                                <a class="post-type text-muted"><i class="fas fa-recycle"></i>Scrap and Sell</a>

                            </div>
                        </div>
                    </div>


                    <ol class="Post-List">
                        <!--                        <li class="post">-->
                        <!--                            <div class="card">-->
                        <!--                                <div class="post-container">-->
                        <!--                                    <div class="card-header">-->
                        <!--                                        <div class="user-profile">-->
                        <!--                                            <img src="--><? //= ROOT 
                                                                                        ?><!--/assets/images/profile-2.jpg">-->
                        <!--                                            <div>-->
                        <!--                                                <h3>Nimna Induwara</h3>-->
                        <!--                                                <p class="text-muted">January 04 2023, 15:40 pm</p>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!--                                        <a class="post-type-tag">Ask From Community</a>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="card-body">-->
                        <!--                                        <div class="card-row" id="about">-->
                        <!--                                            <h3 class="about-title">About</h3>-->
                        <!--                                            <div class="Item-details-tags">-->
                        <!--                                                <a class="tag">Air Conditioner</a>-->
                        <!--                                            </div>-->
                        <!--                                        </div>-->
                        <!---->
                        <!--                                        <p class="title"><b>What is the best way to unfreeze frozen AC pipes?</b></p>-->
                        <!--                                        <p class="text"></p>-->
                        <!--                                        <div class="image-grid">-->
                        <!--                                            <img src="--><? //= ROOT 
                                                                                        ?><!--/assets/images/profile-2.jpg" class="image">-->
                        <!--                                        </div>-->
                        <!---->
                        <!--                                    </div>-->
                        <!--                                    <div class="card-footer">-->
                        <!--                                        <div class="left activity-icons">-->
                        <!--                                            <a class="action upvote" ><span class="material-symbols-outlined">shift</span><p class="count" id="upvote-count">10</p></a>-->
                        <!--                                            <a class="action downvote"><span class="material-symbols-outlined">shift</span><p class="count" id="downvote-count">10</p></a>-->
                        <!--                                            <a class="action comment"><span class="material-symbols-outlined">comment</span><p class="count" id="comment-count">10</p></a>-->
                        <!--                                        </div>-->
                        <!--                                        <div class="right">-->
                        <!--                                            <a class="action"><span class="material-icons-sharp">report</span></a>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div id="image-modal" class="modal">-->
                        <!--                                <span class="close-modal">&times;</span>-->
                        <!--                                <div class="image-container">-->
                        <!--                                    <img id="modal-image" class="modal-image">-->
                        <!--                                </div>-->
                        <!--                                <a class="prev">&#10094;</a>-->
                        <!--                                <a class="next">&#10095;</a>-->
                        <!--                            </div>-->
                        <!--                        </li>-->
                    </ol>

                    <button type="button" class="load-more-btn" id="load-more-btn">Load More</button>
                </div>
            </section>
        </main>
        <!-- End of Main -->
        <div class="itempannelbtn">
            <span class="material-icons-sharp arrowback">arrow_back_ios</span>
        </div>

        <div class="right">
            <div class="header nbs">
                <div class="right">
                    <div class="notification">
                        <div>
                            <span class="material-icons-sharp" onclick="openNav()">notifications</span>
                            <span class="badge"></span>
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

            <div class="recent-updates">
                <h2>Popular Posts</h2>
                <div class="updates ">
                    <ol class="Popular-Post-List">

                    </ol>

                </div>
            </div>

        </div>

        <div class="overlay hidden" id="overlay"></div>

        <div class="popup hidden" id="create_post">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="header nbs">
                <div class="center">
                    <h2>Create Post</h2>
                </div>
            </div>
            <div class="tabs">
                <div class="tab-item active" id="ask-community-form-tab">
                    <i class="tab-icon fas fa-question-circle"></i>
                    Ask from Community
                </div>
                <div class="tab-item" id="scrap-and-sell-form-tab">
                    <i class="tab-icon fas fa-recycle"></i>
                    Scrap and Sell
                </div>
                <div class="line"></div>
            </div>
            <div class="content">
                <div class="tab-content">
                    <div class="tab-pane active" id="ask-community-post">
                        <form method="post" enctype="multipart/form-data" id="create-post-form">
                            <div class="item-div">
                                <h3 class="text-left">Tell about the Item</h3>
                                <div class="input-inline" id="initial-input">
                                    <div class="input-field">
                                        <label class="text-left">Item in Your List?</label>
                                        <div class="input-inline switch-field" id="radio">
                                            <input type="radio" id="switch_left" name="switch_2" value="yes" checked />
                                            <label for="switch_left">Yes</label>
                                            <input type="radio" id="switch_right" name="switch_2" value="no" />
                                            <label for="switch_right">No</label>
                                        </div>
                                        <small>&nbsp;</small>
                                    </div>
                                    <div class="input-field text-left">
                                        <!--                                    select option-->
                                        <label for="select-item">Select your Item</label>
                                        <select name="item" id="select-item">
                                            <option value="">Select Item</option>
                                        </select>
                                        <small>&nbsp;</small>
                                    </div>
                                </div>

                                <div class="input-inline" id="item-data">
                                    <div class="input-field text-left">
                                        <label for="category">Category</label>
                                        <select name="category" id="item-category">
                                            <option value="0">Select Category</option>
                                        </select>
                                        <small>&nbsp;</small>
                                    </div>
                                    <div class="input-field text-left">
                                        <label for="item_type">Item</label>
                                        <select name="item_type" id="item_type">
                                            <option value="0">Select Item</option>
                                        </select>
                                        <small>&nbsp;</small>
                                    </div>
                                    <div class="input-field text-left">
                                        <label for="brand">Brand</label>
                                        <input type="text" name="brand" id="brand" placeholder="Enter brand">
                                        <small>&nbsp;</small>
                                    </div>
                                    <div class="input-field text-left">
                                        <label for="model">Model</label>
                                        <input type="text" name="model" id="model" placeholder="Enter model">
                                        <small>&nbsp;</small>
                                    </div>

                                </div>
                            </div>


                            <div class="input-field text-left">
                                <label for="title ">Ask Your Question Briefly Here?</label>
                                <textarea name="title" id="title" placeholder="Question title"></textarea>
                                <small>&nbsp;error</small>
                            </div>
                            <div class="input-field text-left">
                                <label for="description ">Add More Description! (Optional)</label>
                                <textarea name="description" id="description" placeholder="Further description"></textarea>
                                <small>&nbsp;error</small>
                            </div>
                            <div class="input-field text-left">
                                <!--                                input field for adding multiple images with preview-->
                                <label for="images">Images</label>
                                <input type="file" name="images" id="images_input" multiple>
                                <div class="preview" id="preview"></div>
                                <small>&nbsp;error</small>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="scrap-and-sell">
                        <form id="create-scrap-post" enctype="multipart/form-data">
                            <div class="item-div">
                                <h3>NOTE:</h3>
                                <p>Inorder to create a scrap and sell post you must have the relevant item added to Upkeep</p>
                            </div>
                            <div class="input-field text-left">
                                <label for="select-item">Select your Item</label>
                                <select name="item" id="select-item2">
                                    <option value="">Select Item</option>
                                </select>
                                <small>&nbsp;</small>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <label>Item Details</label>
                                </div>
                                <div class="item-details-for-scrap">
                                    <div class="card-body">
                                        <div class="card-row">
                                            <div class="image">
                                                <img id="item_image" src="">
                                            </div>
                                            <div class="card-col">
                                                <div class="card-row">
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Item Name</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_name"></p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Item Category</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_type2"></p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Brand</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_brand2"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-row">
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Model</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="item_model2"></p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Purchase Price</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="purchase_price"></p>
                                                        </div>
                                                    </div>
                                                    <div class="card-col">
                                                        <div class="title">
                                                            <label>Warranty Status</label>
                                                        </div>
                                                        <div class="text">
                                                            <p class="text" id="warenty_status"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="place-holder">
                                        <h2>YOUR ITEM DETAILS WILL BE SHOWN HERE</h2>
                                    </div>
                                </div>

                            </div>
                            <div class="input-field text-left">
                                <label for="title ">Add a Brief Title Here</label>
                                <textarea name="title" id="title" placeholder="Post title"></textarea>
                                <small>&nbsp;error</small>
                            </div>
                            <div class="input-field text-left">
                                <label for="description ">Add More Description! (Optional)</label>
                                <textarea name="description" id="description" placeholder="Further description"></textarea>
                                <small>&nbsp;error</small>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="content hidden" id="msg">

            </div>
            <div class="footer nbs">
                <div class="right">
                    <div class="btn-container">
                        <a class="btn btn-primary" id="create-ask-community-post-btn">Create Post</a>
                        <a class="btn btn-primary hidden" id="create-scrap-sell-post-btn">Create Post</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup hidden" id="view_post">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="header nbs">
                <div class="center">
                    <h2>Post</h2>
                </div>
            </div>

            <div class="content">
                <div class="post-details">

                </div>

                <div class="comment-section-container">
                    <div class="head nbs">
                        <div class="left">
                            <h2>Comments<span class="material-icons-sharp"></span></h2>
                        </div>
                    </div>
                    <ol class="comment-section">

                    </ol>
                </div>

            </div>
            <div class="content hidden" id="msg">

            </div>
            <div class="card" id="add-comment-input">
                <div class="card-col">
                    <div class="card-row">
                        <div class="user-profile" id="current-user-profile-photo">
                            <img src="http://localhost/upkeep/upkeep/public/assets/images/profile-2.jpg">
                        </div>
                        <form method="post" enctype="multipart/form-data" id="add-comment-form">
                            <div class="post-input-container">
                                <textarea type="text" id="add-comment" rows="3" placeholder="Enter Your Comment Here" name="comment"></textarea>
                            </div>
                        </form>
                        <a class="btn" id="add-comment-btn">Comment</a>
                    </div>

                </div>
            </div>
        </div>

        <script>
            const ROOT = '<?= ROOT ?>';
            const userdata = '<?= json_encode($userdata) ?>';
            <?php if($_SESSION['user_role']==="item_owner"):?>
            var templates = '<?= $templates ?>';
            var myItems = '<?= $my_items ?>';
            <?php endif;?>
        </script>


        <script src="<?= ROOT ?>/assets/js/main.js"></script>
        <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
        <!--        <script src="--><? //= ROOT
                                    ?><!--/assets/js/imagemodal.js"></script>-->
        <script src="<?= ROOT ?>/assets/js/Technician/tabs.js"></script>
        <script src="<?= ROOT ?>/assets/js/notification.js"></script>
        <script src="<?= ROOT ?>/assets/js/community.js"></script>
        <?php if($_SESSION['user_role']=="item_owner"):?>
            <script src="<?= ROOT ?>/assets/js/communityEssential.js"></script>
        <?php endif;?>
</body>

</html>