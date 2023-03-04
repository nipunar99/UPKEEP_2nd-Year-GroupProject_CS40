<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/maintenance.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">

        <aside>
            <div class="top">
                <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                <img src="<?= ROOT ?>/assets/images/title.png" alt="">
            </div>
            <div class="sidebar">
                <a href="<?= ROOT ?>/Moderator/Moderatordashboard">
                    <span class="material-icons-sharp">dashboard</span>
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
                <a href="<?= ROOT ?>/Moderator/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Statistics">
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Statistics</h3>
                </a>
                <a href="<?= ROOT ?>/Moderator/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="mainHeader">
                <h1>Item  Maintenances</h1>
                <div class="right">
                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark mode</span>
                    </div>

                    <div class="profile">
                        <div class="info">
                            <p>Hey,<b>Saman</b></p>
                            <small class="text-muted">user</small>
                        </div>
                        <div class="profile-photo">
                            <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="insight">
            <div class="topnav">
                <!-- <div class="name">name</div> --> 
  <a class="active" href="#home">Yearly</a>
  <a href="#1">Monthly</a>
  <a href="#2">Weekly</a>
  <!-- <a href="#3">Sub Component 3</a> -->
</div>
<span> <button class="subcategory" onclick="open_form()">&#43</button></span>
<div class="data">
    <!-- <table>
        <thead></thead>
        <tbody>
        <tr> -->
           <p>task 1</p> 
          <p>task 2</p>  
            
        <!-- </tr>
        </tbody>
    </table> -->
</div>

            </div>
            <div class="popupview hidden">
            <button class="closebtn">&times;</button>

            <div class="content">

                <form method="post" enctype="multipart/form-data" id="form_itemDetails">
                <h2>Maintenance Details</h2>
                    <div class="itemDetails">
                        <div class="input-box">
                            <span class="details">Enter maintenance task</span>
                            <input type="text" name="item_name" id="" required placeholder="Description">
                        </div>
                        
                        <div class="middleInput"> 
                            <div class="input-box">
                            <select name="maintain" id="maintain"><span class="details">Select time period</span>
                                    <option value="red">Yearly</option>
                                    <option value="green">Monthly</option>
                                    <option value="blue">Weekly</option>
                                    </select>        
                            </div>
                        </div>

                        <div class="button">
                            <input type="submit" value="Submit" id="Btn"> 
                            <!-- itemDetails -->
                        </div>
        
                    </div>
                </form>
            </div>
            <div class="overlayview hidden"></div>
            <script src="<?= ROOT ?>/assets/js/Moderator/maintenances.js">
    </script>
</body>

</html>