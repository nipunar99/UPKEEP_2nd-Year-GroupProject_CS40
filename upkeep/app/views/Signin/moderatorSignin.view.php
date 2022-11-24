<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/moderatorsignin.css">
   
   </head>
    <title>Sign in-Moderator</title>
</head>

<body>
    <div class="main-container">
        <div class="sectionimg">
            <div class="new">
                <div class="title">
                    <h1><strong>KEEP UP WITH</strong></h1>
                    <h1><i>UPKEEP</i></h1>
                    <img src="<?= ROOT ?>/assets/images/mod.png" alt="">
                </div>
               
            </div>
        </div>
        <div class="sectionform">

            <div class="topic">
                <h1>Sign in</h1>
            </div>
            <div class="form-contain">
                <form method="post">
                    
                    <div class="input-box">
                        <span class="details"><b>E-mail</b></span>
                        <span>
                          <!--  <i class="fa fa-envelope"></i> -->
                            <input type="text" name="email" id="" required placeholder="      Enter email">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>

                    <div class="input-box">
                        <span class="details"><b>Password</b></span>
                        <span>
                            
                        <i class="fa fa-lock" aria-hidden="true"></i>
                           
                      
                         <!-- when password is wrong then placeholder indicate the warning -->
                    <?php 
                        if(!empty($errors)){
                            echo"
                                <input class='wrongpw' type='password' name='password'  required placeholder='Password is invalid'>
                                
                            ";
                        }else{
                            echo"
                                <input type='password' name='password'  required placeholder='      Enter Password'>
                            ";
                        }
                    
                    ?>
                      </span>
                    </div>
                   
                
            </div>
            <div class="layout">

            <input type="checkbox">Remember me</span>
                <a href="" style="color: #80D4FF ; float:right;text-align:right;margin-left: 225px; ">Forgot
                    password</a>
            </div>

            <div class="input-box btn" >
                <input type="submit" value="Sign in">
            </div>
            </form>
            <h4> OR </h4>
            </h4>
            <br>
            <div class="input-box">
                <i>Not a member yet?</i>&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?=ROOT?>/Userselection/signup" style="color:#80D4FF;"> Sign
                        up</a></span>
            </div>
        </div>
    </div>
    </div>
</body>

</html>