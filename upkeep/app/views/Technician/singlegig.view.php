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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gig.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

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

                    <a href="<?=ROOT?>/Technician/Findjobs" >
                        <span class="material-icons-sharp">work</span>
                        <h3>Find Jobs</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Orders" >
                        <span class="material-icons-sharp">list_alt</span>
                        <h3>Orders</h3>
                    </a>

                    <a href="<?=ROOT?>/Technician/Gigs" class="active">
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
                    <h1>Gig</h1>
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

            <div class="content-a-20">
                <div class="left">
                    <div class="card gigDetails text-left">
                        <div class="gig-cover">
                            <div class="carousel">
                                <div class="slides">
                                    <!--                                            split the images string in ,-->
                                    <?php if (!empty($gigDetails[0]->images)):?>
                                        <?php $images = explode(",",$gigDetails[0]->images);?>
                                        <?php foreach($images as $image):?>
                                            <div class="slide"><img src="<?=ROOT?>/assets/images/gig_images/<?=$image?>" alt="slide image" class=""></div>
                                        <?php endforeach;?>
                                    <?php elseif (empty($gigDetails[0]->images)):?>
                                        <img src="<?=ROOT?>/assets/images/gig_images/noimage.jpg" alt="slide image" class="slide">
                                    <?php endif;?>
                                </div>
                                <div class="controls">
                                    <div class="control prev-slide">&#9668;</div>
                                    <div class="control next-slide">&#9658;</div>
                                </div>
                            </div>
                        </div>
                        <h1 class="text-left"><?=$gigDetails[0]->title?></h1>
                        <div class="work-tags">
                            <h3 class="text-muted">Items</h3>
                            <?php $arr=explode(",",$gigDetails[0]->items);?>
                            <?php foreach($arr as $tag) : ?>
                                <a class="worktags"><?=$tag?></a>
                            <?php endforeach; ?>
                        </div>
                        <div class="inline">
                            <div class="location">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <p><?=$gigDetails[0]->location?></p>
                            </div>
                            <div class="delivery-method">
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <p><?=$gigDetails[0]->delivery_method?></p>
                            </div>
                        </div>
                        <p id="gig-description"><?=$gigDetails[0]->description?></p>
                    </div> 
                  
                    <div class="card rating-part">
                        <div style="clear: both;"></div>
                        <div class=" reviews"><h1 class="left text-left">Reviews</h1></div>

                        <?php if(!empty($gigReviews)):?>
                            <?php foreach($gigReviews as $review):?>
                                <div class="comment-part">
                                    <div class="user-img-part">
                                        <div class="user-img">
                                            <img src="<?=ROOT?>/assets/images/profilepic/<?=$review->profile_picture?>">
                                        </div>
                                        <div class="user-text">
                                            <h4><?=$review->date_created?></h4>
                                            <p><?=$review->user?></p>
                                        </div>
                                        <div style="clear: both;"></div>
                                    </div>
                                    <div class="comment">
                                        <?php for($i=0;$i<5;$i++):?>
                                            <?php if((int)round($review->rating)>$i):?>
                                                <span class="fa fa-star checked"></span>
                                            <?php else:?>
                                                <span class="fa fa-star"></span>
                                            <?php endif;?>
                                        <?php endfor;?>
                                        <?= "(".round($gigDetails->rating,1).")"?>
                                        <p><?=$review->content?></p>
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                            <?php endforeach;?>
                        <?php else:?>
                            <div class="comment-part">
                                <div class="comment">
                                    <p>No Reviews Yet</p>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        <?php endif;?>



                    </div>
                </div>
                <div class="right">
                    <div class="card profile-details">
                        <div class="header nbs">
                            <div class="center">
                                <h2>About Technician</h2>
                            </div>
                        </div>
                            <div class="profile-img">
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                            </div>
                            <div class="profile-text">
                                <h2>Nipuna Rahal</h2>
                                <?php if(empty($gig->rating)):?>
                                    <p>No Reviews Yet</p> 
                                <?php else:?>
                                    <?php echo "Overall Rating: "?>
                                        <?php for($i=0;$i<5;$i++):?>
                                            <?php if((int)round($gig->rating)>$i):?>
                                                <span class="fa fa-star checked"></span>
                                            <?php else:?>
                                                <span class="fa fa-star"></span>
                                            <?php endif;?>
                                        <?php endfor;?>
                                    <?= "(".round($gig->rating,1).")"?>
                                <?php endif;?>
                            </div>
                            <div class="other-details">
                                <div>
                                    <h4>Member Since:</h4>
                                    <p><?=Date("Y",strtotime($profileDetails->date_time))?></p><br>
                                    <h4>Service Method:</h4>
                                    <p><?=$gigDetails[0]->delivery_method?></p><br>
                                </div>
                                <div>
                                    <h4>Experience:</h4>
                                    <p><?=$profileDetails->experience?> Years</p><br>
                                    <h4>Location:</h4>
                                    <p><?=$gigDetails[0]->location?></p><br>
                                </div>
                            </div>
                            <div class="description">
                                <h4>Description:</h4>
                                <p><?=$profileDetails->description?></p>
                            </div>
                            <div class="btn-container">
                                <?php if($userdata->user_role == "technician"): ?>

                                <?php elseif($userdata->user_role == "item_owner"): ?>
                                    <a href="#" class="btn btn-primary">Hire</a>
                                <?php endif; ?>

                            </div>
                    </div>
                    <?php if($userdata->user_role=="technician" && $userdata->user_id == $_SESSION['user_id']):?>
                    <div class="btn-container">
                        <a href="" class="btn btn-primary warning" id="editGig" data-gigdata = '<?=json_encode($gigDetails[0])?>'><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit</a>
                        <a href="" class="btn btn-primary danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                    </div>
                    <?php elseif ($userdata->user_role=="item_owner"):?>
                        <div class="actions">
                            <a href="#" class="btn btn-primary hirebtn">Hire Me</a>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </main>
        

    </div>

    <div id="overlay"  class="overlay hidden"></div>

    <div class="popup hidden" id="edit_gig">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="header nbs">
            <div class="center">
                <h2>Edit Gig</h2>
            </div>
        </div>
        <div class="content">
            <form class="form" action="" id="editgigform" method="POST">
                <div class="gigDetails text-left">
                    <div class="input-inline">
                        <div class="input-field">
                            <label for="item">Items</label>
                            <select multiple class="chosen-select" id="item">
                            </select>
                            <small class="error">&nbsp</small>
                        </div>

                        <div class="input-field">
                            <div class="input-inline">
                                <div class="input-field">
                                    <label for="district" class="left">District:</label>
                                    <select id="district">
                                        <option value="0"></option>
                                    </select>
                                    <small class="error">&nbsp</small>
                                </div>
                                <div class="input-field">
                                    <label for="city">City:</label>
                                    <select id="city">
                                        <option value="0">Select City</option>
                                    </select>
                                    <small class="error">&nbsp</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="input-field">
                        <label class="left" for="delivery_methods">Select How You deliver Service:</label>
                        <select class="" id="delivery_method" name="delivery_method">
                            <option value="Home Visit">Home Visit</option>
                            <option value="Workshop">Workshop</option>
                        </select>
                        <small class="error">&nbsp</small>

                    </div>

                    <div class="input-field">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" required placeholder="I Will do... (etc) " value="<?=$gigDetails[0]->title?>">
                        <small>Error Message</small>
                    </div>

                    <div class="input-field">
                        <label for="description">Description</label>
                        <textarea type="text" name="description" id="description" required placeholder="Enter Description about work that can be done"><?=$gigDetails[0]->description?></textarea>
                        <small>Error Message</small>
                    </div>
                    <div class="input-field text-left">
                        <!--                                input field for adding multiple images with preview-->
                        <label for="images">Add Images</label>
                        <input type="file" name="images" id="images_input" multiple>
                        <div class="preview" id="preview"></div>
                        <small>&nbsp;error</small>
                    </div>


                </div>
                <div class="btn-container">
                    <a class="btn" id="update-btn">Update</a>
                    <a class="btn cancel" id="formClose">Cancel</a>
                </div>
            </form>
            <div class="content hidden" id="msg">

            </div>
        </div>

    <script>
        var ROOT = "<?=ROOT?>";
        var templates = <?=$templates?>
    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/carousel.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/gig.js"></script>


<!--        <div class="overlayview "></div>-->
<!---->
<!--        <div class="popupview popupview1 ">-->
<!--            <button class="closebtn">&times;</button>-->
<!---->
<!--            <div class="content content1">-->
<!---->
<!--                <form method="post" id="form_JobDetails">-->
<!--                    <h2>Job Details</h2>-->
<!--                    <div class="itemDetails">-->
<!---->
<!--                        <div class="middleInput">-->
<!---->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Item Name</span>-->
<!--                                <select  name="item_name" id="itemname" required></select>-->
<!--                                <small></small>-->
<!--                            </div>-->
<!---->
<!--                            <div class="input-box hidden">-->
<!--                                <span class="details">Item Id</span>-->
<!--                                <input type="text" name="item_id" id="itemid" required>-->
<!--                                <small></small>-->
<!--                            </div>-->
<!---->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Title</span>-->
<!--                                <input type="text" name="title" id="title" required placeholder="Enter Title">-->
<!--                                <small></small>-->
<!--                            </div>-->
<!---->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Description</span>-->
<!--                                <input type="text" name="description" id="description" required placeholder="Enter Description">-->
<!--                                <small></small>-->
<!--                            </div>-->
<!---->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Job Type</span>-->
<!--                                <select name="job_type" id="jobtype" >-->
<!--                                    <option value="Repair">Repair</option>-->
<!--                                    <option value="Maintenance">Maintenance</option>-->
<!--                                    <option value="Other">Other</option>-->
<!--                                </select>-->
<!--                                <small></small>-->
<!--                            </div>-->
<!---->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Delivary Method</span>-->
<!--                                <select name="delivery_method" id="delivarymethod" ></select>-->
<!--                                <small></small>-->
<!--                            </div>-->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Date</span>-->
<!--                                <input type="date" name="date" id="schedule_date"  placeholder="Enter Schedule Date">-->
<!--                                <small></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="middlethree">-->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Address</span>-->
<!--                                <input type="text" name="address" id="address" required placeholder="Enter Location">-->
<!--                                <input class="" style="display: none;" type="number" name="address_id" id="addressid" >-->
<!--                                <small></small>-->
<!--                            </div>-->
<!--                            <div class="input-box">-->
<!--                                <span class="details">District</span>-->
<!--                                <select  name="district" id="district"required ></select>-->
<!--                                <small></small>-->
<!--                            </div>-->
<!--                            <div class="input-box">-->
<!--                                <span class="details">City</span>-->
<!--                                <select  name="city" id="city" required ></select>-->
<!--                                <small></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div class="middleInput">-->
<!--                            <div class="input-box">-->
<!--                                <span class="details">Contact No</span>-->
<!--                                <input type="number" name="contact_no" id="contact_no"  placeholder="Enter Contact No">-->
<!--                                <small></small>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                        <div  class="button">-->
<!--                            <input onclick="submitPost(event)" type="submit"  value="Post Job" id="nextBtn">-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </form>-->
<!---->
<!--            </div>-->
<!--        </div>-->


<!--        <script src="--><?//= ROOT ?><!--/assets/js/Itemowner/viewgig.js"></script>-->
<!--        <script src="--><?//= ROOT ?><!--/assets/js/Itemowner/validation.js"></script>-->
<!--        <script src="--><?//= ROOT ?><!--/assets/js/Itemowner/public.js"></script>-->


</body>
</html>





