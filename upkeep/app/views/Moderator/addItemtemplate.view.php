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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/additemtemplate.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                    <img src="<?= ROOT ?>/assets/images/title.png" alt="">
                </div>


            </div>

            <div class="sidebar">
                <a href="<?= ROOT ?>/Moderator/Moderatordashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/Moderator/Suggestion">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Suggestions</h3>
                </a>

                <a href="#" class="active">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?= ROOT ?>/Moderator/Complaint">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>



                <a href="<?= ROOT ?>/Moderator/Statistics">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Statistics</h3>
                </a>

                <a href="<?= ROOT ?>/Signout">
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
                    <h1>Add Itemtemplate</h1>
                </div>
                <div class="right">
                    <div class="notification">
                        <span class="material-icons-sharp">notifications</span>
                    </div>

                    <div class="profile" id="profile">
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




            <div class="insight">
                <form method="post" action="#" id="myform">
                    <div class="itemDetails">
                        <div class="topInput">

                            <div class="input-box">
                                <span class="details">Item template Name</span>
                                <input type="text" name="itemtemplate_name" id="name" pattern="[A-Za-z ]+" required placeholder="Enter Item template Name (Letters and spaces only) ">

                            </div>

                        </div>

                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Status</span>
                                <select name="status" id="status" required=""></select>
                            </div>

                            <div class="input-box" id="img">
                                <span class="details">Image</span>
                                <input type="file" class="imgInput" name="image" id="upfile" placeholder="Enter Brand">
                            </div>
                            <div class="input-box">
                                <span class="details">Select category</span>
                                <select name="category_id" id="category" required></select>
                            </div>

                        </div>

                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea rows="5" cols="100" name="description" id="des_id" required placeholder="Enter Description about item Template"></textarea>
                        </div>


                        <div class="button">
                            <input type="submit" value="Add Item" id="submitBtn">
                        </div>

                    </div>
                </form>
            </div>
        </main>

    </div>
    <script src="<?= ROOT ?>/assets/js/Moderator/additemtemplate.js"></script>
</body>

</html>