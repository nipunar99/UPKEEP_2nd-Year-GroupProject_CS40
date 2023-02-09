
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/moderatorsignup.css">
  
    <title>Sign up-Moderator</title>
</head>

<body>
    <div class="main-container">
        <div class="sectionimg">
            <div class="title">
                <h1><strong> KEEP UP WITH</strong></h1>
                <h1><i>UPKEEP</i></h1>
                <img src="<?= ROOT ?>/assets/images/mod.png" alt="">
            </div>
         
               
          
        </div>
        <div class="sectionform">

            <div class="topic">
                <h1>Sign up for an account</h1>
            </div>
            <?php if(!empty($errors)) :?>
                <div class="alert alert-danger">
                    <?= implode('<br>',$errors)?>
                </div>
            <?php endif;?>

            <div class="form-contain">
                <form method="POST">
                    <div class="input-box">
                        <span class="details">First name</span>
                        <input type="text" name="first_name" id="" required placeholder="Enter first Name">
                        <span class="details">Last name</span>
                        <input type="text" name="last_name" id="" required placeholder="Enter last Name">
                    </div>
                    <div class="input-box">
                        <span class="details">E-mail</span>
                        <input type="text" name="email" id="" required placeholder="Enter email">
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" id="" required placeholder="Enter password">
                        
                    </div>
                   
             

                <span></span><input type="checkbox" name="" id="" required>I agree with UPKEEP terms and conditions.</span>

                <div class="layout">

                    <a href="#" style=" color: #80D4FF; float:right;text-align:right;margin-left: 225px;">Forgot
                        password</a>
                </div>
                <div class="input-box btn">
                    <input type="submit" value="Sign up" >
                </div>
             <br><br>
                
                <div class="input-box">
                    <div class="input-box">
                        Already have an acconnt? <span> <a href="<?= ROOT ?>/Userselection/signin" style=" color: #80D4FF;">&nbsp;&nbsp;&nbsp;&nbsp;
                                Sign in</a></span>
                    </div>


                </div>
                </form>
            </div>



        </div>
</body>

</html>
