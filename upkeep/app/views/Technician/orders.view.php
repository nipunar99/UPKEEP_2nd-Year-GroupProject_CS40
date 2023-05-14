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

            <div>
                <!-- Tab items -->
                <div class="tabs">
                    <div class="tab-item active">
                        <i class="tab-icon fas fa-briefcase"></i>
                        New Orders
                    </div>
                    <div class="tab-item">
                        <i class="tab-icon fas fa-clock"></i>
                        Orders in Queue
                    </div>
                    <div class="tab-item">
                        <i class="tab-icon fas fa-check-circle"></i>
                        Completed
                    </div>
                    <div class="line"></div>
                </div>

                <!-- Tab content -->
                <div class="tab-content" >
                    <div class="tab-pane active" id="">
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
                                <ol class="list-view-filter">
                                    <?php if($new_orders):?>
                                    <?php foreach($new_orders as $new_order):?>
                                    <li
                                        data-jobid="<?=$new_order->job_id?>"
                                        data-title="<?=$new_order->title?>"
                                        data-client="<?=$new_order->client?>"
                                        data-date="<?=$new_order->date?>"
                                        data-time="<?=$new_order->time?>"
                                        data-address="<?=$new_order->address.', '.$new_order->city.', '.$new_order->district?>"
                                    >
                                        <div class="order">
                                            <div class="description">

                                                <div class="row">
                                                    <div class="tp-event-calendar">
                                                        <div class="tp-event-month"><?=Date('F',strtotime($new_order->date))?></div>
                                                        <div class="tp-event-day"><?= Date('d',strtotime($new_order->date)) ?></div>
                                                    </div>
                                                    <div class="details">
                                                        <div class="user-profile">
                                                            <div class="profile-image">
                                                                <img src="<?= ROOT ?>/assets/images/user.png" alt="">
                                                            </div>
                                                            <div class="user-info">
                                                                <h3><?=$new_order->client?></h3>
                                                                <p><?php dateQuote($new_order->created_at)?></p>
                                                            </div>
                                                        </div>
<!--                                                        <div class="row">-->
                                                        <h1><?=$new_order->title?>
                                                        <span class="worktags">
                                                            <a><?=$new_order->delivery_method?></a>
                                                            <a><?=$new_order->job_type?></a>
                                                        </span>
                                                        </h1>
<!--                                                        </div>-->
                                                        <p><?=$new_order->description?></p>

                                                        <h4><span class="material-icons-sharp">place</span><?=$new_order->city.", ".$new_order->district?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-container">
                                                <a class="btn accept_main" id="" data-orderid="<?=$new_order->job_id?>">Accept</a>
                                                <a class="btn apply" href="<?=ROOT."/Technician/Orders/vieworder/".$new_order->job_id?>">View</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
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
                                <ol class="list-view-filter">
                                    <?php if($order_queue):?>
                                    <?php foreach($order_queue as $order):?>
                                            <li
                                                data-jobid="<?=$order->job_id?>"
                                                data-orderid="<?=$order->order_id?>"
                                            >
                                            <div class="order">

                                                <div class="description">

                                                    <div class="row">
                                                        <div class="tp-event-calendar queue">
                                                            <div class="tp-event-month"><?=Date('F',strtotime($order->date))?></div>
                                                            <div class="tp-event-day"><?= Date('d',strtotime($order->date)) ?></div>
<!--                                                            <div class="tp-event-month"><span class="material-icons-sharp">schedule</span>=Date('h : i A',strtotime($order->time))</div>-->
                                                        </div>
                                                        <div class="details">
                                                            <div class="user-profile">
                                                                <div class="profile-image">
                                                                    <img src="<?= ROOT ?>/assets/images/user.png" alt="">
                                                                </div>
                                                                <div class="user-info">
                                                                    <h3><?=$order->client?></h3>
                                                                    <p><?php dateQuote($order->created_at)?></p>
                                                                </div>
                                                            </div>
                                                            <!--                                                        <div class="row">-->
                                                            <h1><?=$order->title?>
                                                                <span class="worktags">
                                                            <a><?=$order->delivery_method?></a>
                                                            <a><?=$order->job_type?></a>
                                                        </span>
                                                            </h1>
                                                            <!--                                                        </div>-->
                                                            <p><?=$order->description?></p>

                                                            <h4><span class="material-icons-sharp">place</span><?=$order->city.", ".$order->district?></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn-container">
                                                    <a class="btn complete_main" data-orderid="<?=$order->order_id?>">Complete</a>
                                                    <a class="btn view" href="<?=ROOT."/Technician/Orders/vieworder/".$order->job_id?>">View</a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach;?>
                                    <?php endif;?>
                                </ol>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane">
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
                                        <th>Client</th>
                                        <th>Job ID</th>
                                        <th>Job Type</th>
                                        <th>Completion Date</th>
                                        <th>Earning</th>
                                        <th class="center-text">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if($completed_orders):?>
                                    <?php foreach ($completed_orders as $orderc):?>
                                    <tr>
                                        <td>
                                            <div class="client-info">
                                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Profile Pic">
                                                <span class="client-name"><?=$orderc->client?></span>
                                            </div>
                                        </td>
                                        <td>#<?=$orderc->job_id?></td>
                                        <td><?=$orderc->job_type?></td>
                                        <td><?=Date('d M o');?></td>
                                        <td><?=$orderc->service_charge?></td>
                                        <td><div class="btn-container"> <a class="btn" href="<?=ROOT?>/Technician/Orders/viewOrder/<?=$orderc->job_id?>">view</a></div></td>
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