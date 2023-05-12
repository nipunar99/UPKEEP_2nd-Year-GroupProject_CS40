<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/signin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>Sign in</title>
</head>
<body>
    <div class="main-container">

        <div class="sectionform">

            <div class="topic">
                <h1>Welcome Back</h1>
                <h4>Please enter your details.</h4>
            </div>

            <form method="post" class="form-contain">
                <?php if(!empty($errors)): ?>
                    <h4 class="error"><span class="material-icons-sharp" style="color:red;">error</span>  invalid email or password</h4>
                <?php endif; ?>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="email" id="" required placeholder="Enter Name">
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type='password' name='password'  required placeholder='Enter Password'>
                    
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
</body>
</html>