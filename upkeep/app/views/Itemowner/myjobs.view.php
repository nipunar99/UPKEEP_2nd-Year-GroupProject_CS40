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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
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

            <div>
                <!-- Tab content -->
                <div class="my-jobtable" >
                    <div class="tab-pane active">
                        <div class="list-container">
                            <div class="list">
                                <div class="header nbs">
                                    <div class="left">
                                        <div class="search">
                                            <input type="text" placeholder="Search...">
                                            <button>Search</button>
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
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Job ID</th>
                                        <th>Job Type</th>
                                        <th>Status</th>
                                        <th>Technician</th>
                                        <th class="center-text">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if($myjobs):?>
                                    <?php foreach ($myjobs as $job):?>
                                    <tr>
                                        <td>
                                            <div class="client-info">
                                                <img src="<?=ROOT?>/assets/images/uploads/<?=$job->image?>" alt="Profile Pic">
                                                <span class="client-name"><?=$job->item_name?></span>
                                            </div>
                                        </td>
                                        <td>#<?=$job->job_id?></td>
                                        <td><?=$job->job_type?></td>
                                        <td><?=$job->overall_status?></td>
                                        <td>
                                            <?php if($job->technician_assigned):?>
                                            <div class="client-info">
                                                <img src="<?=ROOT?>/assets/images/profilepic/<?=$job->profile_picture?>" alt="Profile Pic">
                                                <span class="client-name"><?=$job->technician?></span>
                                            </div>
                                            <?php else:?>
                                            <div class="client-info">
                                                <span class="client-name">Not Assigned</span>
                                            </div>
                                            <?php endif;?>
                                        </td>
                                        <td><div class="btn-container"> <a class="btn" href="<?=ROOT?>/Itemowner/TechnicianGigs/vieworder/<?=$job->ji?>">view</a></div></td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="overlay hidden" id="overlay"></div>
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



    <script>
        const ROOT= "<?=ROOT?>";
    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/orders.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/tabs.js"></script>

</body>

</html>