<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/findjobs.css">
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
                    <a href="<?=ROOT?>/Technician/Dashboard">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Findjobs" class="active">
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
                    <h1>Find Jobs</h1>
                </div>
                <div class="right">
                    <div class="notification">
                        <span class="material-icons-sharp">notifications</span>
                    </div>

                    <div class="profile" id="profile">
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
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button>Search</button>
                </div>
<!--                <div class="sort">-->
<!--                    <label for="sort-select">Sort by:</label>-->
<!--                    <select id="sort-select">-->
<!--                        <option value="date">Date</option>-->
<!--                        <option value="salary">Salary</option>-->
<!--                        <option value="location">Location</option>-->
<!--                    </select>-->
<!--                </div>-->
                <div class="view-mode">
                    <button class="list-view active" title="List view"><span class="material-icons-sharp">view_list</span></button>
                    <button class="grid-view" title="Grid view"><span class="material-icons-sharp">grid_view</span></button>
                </div>
            </div>


            <div class="job-view">
                <div class="list-container">
                    <div class="list">
                        <div class="header nbs">
                            <div class="left">
                                <div class="job-count">
                                    <h2 class="text-muted">Top Results</h2>
                                    <p class="text-muted">1-20 0f 200 <span id="job-count">0</span> results</p>
                                </div>
                            </div>
                            <div class="right">
                                <div class="sort">
                                    <label for="sort-select">Sort by:</label>
                                    <select id="sort-select">
                                        <option value="date">Date</option>
                                        <option value="salary">Salary</option>
                                        <option value="location">Location</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <ol class="list-view-filter">
                            <?php if($jobs):?>
                            <?php foreach ($jobs as $job):?>
                            <li data-jobid="<?=$job->job_id?>">
                                <div class="job-item">
                                    <div class="job-item-header">
                                        <div class="title">
                                            <small class="text-muted" id="post_time">posted at <?=$job->created_at?></small>
                                            <h3 class="job-item-title"><?=$job->title?></h3>
                                            <div class="worktags"><a><?=$job->job_type?></a><a class="worktags">Repair</a></div>
                                        </div>
                                    </div>
                                    <div class="job-item-middle">
                                        <p class="job-item-description text-muted"><?=$job->description?></p>
                                        <div class="posted-by">
                                            <span class="material-icons-sharp">account_circle</span>
                                            <p>Posted by <a><?=$job->user_posted?></a></p>
                                        </div>
                                    </div>
                                    <div class="job-item-bottom">
                                        <div class="left">
                                            <div class="job-item-info">
                                                <span class="material-icons-sharp job-item-info-label">my_location</span>
                                                <span class="job-item-info-value"><?=$job->city.", ".$job->district?></span>
                                            </div>
                                            <div class="job-item-info">
                                                <span class="material-icons-sharp job-item-info-label">handyman</span>
                                                <span class="job-item-info-value"><?=$job->item_name?></span>
                                            </div>
                                        </div>
                                        <div class="btn-container job-item-buttons">
                                            <?php if($job->applied):?>
                                            <a class="job-item-button" id="<?=$job->job_id?>" disabled>Applied</a>
                                            <?php else:?>
                                            <a class="job-item-button apply-button" id="<?=$job->job_id?>" data-jobid="<?=$job->job_id?>">Apply</a>
                                            <?php endif;?>
                                            <a class="job-item-button view-button" href="<?=ROOT?>/Technician/Findjobs/viewJob/<?=$job->job_id?>">View</a>
                                        </div>
                                    </div>
                                </div>

                            </li>
                            <?php endforeach;?>
                            <?php endif;?>
                        </ol>
                        <div class="footer nbs">
                            <div class="right">
                                <nav class="pagination">
                                    <ul>
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#" class="active">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </nav>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-tab">
                    <div class="filter-panel">
                        <h2 class="filter-title">Filter Results</h2>
                        <div class="filter-content">
                            <div class="filter-group">
                                <h3 class="filter-group-title">Category</h3>
                                <div class="filter-accordion">
                                    <input type="checkbox" id="category-filter" class="accordion-input">
                                    <label for="category-filter" class="accordion-label">Select Categories</label>
                                    <div class="accordion-content">
                                        <div class="filter-category">
                                            <label><input type="checkbox" value="category1"> Category 1</label>
                                            <label><input type="checkbox" value="category2"> Category 2</label>
                                            <label><input type="checkbox" value="category3"> Category 3</label>
                                            <label><input type="checkbox" value="category4"> Category 4</label>
                                        </div>
                                        <div class="filter-subcategory">
                                            <label for="subcategory-filter">Select Subcategories</label>
                                            <select id="subcategory-filter" multiple disabled>
                                                <option value="subcategory1">Subcategory 1</option>
                                                <option value="subcategory2">Subcategory 2</option>
                                                <option value="subcategory3">Subcategory 3</option>
                                                <option value="subcategory4">Subcategory 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group">
                                <h3 class="filter-group-title">Type of Work</h3>
                                <div class="filter-accordion">
                                    <input type="checkbox" id="type-filter" class="accordion-input">
                                    <label for="type-filter" class="accordion-label">Select Types</label>
                                    <div class="accordion-content">
                                        <div class="filter-type">
                                            <label><input type="checkbox" value="type1"> Type 1</label>
                                            <label><input type="checkbox" value="type2"> Type 2</label>
                                            <label><input type="checkbox" value="type3"> Type 3</label>
                                            <label><input type="checkbox" value="type4"> Type 4</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group">
                                <h3 class="filter-group-title">Delivery Method</h3>
                                <div class="filter-accordion">
                                    <input type="checkbox" id="delivery-filter" class="accordion-input">
                                    <label for="delivery-filter" class="accordion-label">Select Methods</label>
                                    <div class="accordion-content">
                                        <div class="filter-delivery">
                                            <label><input type="checkbox" value="delivery1"> Delivery 1</label>
                                            <label><input type="checkbox" value="delivery2"> Delivery 2</label>
                                            <label><input type="checkbox" value="delivery3"> Delivery 3</label>
                                            <label><input type="checkbox" value="delivery4"> Delivery 4</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="filter-group">
                                <h3 class="filter-group-title">Distance</h3>
                                <div class="filter-distance">
                                    <select>
                                        <option value="distance1">Less than 5 miles</option>
                                        <option value="distance2">5-10 miles</option>
                                        <option value="distance3">10-20 miles</option>
                                        <option value="distance4">More than 20 miles</option>
                                    </select>
                                </div>
                            </div>
                            <div class="filter-tag-list"></div> <!-- Add filter tag list here -->
                            <button class="filter-btn">Apply Filters</button>
                        </div>
                </div>
            </div>

        </main>
    </div>

    <div class="overlay hidden" id="overlay"></div>
    <div class="popup hidden" id="apply_job">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
            <div class="header nbs">
                <div class="center">
                    <h2 class="popup-title"></h2>
                </div>
            </div>
            <form method="post" >
                <div class="input-field">
                    <label for="quote">Enter a estimated service charge(Rs.):</label>
                    <input type="number" id="quote" name="quote" placeholder="Enter your quote">
                    <small>Error message</small>
                </div>
                <div class="btn-container">
                    <button class="btn btn-primary" id="apply-job">Apply</button>
                    <button class="btn btn-cancel ">Cancel</button>
                </div>
            </form>
        </div>
        <div class="content hidden" id="msg">

        </div>
    </div>


    <script>
        const ROOT = "<?=ROOT?>";

    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/findjobs.js"></script>

</body>

</html>