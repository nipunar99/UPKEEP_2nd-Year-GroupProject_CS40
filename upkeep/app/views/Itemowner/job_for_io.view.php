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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/job.css">
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
                    <a href="<?= ROOT ?>/Itemowner/Userdashboard/">
                        <span class="material-icons-sharp">grid_view</span>
                        <h3>Dashboard</h3>
                    </a>

                    <a href="#">
                        <span class="material-icons-sharp">view_in_ar</span>
                        <h3>Item</h3>
                    </a>

                    <a href="<?= ROOT ?>/itemowner/TechnicianGigs" class="active">
                        <span class="material-icons-sharp">person</span>
                        <h3>Technician</h3>
                    </a>

                    <a href="<?= ROOT ?>/Community">
                        <span class="material-icons-sharp">forum</span>
                        <h3>Community</h3>
                    </a>


                    <a href="<?= ROOT ?>/Conversation">
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

            <div class="content">
                <div class="head">
                    <div class="title">
                        <div class="order-id">
                            <p class="text-muted">Job #<?=$job->job_id ?></p>
                        </div>
                        <div class="order-title">
                            <h1 class="left-text"><?= $job->title ?></h1>
                        </div>
                        <small>posted on <?=$job->created_at?></small>
                    </div>
                    <div class="btn-container" id="head-buttons"
                         data-jobid="<?=$job->job_id?>"
                         data-orderid="<?=$job->order_id?>"
                         data-title="<?=$job->title?>"
                         data-client="<?=$job->technician?>"
                         data-date="<?=$job->date?>"
                         data-time="<?=$job->time?>"
                         data-address="<?=$job->city.', '.$job->district?>"
                    >


                    </div>
                </div>
                <div class="content-a-20">
                    <div class="left">
                        <div class="card" id="job-details">
                            <div class="card-header">
                                <h2>Job Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Description</h3>
                                        </div>
                                        <div class="text">
                                            <p class="text"><?= $job->jd?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Location</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text"><?=$job->city?>, <?=$job->district?></p>
                                        </div>
                                    </div>
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Job Type</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text">
                                                <a><?=$job->job_type?></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Delivery method</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text">
                                                <a><?=$job->delivery_method?></a>
                                            </p class=text>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Date</h3>
                                        </div>
                                        <div class="text">
                                            <p class="text">
                                                <?=$job->date?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">item</h3>
                                        </div>
                                        <div class="image-set">
                                            <h3 class="title"><?=$job->item_type?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="item_details">
                            <div class="card-header">
                                <h2>Item Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="card-row">
                                    <div class="image">
                                        <img src="<?= ROOT ?>/assets/images/uploads/<?=$job->image?>" alt="">
                                    </div>
                                    <div class="card-col">
                                        <div class="card-row">
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Item Name</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=$job->item_name?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Item Category</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=$job->item_type?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Brand</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=$job->brand?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-row">
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Purchased Date</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=($job->purchase_date) ? $job->purchase_date : "N/A"?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Warranty Date</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=($job->warrenty_date) ? $job->warrenty_date : "N/A"?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Warranty Status</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=($job->warrenty_date<date("y m d")) ? "Expired" : "Active"?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <!--                    client data card with profile picture of client and number of order and all-->

                        <?php if($job->technician_assigned):?>
                        <div class="card">
                            <div class="card-header">
                                <h2>Technician Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="profile-image">
                                    <img src="<?= ROOT."/assets/images/profilepic/profile-1.jpg".$job->profile_picture?>" alt="profile">
                                </div>
                                <h2 class="center-text"><?=$job->technician?></h2>
                                <small class="text-muted center-text">last online <?=$job->last_login?></small>
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="card-col-title">
                                            <h3 class="title">Email</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text"><?=$job->email?></p>
                                        </div>
                                    </div>
                                    <div class="card-col ">
                                        <div class="card-col-title">
                                            <h3 class="title">Contact</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text">
                                                <?=($job->contact_no)? $job->contact_no : $job->mobile_no?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php elseif ($job->technician_assigned == 0):?>
                        <div class="card" id="application_details">
                            <div class="card-header">
                                <h2>Applied Technicians</h2>
                            </div>
                            <!-- list of technicians with their profile pic -->
                            <div class="card-body">
                                <ol>
                                    <?php if ($applied_technicians):?>
                                        <?php foreach ($applied_technicians as $technician):?>
                                            <li>
                                                <div class="card-row">
                                                    <div class="profile-image">
                                                        <img src="<?= ROOT."/assets/images/profile-1.jpg"?>" alt="profile">
                                                    </div>
                                                    <h3 class="title"><?=$technician->technician_name?></h3>
                                                    <p class="text-muted">Rs. <?=$technician->quote?></p>
                                                </div>
                                            </li>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </ol>
                            </div>

                        </div>
                        <?php endif;?>

                    </div>

                </div>

            </div>


        </main>

        <div class="overlay hidden" id="overlay"></div>
        <div class="popup hidden" id="apply_job">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <div class="content">
                <div class="header nbs">
                    <div class="center">
                        <h2 class="popup-title"<??></h2>
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

    </div>

    <script>
        const ROOT = "<?=ROOT?>";
        const job = <?=json_encode($job)?>;
    </script>
    <script src="<?=ROOT?>/assets/js/Technician/popupform.js"></script>
<!--    <script src="--><?//=ROOT?><!--/assets/js/Technician/applyjob.js"></script>-->






</body>

</html>