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
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/admindashboard.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">

                <div class="logo">
                    <img src="<?= ROOT ?>/assets/images/logo.png" alt="">
                    <img src="<?= ROOT ?>/assets/images/title.png" alt="">
                </div>

                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>

            </div>

            <div class="sidebar">
                <a href="<?=ROOT?>/Admin/AdminDashboard" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/VerifyRequest">
                    <span class="material-icons-sharp">help_outline</span>
                    <h3>Verification Request</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Addmoderator">
                    <span class="material-icons-sharp">person</span>
                    <h3>Moderators</h3>
                </a>
                <a href="<?=ROOT?>/Admin/User">
                    <span class="material-icons-sharp">person</span>
                    <h3>User</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Complaints">
                    <span class="material-icons-sharp">error</span>
                    <h3>Complaints</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/ItemTemplate">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item Templates</h3>
                </a>

                <a href="<?= ROOT ?>/Admin/Statistic">
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
            <div class="mainhead">
                <div class="date">
                    <p>14/11/2022</p>
                </div>
                <h1>Dashboard</h1>

                <div class="heading">
                    <div class="top">
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
                                <small class="text-muted">User</small>
                            </div>
                            <div class="profile-photo">
                                <img src="<?=ROOT?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="summary">
                <h2>Summary Of Details</h2>
                <div class="summaryBoxes">

                    <div class="summaryBox">
                        <h2>Total Users</h2>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">person</span>
                                <h4>Item owners : 120 Acounts</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">manage_accounts</span>
                                <h4>Technician : 120 Acounts</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">person_off</span>
                                <h4>Banned accounts : 10 Accounts</h4>
                            </div>
                        </div>
                        <button class="btn_action action1">See more</button>
                    </div>

                    <div class="summaryBox">
                        <!-- <span class="material-icons-sharp">analytics</span> -->
                        <h2>Item Templates</h2>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">construction</span>
                                <h4>Total Items : 55 Items</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">construction</span>
                                <h4>Pending templates : 11 Items</h4>
                            </div>
                        </div>
                        <button class="btn_action action2">See more</button>
                    </div>
                    <div class="summaryBox">
                        <h2>Verification Requests</h2>
                        <div class="middle">
                            <div>
                                <span class="material-icons-sharp">person</span>
                                <h4>New Regestration : 65 Acounts</h4>
                            </div>
                            <div>
                                <span class="material-icons-sharp">manage_accounts</span>
                                <h4>Pending Approvals : 15 Acounts</h4>
                            </div>
                            <div class="maintenanceStatus">
                                <span class="material-icons-sharp">person_off</span>
                                <h4>Rejected : 5 Accounts</h4>
                            </div>
                        </div>
                        <button class="btn_action action1">See more</button>
                    </div>
                </div>
            </div>

            <div class="modarotorList">
                <div>
                    <h2>Moderator's Profile details</h2>
                    <a href="<?=ROOT?>/Admin/Addmoderator" class="btn_action1 addMode">Add Moderator</a>
                    <!-- <button class="btn_action addMode">Add Moderator</button> -->
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>NIC</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Delete</th>
                        

                            <form action="<?=ROOT?>/models/Admin/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                <th> <input type="submit" name="delete" class="btn btn-danger" value="DELETE"> </th>
                            </form>
                        </tr> 

                        <td>
                                <form action="<?=ROOT?>/models/Admin/delete.php" method="POST">
                                    <button type="submit" name="delete_student" value="<?=$row->id;?>" class="btn btn-danger">Delete</button>
                                </form>
                        </td>
                       <?php
                        $conn=mysqli_connect("localhost","root","","upkeep");
                        $sql="SELECT * FROM moderators";
                        $result=$conn->query($sql);
                        
                        if($result->num_rows>0)
                            while($row=$result->fetch_assoc())
                                echo "<tr><td>" .$row["first_name"] ."</td><td>" .$row["last_name"] ."</td><td>" .$row["email"] ."</td><td>" .$row["nic"] ."</td><td>" .$row["mobile_no"] ."</td><td>" .$row["address"] ."</td> </tr>"
                            
                        
                        /* else{
                            echo "No Result";
                        } */
                       // $conn->close();
                        ?>
                    </thead>

                    <!-- foreach ($table as $row) {
                    echo "<tr id='row-{$row['nic']}'>";
                    // echo "<td>" . $row["first_name"] . "</td>";
                    // echo "<td>" . $row["last"] . "</td>";
                    // echo "<td>" . $row["email"] . "</td>";
                    // echo "<td>" . $row["mobile_no"] . "</td>";
                    // echo "<td>" . $row["address"] . "</td>";
                    //echo "<td><button class='remove-button' data-nic='{$row['nic']}'>Remove</button></td>";
                    //echo "</tr>";} -->






                </table>
            </div>

        </main>
        <!-- End of Main -->
        

</body>

</html>