<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/moderatorsignin.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <title>Sign in-Moderator</title>
</head>

<body>
    <div class="main-container">
        <div class="sectionimg">
            <div class="new">
                <div class="title">
                    <h1><strong>KEEP UP WITH</strong></h1>
                    <h1><i>UPKEEP</i></h1>
                </div>
                <div>
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
                            <i class="fa fa-envelope"></i>
                            <input type="text" name="email" id="" placeholder="      Enter email">
                        </span>
                    </div>

                    <div class="input-box">
                        <span class="details"><b>Password</b></span>
                        <span>
                            <i class="fa fa-lock"></i>
                            <input type="text" name="password" id="" required placeholder="      Enter Password">
                        </span>
                        
                    </div>
                </form>
            </div>
            <div class="layout">

                <span></span style="float:left;"><input type="checkbox">Remember me</span>
                <a href="" style="color: #80D4FF ; float:right;text-align:right;margin-left: 225px; ">Forgot
                    password</a>
            </div>

            <div class="input-box btn" >
                <input type="submit" value="Sign in">
            </div>

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