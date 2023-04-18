<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Verified!</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css"> -->
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gig.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/multi.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/verifypage.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="top">
            <div class="header-logo">
                <a href="<?=ROOT?>/technician/dashboard">
                    <img src="<?=ROOT?>/assets/images/headerlogo.png" alt="">
                    <!-- <img src="<?=ROOT?>/assets/images/title.png" alt=""> -->
                </a> 
            </div>
            <h1>GIGS</h1>
            <div class="right">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>

                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey,<b><?=$_SESSION['user_name']?></b></p>
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <main>
            <!-- top was here -->
            <div class="left">
                <div class="congrats">
                    <img src="<?=ROOT?>/assets/images/congrats.png" alt="">
                    <h1>Congratulations!</h1>
                    <h2>You are almost there!</h2>
                    <p>We need to Recognize you as a Technician and your personality to provide you with the best experience.</p>
                </div>
            </div>
            <div class="right">
                <h1>Few more steps to go!</h1>
                <p>Verify your identity and personality to get started.</p>
                <div class="verification-methods">
                    <div class="method-card">
                        <div class="icon">
                            <span class="material-icons-sharp">phone_iphone</span>
                        </div>
                        <h1>Contact Verification</h1>
                    </div>
                    <div class="method-card">
                        <div class="icon">
                            <span class="material-icons-sharp">how_to_reg</span>
                        </div>
                        <h1>identity Verification</h1>
                    </div>
                    <div class="method-card">
                        <div class="icon">
                            <span class="material-icons-sharp">person</span>
                        </div>
                        <h1>Setup profile</h1>
                    </div>
                </div>
                <div class="buttonContainer">
                    <a class="btn viewcommunity" href="<?=ROOT?>/technician/dashboard">View Community</a>
                    <a class="btn logout" href="<?=ROOT?>/Signout">Logout</a>
                </div>

            </div>
                
        </main>
        

    </div>

    <div id="addgig" class="overlay hidden"></div>

    <div class="popup hidden" id="otp_form">
        <div class="middle">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <h1>Create Your Gig!</h1>
        </div>
        <div class="form-container">
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
                <form id="otp_form">
                <div class="step" id="step1">
                    <h2>Basic details about Your service</h2>
                    <label for="item">Select Items:</label>
                        <select id="item" name="item">
                            <option value="A/C">A/C</option>
                            <option value="Refrigerator">Refrigerator</option>
                            <option value="Washing Machine">Washing Machine</option>
                            <option value="Gas Cooker">Gas Cooker</option>
                        </select>
                        
                    <label for="location">Select Location:</label>
                    <input type="text" name="location" id="location" required placeholder="Enter Locations that you can provide service">

                    <label for="service_method">Select Service method:</label>
                        <select id="service_method" name="service_method">
                            <option value="Visits">Visits</option>
                            <option value="Workshop">Workshop</option>
                        </select>
                    
                    <label for="work_tags">Worktags::</label>
                    <input type="text" name="work_tags" id="work_tags" required placeholder="Tags to specify work. Ex - A/C Repair, A/C Gas Filling">

                    <div class="btn-container">
                        <button class="next">Next</button>
                    </div>
                    </div>          
                </form>

        </div> 
    </div>   

    <!-- <div class="popup hidden" id="verification_request_form">
        <div class="middle">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
            <h1>Create Your Gig!</h1>
        </div>
        <div class="form-container">
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
            <form id="verifyrequestform">
                <div class="step" id="step1">
                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <h3>Your Selected image will be shown here!</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="prev">Previous</button>
                        <button class="submitBtn" id="submitBtn">Submit</button>
                    </div>
                </div>

                <div class="step hideright" id="step2">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <h3>Your Selected image will be shown here!</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="prev">Previous</button>
                        <button class="submitBtn" id="submitBtn">Submit</button>
                    </div>
                </div>

                <div class="step hideright" id="step3">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                        <div class="drag-text">
                            <h3>Your Selected image will be shown here!</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                    <div class="btn-container">
                        <button class="prev">Previous</button>
                        <button class="submitBtn" id="submitBtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>          
    </div>     -->

    


    <script src="<?= ROOT ?>/assets/js/Technician/getVerified.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/multi.js"></script>

</body>
</html>





