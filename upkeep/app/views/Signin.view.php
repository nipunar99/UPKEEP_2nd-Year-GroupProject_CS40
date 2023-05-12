<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signin.css">
    <title>Sign in</title>
</head>
<body style="background: url(<?= ROOT ?>/assets/images/landingPage/about-bg.png) no-repeat;background-size: cover;background-position: center;">
    <div class="main-container">
        <div class="content">
            <div class="sectionform">

                <div class="topic">
                    <img src="<?= ROOT ?>/assets/images/headerlogo.png" style="display: none;"  alt="" >
                    <h1>Welcome Back</h1>
                    <h4>Please enter your details.</h4>
                </div>

                <form method="post" class="form-contain">
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="email" id="" required placeholder="Enter Name">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>

                        <!-- when password is wrong then placeholder indicate the warning -->
                        <?php 
                            if(!empty($errors)){
                                echo"
                                    <input class='wrongpw' type='password' name='password'  required placeholder='Password is invalied'>
                                ";
                            }else{
                                echo"
                                    <input type='password' name='password'  required placeholder='Enter Password'>
                                ";
                            }
                        
                        ?>
                        
                    </div>

                    <div class="input-box forgetpw">
                        <small><a href="">Forget password</a></small>
                    </div>

                    <div class="input-box btn">
                        <input type="submit" value="Sign in">
                    </div>
                    
                    <div class="input-box">
                        <small>Don't have an acconnt? <span> <a href="<?=ROOT?>/Userselection/signup">Sign up</a></span></small>
                    </div>


                </form>
            </div>

            <div class="sectionimg">
                <div>
                    <img src="<?= ROOT ?>/assets/images/logImg.png" alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>