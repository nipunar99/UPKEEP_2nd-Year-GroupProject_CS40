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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/itemtemplate.css">
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
                <a href="<?= ROOT ?>/Moderator/Moderatordashboard" >
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

                <!-- <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a> -->

                <a href="<?= ROOT ?>/Moderator/Statistics">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>


        </aside>

        <main>
            <div class="mainHeader">
                <h1>Items Templates</h1>
                <div class="right">
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
                                <img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End of top -->
        
                    <!-- End of recent updates -->
        
                </div>
    
            </div>
            <div class="toolbar">
                <div class="searchBar">
                    <input type="search" name="" id="txtHint" placeholder="Search item">
                    <span class="material-icons-sharp">search</span>
                </div>
                <a href="<?= ROOT ?>/Moderator/Additemtemplate"><button class="addItem">Add An Item Template</button></a>
            </div>
            <div class="item-details">
             
                
            <div class="insight">
                <div class="itemTemplateList" onchange="showUser(this.th)">
                    <table id="templateTable">
                        <thead>
                       
                            <tr>
                                <th>Item</th>
                                <th>Item type</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                                <!-- <th>Description</th> -->
                                <!-- <th>Esti.lifespan</th> -->
                            </tr>
                        </thead>
                        <tbody>
            
                <?php if(!empty($result)):?>
                    <?php foreach($result as $row):?>
                        <tr>
                            <td><div class="image"><img src="<?=ROOT?>/assets/images/uploads/<?=$row->image?>"></div></td>
                            <td><?=$row->item_type?></td>
                            <td><?=$row->category?></td>
                            <td><?=$row->status?></td>
                            <td><a href="<?= ROOT?>/Moderator/Item/viewItem/<?=$row->id?>"><button><span class="material-icons-sharp">view_list</span></button>&nbsp;&nbsp;<button><span class="material-icons-sharp">delete</span></button></td>                 
                        </tr>
                    <?php endforeach;?>
                <?php endif;?>
            
            
            <!-- <div class="insight">
                <div class="itemTemplateList" onchange="showUser(this.th)">
                    <table>
                        <thead>
                            <tr>
                                <th>Item template Name</th>
                                <th>Item type</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Esti.lifespan</th>
                                 // <td>".$row->description."</td>
                                // <td>".$row->lifespan."</td> 
                            </tr>
                        </thead>
                        <tbody>
                           
             
            -->
                                <!-- <td>Name should be added</td>
                                <td>Refrigerator</td>
                                <td>non freeze refrigerator</td>
                                <td class="warning">Pending</td>
                                <td>N/A</td>
                                <td>10 years</td> -->
                            
                            <!-- <tr>
                                <td>Name should be added</td>
                                <td>Refrigerator</td>
                                <td>non freeze refrigerator</td>
                                <td class="warning">Pending</td>
                                <td>N/A</td>
                                <td>10 years</td>
                            </tr>
                            <tr>
                                <td>Name should be added</td>
                                <td>Refrigerator</td>
                                <td>non freeze refrigerator</td>
                                <td class="success">Pending</td>
                                <td>N/A</td>
                                <td>10 years</td>
                            </tr>
                            <tr>
                                <td>Name should be added</td>
                                <td>Refrigerator</td>
                                <td>non freeze refrigerator</td>
                                <td class="success">Pending</td>
                                <td>N/A</td>
                                <td>10 years</td>
                            </tr>
                            <tr>
                                <td>Name should be added</td>
                                <td>Refrigerator</td>
                                <td>non freeze refrigerator</td>
                                <td class="success">Pending</td>
                                <td>N/A</td>
                                <td>10 years</td>
                            </tr> -->
                        <!-- </tbody> -->
                    <!-- </table> -->
                    <!-- <a href="#">Show All</a> -->
                </div>
            </div>
        </main> 

    </div>
    <script src="<?= ROOT ?>/assets/js/Moderator/itemtemplate.js"></script>
</body>
</html>