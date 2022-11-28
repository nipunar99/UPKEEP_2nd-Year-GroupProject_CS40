<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signup.css">
    <title>Signup</title>
</head>
<body>
    <div class="main-container">

        <div class="sectionimg">
            <div>
                <img src="<?= ROOT ?>/assets/images/logImgTech.png" alt="">
            </div>
        </div>

        <div class="sectionform">

            <div class="topic">
                <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                <h1>Set up your UpKeep account</h1>
            </div>
            <?php if(!empty($errors)) :?>
                <div class="alert alert-danger">
                    <?= implode('<br>',$errors)?>
                </div>
            <?php endif;?>

            <form method="post" class="form-contain">
                <div class="fullname">
                    <div class="input-box">
                        <span class="details">First name</span>
                        <input type="text" name="first_name" id="" required placeholder="Enter First Name">
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="last_name" id="" required placeholder="Enter Last Name">
                    </div>
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" id="" required placeholder="Enter Name">
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="password" id="" required placeholder="Enter Password">
                </div>

                <div class="input-box cbox">
                    <input type="checkbox" name="" id="" required>
                    <small>I agree with UpKeep’s Terms and Conditions ?</small>
                </div>

                <div class="input-box btn">
                    <input type="submit" value="Sign up">
                </div>

                <div class="input-box ">
                    <small>Already have an account ?<span> <a href="<?=ROOT?>/Userselection/signin">Sign in</a></span></small>
                </div>

            </div>
        </form>

    </div>
</body>
</html>