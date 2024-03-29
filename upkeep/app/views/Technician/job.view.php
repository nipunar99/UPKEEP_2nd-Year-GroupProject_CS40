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
                    <h1>Job</h1>
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
                            <p class="text-muted">Job #<?=$job_details->job_id ?></p>
                        </div>
                        <div class="order-title">
                            <h1 class="left-text"><?= $job_details->title ?></h1>
                        </div>
                        <small>posted on <?=$job_details->created_at?></small>
                    </div>
                    <div class="btn-container" id="head-buttons"
                         data-jobid="<?=$job_details->job_id?>"
                         data-orderid="<?=$job_details->order_id?>"
                         data-title="<?=$job_details->title?>"
                         data-client="<?=$job_details->client?>"
                         data-date="<?=$job_details->date?>"
                         data-time="<?=$job_details->time?>"
                         data-address="<?=$job_details->city.', '.$job_details->district?>"
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
                                            <p class="text"><?= $job_details->description ?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Location</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text"><?=$job_details->city?>, <?=$job_details->district?></p>
                                        </div>
                                    </div>
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Job Type</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text">
                                                <a><?=$job_details->job_type?></a>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-col">
                                        <div class="title">
                                            <h3 class="title">Delivery method</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text">
                                                <a><?=$job_details->job_type?></a>
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
                                                <?=$job_details->date?>
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
                                            <h3 class="title">A/C</h3>
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
                                        <img src="<?= ROOT ?>/assets/images/uploads/<?=$item_details->image?>" alt="">
                                    </div>
                                    <div class="card-col">
                                        <div class="card-row">
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Item Name</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=$item_details->item_name?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Item Category</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=$item_details->item_type?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Brand</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=$item_details->brand?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-row">
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Purchased Date</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=($item_details->purchase_date) ? $item_details->purchase_date : "N/A"?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Warranty Date</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=($item_details->warrenty_date) ? $item_details->warrenty_date : "N/A"?></p>
                                                </div>
                                            </div>
                                            <div class="card-col">
                                                <div class="title">
                                                    <h3 class="title">Warranty Status</h3>
                                                </div>
                                                <div class="text">
                                                    <p class="text"><?=($item_details->warrenty_date<date("y m d")) ? "Expired" : "Active"?></p>
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
                        <div class="card">
                            <div class="card-header">
                                <h2>Client Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="profile-image">
                                    <img src="<?= ROOT."/assets/images/profile-1.jpg"?>" alt="profile">
                                </div>
                                <h2 class="center-text"><?=$job_details->client?></h2>
                                <small class="text-muted center-text">last online <?=$job_details->last_login?></small>
                                <div class="card-row">
                                    <div class="card-col">
                                        <div class="card-col-title">
                                            <h3 class="title">Email</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text"><?=$job_details->email?></p>
                                        </div>
                                    </div>
                                    <div class="card-col ">
                                        <div class="card-col-title">
                                            <h3 class="title">Contact</h3>
                                        </div>
                                        <div class="card-col-body">
                                            <p class="text">
                                                <?=($job_details->contact_no)? $job_details->contact_no : $job_details->mobile_no?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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

    <div class="popup hidden" id="remove_application" data-jobid="<?=$job_details->job_id?>">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
            <input type="text" id="job_id" name="job_id" class="hidden">
        </div>
        <div class="content hidden" id="msg">

        </div>
    </div>

    <div class="popup hidden" id="complete_order">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
            <h1 class="popup-title">Complete Order</h1>
            <form method="post">
                <div class="input-inline">
                    <div class="input-field text-left">
                        <label for="job_id text-left">Order ID</label>
                        <input type="text" class="" id="order_id" name="order_id" value="" disabled>
                        <small>error</small>
                    </div>
                    <div class="input-field text-left">
                        <label for="completed_date">Completed Date</label>
                        <input type="date" id="completed_date" name="completed_date" disabled>
                        <small>error</small>
                    </div>
                </div>
                <div class="input-field text-left">
                    <label for="service_charge">Service Charge (Rs.)</label>
                    <input type="number" id="service_charge" name="service_charge">
                    <small>error</small>
                </div>
                <div class="input-field text-left">
                    <label for="additional_notes">Additional Notes</label>
                    <textarea id="additional_notes" name="additional_notes"></textarea>
                    <small>error</small>
                </div>

                <div class="btn-container">
                    <div class="btn-container">
                        <a class="btn cancel" id="cancel-btn">Cancel</a>
                        <a class="btn complete_popup" id="complete-popup">Complete</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="content hidden" id="msg">

        </div>
    </div>

    <div class="popup hidden" id="accept_job">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
            <h2 class="popup-title">Accept Job</h2>
            <form method="post">
                <!--                div to show essensial job details before action-->
                <h3>These are the details of the job you are going to accept!</h3>
                <div class="detail-container">
                    <div class="details" id="title">
                        <div class="title">Job</div>
                        <div class="description"></div>
                    </div>
                    <div class="details" id="client">
                        <div class="title">Client Name</div>
                        <div class="description"></div>
                    </div>
                    <div class="details" id="date">
                        <div class="title">Date</div>
                        <div class="description"></div>
                    </div>
                    <div class="details" id="time">
                        <div class="title">Time</div>
                        <div class="description"></div>
                    </div>
                    <div class="details" id="address">
                        <div class="title">Location</div>
                        <div class="description"></div>
                    </div>
                    <div class="input-field hidden">
                        <input type="text" class="" id="job_id" name="job_id" value="">
                        <small>error</small>
                    </div>
                </div>

                <div class="btn-container">
                    <a class="btn cancel" id="cancel-btn">Cancel</a>
                    <a class="btn accept_popup" id="accept-popup">Accept</a>
                </div>
            </form>
        </div>
        <div class="content hidden" id="msg">

        </div>
    </div>



    <script>
        const ROOT = "<?=ROOT?>";
        const user_role = "<?=$user_role?>";
        const user_id = "<?=$user_id?>";
        var job_details = JSON.stringify(<?=json_encode($job_details)?>);

    </script>
    <script src="<?=ROOT?>/assets/js/Technician/popupform.js"></script>
    <script src="<?=ROOT?>/assets/js/Technician/job.js"></script>
    <script src="<?=ROOT?>/assets/js/Technician/applyjob.js"></script>
    <script src="<?=ROOT?>/assets/js/Technician/orders.js"></script>




</body>

</html>