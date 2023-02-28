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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Technician/gigTabstyles.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/Admin/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-yacmIiZmY4ZpH4tA+8tbaThL5vi5r5pOuOvUV8X7VjQoC2Oaa/+GhBw8b7W1G6mv" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <aside>
            <div class="top">
                

                <div class="logo">
                    <img src=<?=ROOT."/assets/images/logo.png"?> alt="">
                    <img src=<?=ROOT."/assets/images/title.png"?> alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                        </span>
                </div>

            </div>

            <div class="sidebar">
                
                <a href="<?=ROOT?>/Admin/AdminDashboard">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?=ROOT?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?=ROOT?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?=ROOT?>/Admin/Statistic">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Statistics</h3>
                </a>
                
                <a href="<?= ROOT ?>/Signout">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        
        

        <main>
            <div class="top">
                <h1>USER</h1>
                <div class="right">
                    <button id="menu-btn">
                        <span class="material-icons-sharp">menu</span>
                    </button>

                    <div class="theme-toggler">
                        <span class="material-icons-sharp active">light_mode</span>
                        <span class="material-icons-sharp">dark_mode</span>
                    </div>

                    <div class="profile">
                        <div class="info">
                            <p>Hey,<b>Saman</b></p>
                            <small class="text-muted">Technician</small>
                        </div>
                        <div class="profile-photo">
                            <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-header">
                <div class="button-container">
                    <button class="add-technician-button">Add New Technician</button>
                    <div class="search-bar-container">
                    <input type="text" placeholder="Search...">
                    <button class="search-button">Search</button>
                    </div>
                    <div class="filter-container">
                    <button class="filter-btn"><i class="fa fa-filter" style="margin-right:0.6rem;"></i>Filter</button>
                    <select>
                        <option value="">\/</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    
                    </div>
                    <button class="remove-button">Remove</button>
                </div>
            </div>


   

        <table class="technician-table">
        <thead>
            <tr>
            <th>Technician Name</th>
            <th>Id</th>
            <th>Type</th>
            <th>Age</th>
            <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>John Doe</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>John Doe</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
            <tr>
            <td><div class="profile-container">
                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="Technician profile picture">
                <span>Rusith Siriwardhana</span>
                </div>
            </td>
            <td>T001</td>
            <td>A/C repair</td>
            <td>53</td>
            <td>Male</td>
            </tr>
        </tbody>
        </table>


            
            
            
        <!-- </main>  -->

        <!-- End of Main -->

        <!-- <div class="right"> -->
            
            <!-- End of top -->

        <!-- </div> -->
        </main>
    </div>

    

</body>
</html>




