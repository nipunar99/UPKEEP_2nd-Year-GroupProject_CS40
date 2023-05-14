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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/multi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <a href="<?=ROOT?>/Technician/Dashboard" >
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
                    <h1>My Gigs</h1>
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
                <a class="show-modal addGig btn " href="">Add GIG</a>
            </div>
            
            <div class="gigs">
                <?php if(!empty($gigList)) : ?>
                <div class="insight">
                <?php foreach($gigList as $gig) : ?>
                        <div class="gig-card">
                            <div class="middle">  
                                <div class='gig-cover'>
                                    <div class="carousel">
                                        <div class="slides">
<!--                                            split the images string in ,-->
                                            <?php if (!empty($gig->images)):?>
                                            <?php $images = explode(",",$gig->images);?>
                                            <?php foreach($images as $image):?>
                                                <img src="<?=ROOT?>/assets/images/gig_images/<?=$image?>" alt="slide image" class="slide">
                                            <?php endforeach;?>
                                            <?php elseif (empty($gig->images)):?>
                                                <img src="<?=ROOT?>/assets/images/gig_images/noimage.jpg" alt="slide image" class="slide">
                                            <?php endif;?>
                                        </div>
                                        <div class="controls">
                                            <div class="control prev-slide">&#9668;</div>
                                            <div class="control next-slide">&#9658;</div>
                                        </div>
                                    </div>
                                </div>
                                <h1><?=$gig->title?></h1>
                                <?php if(empty($gig->rating)):?>
                                    <p>No Reviews Yet</p> 
                                <?php else:?>
                                    <?php echo "Rating: "?>
                                        <?php for($i=0;$i<5;$i++):?>
                                            <?php if((int)round($gig->rating)>$i):?>
                                                <span class="fa fa-star checked"></span>
                                            <?php else:?>
                                                <span class="fa fa-star"></span>
                                            <?php endif;?>
                                        <?php endfor;?>
                                    <?= "(".round($gig->rating,1).")"?>
                                <?php endif;?>    
                                <div class="description">
                                    <p>
                                        <?=$gig->description?>
                                    </p>
                                    <div class="dots">...</div>
                                </div>
                                <?php $arr=explode(",",$gig->items);?>

                                <div class="worktagsContainer">
                                    <?php foreach($arr as $tag) : ?>
                                    <a class="worktags"><?=$tag?></a>
                                    <?php endforeach; ?>
                                </div>
                                
                            </div>
                            <a class="moreDetailsBtn" href="<?=ROOT?>/Technician/Gigs/viewGig/<?=$gig->gig_id?>"><div style="text-align: center; margin-top:8px;"><small class="text-muted">View More</small></div></a>
                        </div>
                    
                <?php endforeach;?>
                </div>
                <?php endif; ?>
            </div>
        <!-- </main>  -->

        <!-- End of Main -->

        <!-- <div class="right"> -->
            
            <!-- End of top -->

        <!-- </div> -->
        </main>
    </div>

    <div id="overlay" class="overlay hidden"></div>
    <div class="popup hidden" id="add-gig">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
            <div class="header nbs">
                <div class="center">
                    <h1>Create Your Gig!</h1>
                </div>
            </div>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress"></div>
                    <div class="progress-step active current" data-step-title="Item"><span class="material-icons-sharp">engineering</span></div>
                    <div class="progress-step" data-step-title="Description"><span class="material-icons-sharp">description</span></div>
                    <div class="progress-step" data-step-title="Photos"><span class="material-icons-sharp">image</span></div>
                </div>
                <div class="step-label">
                </div>
            </div>
            <div class="content">

                <div class="form-container">

                    <form id="addgigform">
                        <div class="step" id="step1">
                            <h2>Basic details about Your service</h2>

                            <div class="input-field">
                                <label class="left" for="title">Select Items:</label>
                                <select multiple class="chosen-select" id="item">
                                </select>
                                <small class="error">&nbsp</small>
                            </div>

                            <div class="input-field">
                                <label class="left" for="">Select Location:</label>
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

                            <div class="input-field">
                                <label class="left" for="delivery_methods">Select How You deliver Service:</label>
                                <select class="" id="delivery_method" name="delivery_method">
                                    <option value="Home Visit">Home Visit</option>
                                    <option value="Workshop">Workshop</option>
                                </select>
                                <small class="error">&nbsp</small>

                            </div>

                            <div class="btn-container">
                                <button class="next">Next</button>
                            </div>
                        </div>

                        <div class="step hideright" id="step2">
                            <div class="input-field">
                                <label class="left"  for="title">Title</label>
                                <input type="text" name="title" id="title" placeholder="Enter title" />
                                <small class="error">&nbsp</small>
                            </div>

                            <div class="input-field">
                                <label class="left" for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="Enter description"></textarea>
                                <small class="error">&nbsp</small>
                            </div>

                            <div class="btn-container">
                                <button class="prev">Previous</button>
                                <button class="next">Next</button>
                            </div>
                        </div>

                        <div class="step hideright" id="step2">
                            <div class="input-field text-left">
                                <!--                                input field for adding multiple images with preview-->
                                <label for="images">Images</label>
                                <input type="file" name="images" id="images_input" multiple>
                                <div class="preview" id="preview"></div>
                                <small>&nbsp;error</small>
                            </div>



                            <div class="btn-container">
                                <button class="prev">Previous</button>
                                <button class="submitBtn" id="submitBtn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content hidden" id="msg">

        </div>
    </div>




    <script>
        const ROOT = "<?= ROOT ?>";
        const gigList = <?= json_encode($gigList) ?>;
        var templates = '<?= $templates ?>';
        console.log(gigList);
    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/gigs.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/multi.js"></script>
<!--    <script src="--><?//= ROOT ?><!--/assets/js/Technician/image.js"></script>-->
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>







<!-- <div class="form-container">
                <form class="form" enctype="multipart/form-data" id="addgigform" method="POST">
                    <div class="step" id="step1">
                        <div class="gigDetails">
                            <div class="inline">
                                <div class="input-box inline">
                                    <span class="details">Choose Item</span>
                                    <input type="text" name="item" id="item" required placeholder="">
                                    <select id="item" name="item">
                                        <option value="A/C">A/C</option>
                                        <option value="Refrigerator">Refrigerator</option>
                                        <option value="Washing Machine">Washing Machine</option>
                                        <option value="Gas Cooker">Gas Cooker</option>
                                    </select>
                                </div>
                                
                                <div class="input-box inline">
                                    <span class="details">Location</span>
                                    <input type="text" name="location" id="location" required placeholder="Enter Description about item">
                                </div>
                            </div>

                            <div class="input-box">
                                <span class="details">Title</span>
                                <input type="text" name="title" id="title" required placeholder="I Will do... (etc) ">
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Description</span>
                                <textarea type="text" name="description" id="description" required placeholder="Enter Description about work that can be done"></textarea>
                            </div>
            
                            <div class="input-box">
                                <span class="details">Work Tags</span>
                                <input type="text" name="work_tags" id="work_tags" required placeholder="Tags to specify work. Ex - A/C Repair, A/C Gas Filling">
                            </div>

                            <div class="input-box">
                                <span class="details">Add Photo</span>
                                <input type="file" name="image" id="image" placeholder="add images related to your work">
                                <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="add images related to your work">
                            </div>
                        </div>
                        <div class="button">
                            <input class= "addGigBtn" id= "submitBtn" type="submit" value="Submit">
                        </div>
                    </div>
                    
                </form>
            </div>

 -->
