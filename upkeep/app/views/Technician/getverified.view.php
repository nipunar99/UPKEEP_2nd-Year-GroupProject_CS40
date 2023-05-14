<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Verified!</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/verifypage.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="header">
            <div class="left">
                <div class="header-logo">
                    <a href="<?= ROOT ?>/technician/dashboard">
                        <img src="<?= ROOT ?>/assets/images/headerlogo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="middle"></div>
            <div class="right">
                <div class="notification">
                    <span class="material-icons-sharp">notifications</span>
                </div>

                <div class="profile">
                    <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                    <div class="info">
<<<<<<< HEAD
                        <div class="name"><p><?= $_SESSION['USER']->first_name." ".$_SESSION['USER']->last_name ?></b></p></div>
                        <small class="text-muted role"><?=ucfirst($_SESSION['user_role'])?></small>
=======
                        <div class="name">
                            <p><?= $_SESSION['USER']->first_name . " " . $_SESSION['USER']->last_name ?></b></p>
                        </div>
                        <small class="text-muted role"><?= ucfirst($_SESSION['user_role']) ?></small>
>>>>>>> Develope
                    </div>
                    <div class="profile-photo">
                        <div><img src="<?= ROOT ?>/assets/images/user.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>

        <main>
            <!-- top was here -->
            <div class="left">
                <div class="congrats">
                    <img src="<?= ROOT ?>/assets/images/congrats.png" alt="">
                    <h1>Congratulations!</h1>
                    <h2>You are almost there!</h2>
                    <p>We need to Recognize you as a Technician and your personality to provide you with the best experience.</p>
                </div>
            </div>
            <div class="right">
                <h1>Few more steps to go!</h1>
                <p>Verify your identity and personality to get started.</p>
                <div class="verification-methods" id="verification-methods">
                    <div class="method-card " id="contact-verification">
                        <div class="method-step">
                            <h3>Step 1</h3>
                        </div>
                        <div class="icon">
                            <span class="material-symbols-outlined">phone_iphone</span>
                        </div>
                        <h1>Contact Verification</h1>
                        <div class="action">
                            <button id="contact-verify">Verify Now!</button>
                            <p class="status">Verified</p>
                        </div>
                    </div>
                    <div class="method-card " id="identity-verification">
                        <div class="method-step">
                            <h3>Step 2</h3>
                        </div>
                        <div class="icon">
                            <span class="material-symbols-outlined">how_to_reg</span>
                        </div>
                        <h1>Identity Verification</h1>
                        <div class="action">
                            <button id="identity-verify">Submit Data</button>
                            <p class="status">Pending</p>
                        </div>
                    </div>
                    <div class="method-card" id="profile-setup">
                        <div class="method-step">
                            <h3>Step 3</h3>
                        </div>
                        <div class="icon">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <h1>Setup profile</h1>
                        <div class="action">
                            <button id="setup-profile">Edit Profile</button>
                            <p class="status">Verified</p>
                        </div>
                    </div>
                </div>
                <div class="buttonContainer">
<<<<<<< HEAD
                    <a href="#" id="skip"><h3 class="text-muted">Skip for Now!</h3><span class="material-icons-sharp text-muted">arrow_forward_ios</span></a>
=======
                    <a href="#" id="skip">
                        <h3 class="text-muted">Skip for Now!</h3><span class="material-icons-sharp text-muted">arrow_forward_ios</span>
                    </a>
>>>>>>> Develope
                </div>

            </div>

        </main>


    </div>

    <div class="overlay hidden" id="overlay"></div>
    <div class="popup hidden" id="contact-verification">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
            <div class="middle">
                <div class="image-container">
                    <img src="<?= ROOT ?>/assets/images/technicianUI/enter_mobile.jpg" alt="" class="close">
                </div>
                <h1>Contact Verification</h1><br>
<<<<<<< HEAD
                <form class="mobile-verify" id="mobile-details" method="post" enctype="" >
                    <div class = "mobile-number-input" id="step1">
=======
                <form class="mobile-verify" id="mobile-details" method="post" enctype="">
                    <div class="mobile-number-input" id="step1">
>>>>>>> Develope
                        <p>Please enter your mobile number. We'll send an OTP (one-time password) to this number via SMS for verification</p><br>

                        <div class="input-field">
                            <label>Enter Your Mobile Number</label>
                            <div class="mnumber-box">
                                <input class="country" type="text" id="country_code" name="country_code" value="+94" maxlength="4" size="8" readonly>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" placeholder="712345678" pattern="[1-9]{1}[0-9]{8}" maxlength="9" size="9">
                            </div>
                            <small class="error">&nbsperror</small>
                        </div>
                        <div class="warning">
                            <p class="warning" id="note">NOTE: The mobile number you enter here will be used as your default mobile number for future work.
                            </p><br>
                        </div>
                        <br>
                        <div class="btn-container">
                            <button id="OTP-send" disabled="true">SEND OTP</button>
                        </div>
                    </div>

                    <div class="otp-input hidden" id="step2">
                        <p>We have sent a One-Time Password (OTP) to your mobile device.
                            Please enter the OTP in the field below to verify your identity and complete the process</p><br>

                        <div class="input-field">
                            <label>Enter the OTP</label>
                            <div class="mnumber-box otp">
                                <input type="text" class="otp-num" id="num1" value="" maxlength="1" size="1" pattern="[0-9]{1}">
                                <input type="text" class="otp-num" id="num2" value="" maxlength="1" size="1" pattern="[0-9]{1}">
                                <input type="text" class="otp-num" id="num3" value="" maxlength="1" size="1" pattern="[0-9]{1}">
                                <input type="text" class="otp-num" id="num4" value="" maxlength="1" size="1" pattern="[0-9]{1}">
                                <input type="text" class="otp-num" id="num5" value="" maxlength="1" size="1" pattern="[0-9]{1}">
                                <input type="text" class="otp-num" id="num6" value="" maxlength="1" size="1" pattern="[0-9]{1}">
                            </div>
                            <small class>&nbsp</small>
                        </div>

                        <div class="warning">
                            <p class="" id="note">Didn't Recieve the OTP? <a href="#">Resend OTP</a>
                            </p><br>
                        </div>
                        <br>
                        <div class="btn-container">
                            <button class="disabled" id="OTP-verify">VERIFY</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="content hidden" id="success">
            <div class="middle">
                <div class="icon-container">
                    <span class="material-icons-sharp" id="success-icon">check_circle</span>
                </div>
                <h1 id="success-title">Thank You!</h1>
                <p id="success-message">Your contact information has been verified successfully.</p><br>
                <div class="btn-container">
                    <button id="finish">Continue!</button>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======
    <div class="popup hidden" id="identity-verification">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="middle">
            <h1>Identity Verification</h1>
        </div>
        <div class="content">
            <form id="identity-verification-form">
                <div class="step" id="step1">
                    <h2>Step 1: Photo of NIC Front</h2>
                    <p class="instruction">
                        Please upload a photo of your NIC front. The photo should be clear and readable.
                    </p>
                    <div class="input-field">
                        <div class="center">
                            <div  class="drop-area" id="drop-area">
                                <div class="preview">
                                    <img id="file-ip-1-preview" class="preview-img" src="<?=ROOT?>/assets/images/technicianUI/id_front.png">
                                </div>
                                <p id="fileName">&nbsp;</p>
                                <div class="upload-img-button">
                                    <label for="id-front">Upload Image</label>
                                    <input class="img-input" type="file" id="id-front" name="id_front" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <small class="error">&nbsp</small>
                    </div>
                    <div class="btn-container">
                        <button class="next">Next</button>
                    </div>
                </div>

                <div class="step hideright" id="step2">
                    <h2>Step 2: Photo of NIC Back</h2>
                    <p class="instruction">
                        Please upload a photo of your NIC back. The photo should be clear and readable.
                    </p>
                    <div class="input-field">
                        <div class="center">
                            <div class="drop-area" id="drop-area">
                                <div class="preview">
                                    <img id="file-ip-1-preview" class="preview-img" src="<?=ROOT?>/assets/images/technicianUI/id_back.png">
                                </div>
                                <p id="fileName">&nbsp;</p>
                                <div class="upload-img-button">
                                    <label for="id-back">Upload Image</label>
                                    <input class="img-input" type="file" id="id-back" name="id_back" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <small class="error">&nbsp</small>
                    </div>
                    <div class="btn-container">
                        <button class="prev">Previous</button>
                        <button class="next">Next</button>
                    </div>
                </div>

                <div class="step hideright" id="step3">
                    <h2>Step 3: Photo of Self with ID in hand</h2>
                    <p class="instruction">
                        Please upload a photo of yourself holding your NIC in hand. The photo should be clear and readable.
                    </p>
                    <div class="center">
                        <div class="drop-area" id="drop-area">
                            <div class="preview">
                                <img id="file-ip-1-preview" class="preview-img" src="<?=ROOT?>/assets/images/technicianUI/id_hand.png">
                            </div>
                            <p id="fileName">&nbsp;</p>
                            <div class="upload-img-button">
                                <label for="id-hand">Upload Image</label>
                                <input class="img-input" type="file" id="id-hand" name="id_hand" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <small class="error">&nbsp</small>
                    <div class="btn-container">
                        <button class="prev">Previous</button>
                        <button class="submitBtn" id="send-verification">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
>>>>>>> Develope



    <script>
<<<<<<< HEAD
        console.log('hello');
=======
>>>>>>> Develope
        const ROOT = '<?= ROOT ?>';
        const technician_data = JSON.parse(<?= json_encode($technician) ?>);
        console.log(<?= $technician ?>)
    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/multi.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/getVerified.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/otp.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/verificationrequest.js"></script>


</body>

</html>