<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpKeep</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/home.css">
</head>

<body>
    <header>
        <div class="logo">
        <img src="<?= ROOT ?>/assets/images/landingPage/logo.png" alt="">
        <img src="<?= ROOT ?>/assets/images/landingPage/title.png" alt="">
        </div>

        <div class="nav">
        <ul class="navlist">
            <li><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        </div>

        <div class="logbtn">
        <a class="createBtn" href="<?=ROOT?>/Userselection/signup" >Create</a></li>
        <a class="signinBtn" href="<?=ROOT?>/Signin">Sign in</a></li>
        </div>
    </header>

    <section class="home" id="home">

        <div class="content">
        <h3>From out of sight , To done <span>rights</span></h3>
        <p>UpKeep makes it simple to see where everything stands, all in one place. That means less guess works for you and more time to focus on what matters.</p>
        <div>
            <a href="<?=ROOT?>/Userselection/signup" class="btn cta">
            <span class="material-icons-sharp">arrow_forward</span>
            <span>Create</span>
            </a>
            <a href="#" class="btn cta cta-com">Community</a>
        </div>
        
    </div>

    <div class="image">
        <img src="<?= ROOT ?>/assets/images/landingPage/mainImg.png" alt="">
    </div>

    </section>

    <section class="about" id="about">

    <h1 class="heading"> Why need you UpKeep </h1>

    <div class="column">

        <div class="image">
            <img src="<?= ROOT ?>/assets/images/landingPage/about-img.png" alt="">
        </div>

        <div class="content">
            <h3>Integrations Across Your Entire Stack</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla placeat deserunt saepe repudiandae veniam soluta minima dolor hic aperiam iure.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, quaerat. Dolorem ratione saepe magni quo inventore porro ab voluptates eos, nam eius provident accusantium, quia similique est, repellendus et reiciendis.</p>
            <div class="buttons">
                <a href="#" class="btn">Read Now </a>
                <a href="#" class="btn"> Start Now </a>
            </div>
        </div>

    </div>

    </section>
    

    <section class="features" id="features">

    <h1 class="heading"> app features </h1>

    <div class="box-container">

        <div class="box">
            <img src="<?= ROOT ?>/assets/images/landingPage/f-icon1.png" alt="">
            <h3>Maintenance Management System</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            <a href="#" class="btn readmorebtn">Read More</a>
        </div>

        <div class="box">
            <img src="<?= ROOT ?>/assets/images/landingPage/f-icon2.png" alt="">
            <h3>Easy to find Technician</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            <a href="#" class="btn readmorebtn">Read More</a>
        </div>

        <div class="box">
            <img src="<?= ROOT ?>/assets/images/landingPage/f-icon3.png" alt="">
            <h3>Community Support</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            <a href="#" class="btn readmorebtn">Read More</a>
        </div>

    </div>

</section>

<section class="contact" id="contact">

    <form action="">

        <h1 class="heading">contact us</h1>

        <div class="inputBox">
            <input type="text" required>
            <label>Name</label>
        </div>

        <div class="inputBox">
            <input type="email" required>
            <label>Email</label>
        </div>

        <div class="inputBox">
            <textarea required name="" id="" cols="30" rows="10"></textarea>
            <label>Message</label>
        </div>

        <input type="submit" class="btn" value="Send Message">

    </form>

    <div class="image">
        <img src="<?= ROOT ?>/assets/images/landingPage/contact-img.png" alt="">
    </div>

</section>

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>About Us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet pariatur rerum consectetur architecto ad tempora blanditiis quo aliquid inventore a.</p>
        </div>

        <div class="box">
            <h3>Quick Links</h3>
            <a href="#home">Home</a>
            <a href="#about">About</a>
            <a href="#features">features</a>
            <a href="#contact">contact</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <div class="info">
                <span class="material-icons-sharp">
                call
                </span>
                <p> 076-6226603 <br> 091-5685423 </p>
            </div>
            <div class="info">
                <span class="material-icons-sharp">
                local_post_office
                </span>
                <p> example@gmail.com <br> example@gmail.com </p>
            </div>
            <div class="info">
                <span class="material-icons-sharp">
                home
                </span>
                <p> UCSC Building Complex, 35 Reid Ave, Colombo 07 </p>
            </div>
        </div>

    </div>

    <h1 class="credit"> &copy; copyright @ 2022/2023 by CS GROUP 40 </h1>

    </div>
</body>

</html>