<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UpKeep</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/css/userselection.css">
</head>
<body>
  <header>
    <div class="logo">
      <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
      <img src="<?= ROOT ?>/assets/images/title.png" alt="">
    </div>

    <div class="nav">
      <ul class="navlist">
        <li><a href="<?= ROOT ?>/Home">Home</a></li>
        <li><a href="#">How Get Started</a></li>
      </ul>
    </div>

    <div class="logbtn">
      <a href="<?=ROOT?>/Userselection/signup" href="#" >Create</a></li>
    </div>
  </header>

  <main>
    <div class="middle">

                          <!-- -> folder / controller file / method -->
      <a href="<?= ROOT ?>/Signin/itemOwnerSignin"> 
        <div class="actor">
          <img src="<?= ROOT ?>/assets/images/itemowner.png" alt="">
          <h3>Item owner</h3>
        </div>
      </a>
                      <!-- RAHAL -> folder / controller file / method -->
      <a href="<?= ROOT ?>/Signin/technicianSignin">
        <div class="actor">
          <img src="<?= ROOT ?>/assets/images/technician.png" alt="">
          <h3>Technician</h3>
        </div>
      </a>
                      <!-- RUSITH -> folder / controller file / method -->
      <a href="<?= ROOT ?>/Signin/moderatorSignin">
        <div class="actor">
          <img src="<?= ROOT ?>/assets/images/moderator.png" alt="">
          <h3>Moderator</h3>
        </div>
      </a>
                      <!-- SASINI -> folder / controller file / method -->
      <a href="<?= ROOT ?>/Signin/adminSignin">
        <div class="actor">
          <img src="<?= ROOT ?>/assets/images/admin.png" alt="">
          <h3>Administrator</h3>
        </div>
      </a>

    </div>
  </main>


</body>
</html>