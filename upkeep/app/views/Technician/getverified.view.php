<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Verified!</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
<<<<<<< Updated upstream
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
=======
>>>>>>> Stashed changes
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Technician/verifypage.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">

</head>
<<<<<<< Updated upstream
=======

<body>
    <div class="container">
        <div class="top">
            <div class="header-logo">
                <a href="<?= ROOT ?>/technician/dashboard">
                    <img src="<?= ROOT ?>/assets/images/headerlogo.png" alt="">
                    <!-- <img src="<?= ROOT ?>/assets/images/title.png" alt=""> -->
                </a>
            </div>
            <div></div>
            <div class="right">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
>>>>>>> Stashed changes

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
            <div class="right">
                <div class="notification">
                    <span class="material-icons-sharp">notifications</span>
                </div>

                <div class="profile">
                    <div class="drop"><span class="material-icons-sharp">arrow_drop_down</span></div>
                    <div class="info">
<<<<<<< Updated upstream
                        <div class="name"><p><?= $_SESSION['USER']->first_name." ".$_SESSION['USER']->last_name ?></b></p></div>
                        <small class="text-muted role"><?=ucfirst($_SESSION['user_role'])?></small>
                    </div>
                    <div class="profile-photo">
                        <div><img src="<?= ROOT ?>/assets/images/user.png" alt=""></div>
=======
                        <p>Hey,<b><?= $_SESSION['user_name'] ?></b></p>
                        <small class="text-muted">Technician</small>
                    </div>
                    <div class="profile-photo">
                        <img src="<?= ROOT ?>/assets/images/user.png" alt="">
>>>>>>> Stashed changes
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
                <div class="verification-methods">
                    <div class="method-card" id="contact-verification">
                        <div class="step">
                            <h3>Step 1</h3>
                        </div>
                        <div class="icon">
                            <span class="material-symbols-outlined">phone_iphone</span>
                        </div>
                        <h1>Contact Verification</h1>
                        <div class="action">
                            <button>Verify Now!</button>
                        </div>
                    </div>
                    <div class="method-card" id="identity-verification">
                        <div class="step">
                            <h3>Step 2</h3>
                        </div>
                        <div class="icon">
                            <span class="material-symbols-outlined">how_to_reg</span>
                        </div>
                        <h1>Identity Verification</h1>
                        <div class="action">
                            <bu tton id="contact-verify">Submit Data</button>
                        </div>
                    </div>
                    <div class="method-card" id="">
                        <div class="step">
                            <h3>Step 3</h3>
                        </div>
                        <div class="icon">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                        <h1>Setup profile</h1>
                        <div class="action">
                            <button>Edit Profile</button>
                        </div>
                    </div>
                </div>
                <div class="buttonContainer">
<<<<<<< Updated upstream
                    <a href="#" id="skip"><h3 class="text-muted">Skip for Now!</h3><span class="material-icons-sharp text-muted">arrow_forward_ios</span></a>
=======
                    <a class="btn viewcommunity" href="<?= ROOT ?>/technician/dashboard">View Community</a>
                    <a class="btn logout" href="<?= ROOT ?>/Signout">Logout</a>
>>>>>>> Stashed changes
                </div>

            </div>

        </main>


    </div>

<<<<<<< Updated upstream
    <div class="overlay hidden" id="overlay"></div>
    <div class="popup hidden" id="contact-verification">
        <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
        <div class="content">
=======
    <div class="overlay"></div>
<!--    <div class="popup-container hidden">-->
        <div class="popup">
            <a class="close" id="formClose"><span class="material-icons-sharp">cancel</span></a>
>>>>>>> Stashed changes
            <div class="middle">
                <div class="image-container">
                    <img src="<?= ROOT ?>/assets/images/technicianUI/enter_mobile.jpg" alt="" class="close">
                </div>
                <h1>Contact Verification</h1><br>
                <form class="mobile-verify" id="mobile-details" method="post" enctype="" >
<<<<<<< Updated upstream
                    <div class = "mobile-number-input" id="step1">
                        <p>Please enter your mobile number. We'll send an OTP (one-time password) to this number via SMS for verification</p><br>

                        <div class="input-field">
                            <label>Enter Your Mobile Number</label>
                            <div class="mnumber-box">
                                <input class="country" type="text" id="country_code" name="country_code" value="+94" maxlength="4" size="8" readonly>
                                <input class="mobile" type="text" id="mobile_number" name="mobile_number" placeholder="712345678" pattern="[1-9]{1}[0-9]{8}" maxlength="9" size="9" >
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
                                <input type="text" class="otp-num" id="num1" value="" maxlength="1" size="1" pattern="[0-9]{1}" >
                                <input type="text" class="otp-num" id="num2" value="" maxlength="1" size="1" pattern="[0-9]{1}" >
                                <input type="text" class="otp-num" id="num3" value="" maxlength="1" size="1" pattern="[0-9]{1}" >
                                <input type="text" class="otp-num" id="num4" value="" maxlength="1" size="1" pattern="[0-9]{1}" >
                                <input type="text" class="otp-num" id="num5" value="" maxlength="1" size="1" pattern="[0-9]{1}" >
                                <input type="text" class="otp-num" id="num6" value="" maxlength="1" size="1" pattern="[0-9]{1}" >
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
=======
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
                        <button id="OTP-send">SEND OTP</button>
                    </div>
                </form>

                <form class="mobile-verify hidden" id="mobile-otp" method="post" enctype="">
                    <p>We have sent a One-Time Password (OTP) to your mobile device.
                        Please enter the OTP in the field below to verify your identity and complete the process</p><br>

                    <div class="input-field">
                        <label>Enter the OTP</label>
                        <div class="mnumber-box otp">
                            <input type="text" class="otp-num" id="num1" value="" maxlength="1" size="1" pattern="[0-9]{1}" required>
                            <input type="text" class="otp-num" id="num2" value="" maxlength="1" size="1" pattern="[0-9]{1}" required>
                            <input type="text" class="otp-num" id="num3" value="" maxlength="1" size="1" pattern="[0-9]{1}" required>
                            <input type="text" class="otp-num" id="num4" value="" maxlength="1" size="1" pattern="[0-9]{1}" required>
                            <input type="text" class="otp-num" id="num5" value="" maxlength="1" size="1" pattern="[0-9]{1}" required>
                            <input type="text" class="otp-num" id="num6" value="" maxlength="1" size="1" pattern="[0-9]{1}" required>
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
                </form>

            </div>
        </div>
<!--    </div>-->
>>>>>>> Stashed changes



    <script>
<<<<<<< Updated upstream
        console.log('hello');
        const ROOT = '<?= ROOT ?>';
        const technician_data = JSON.parse(<?= json_encode($technician) ?>);
        console.log(<?=$technician?>)
    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/popupform.js"></script>
=======
        const ROOT = '<?= ROOT ?>';
    </script>
    <script src="<?= ROOT ?>/assets/js/Technician/getVerified.js"></script>
>>>>>>> Stashed changes
    <script src="<?= ROOT ?>/assets/js/Technician/multi.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/getVerified.js"></script>
    <script src="<?= ROOT ?>/assets/js/Technician/otp.js"></script>


</body>

</html>