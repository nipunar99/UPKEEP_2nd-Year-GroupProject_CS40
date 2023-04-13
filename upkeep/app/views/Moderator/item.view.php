<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Moderator/item.css">
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
                <h1>Item</h1>
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
                <div class="card-main">
                     <div class="view-1"> 
                        <?php 
                                $result = json_decode($data['result']);
                                $result_obj = $result[0];
                                
                        ?>
                       
                        <div class='img'>
                            <img src="<?= ROOT ?>/assets/images/uploads/<?= $result_obj->image?>">
                        </div>
                        <div class='view-1-text'>

                            <div class='name'>
                                <h5>Item Template Name</h5>
                                <p><?= $result_obj->itemtemplate_name?></p>
                            </div>
                            <div class='type'>
                                <h5>Item Type</h5>
                                <p><?= $result_obj->type_name?></p>
                            </div>


                        </div>

                        
                         <!-- <div class="view-1">
                       
                        <div class='img'>
                            <img src="<?= ROOT ?>/assets/images/uploads/2.png">
                        </div>
                        <div class='view-1-text'>

                            <div class='name'>
                                <h5>aa</h5>
                                <p>bb</p>
                            </div>
                            <div class='type'>
                                <h5>Item Type</h5>
                                <p>cc</p>
                            </div>


                        </div> -->


                        <div class="view-1-button">
                            <button>Approve</button>
                            <button class="delete">Edit</button>
                        </div>
                    </div>
                    <!-- <div class="view-3"> -->



                    <!-- <div class="view-3"></div> -->
                    <div class="view-2">
                        <div class="text">
                            <div class="text-1">
                                <p>Users</p>
                                <h1>250</h1>
                                <p>12/11/2021</p>
                            </div>
                            <div class="text-2">
                                <p>Total Users 110</p>
                                <p>Item Users 10</p>

                            </div>
                        </div>
                        <div class="pie-view">

                        </div>
                        <!-- <h2>Usage</h2>
                        <div class="view-2-text">
                            <div class="users">
                                <h3>Current Users</h3>
                                <h4>50</h4>
                            </div>
                            <div class="tasks">
                                <h3>Current Suggested Tasks</h3>
                                <h4>Task 1</h4>
                                <h4>Task 2</h4>
                                <h4>Task 3</h4>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- <form action="" method="post"> -->
                <div class="maintenances">

                    <h1>Sub Categories</h1>
                    <button id="deleteButton" name="deleteButton" style="display: none;" class="del"><span class="material-icons-sharp">delete</span></button>
                    <span> <button id="popup-btn" class="subcategory">&#43</button></span>
                    <div class="table">
                        <table id="categoryTable">
                            <thead>
                                <tr>
                                    <th></th> 
                                    <th class="hidden_id"></th>
                                    <th>Sub category</th>
                                    <!-- <th>Time Frame</th> -->
                                    <th>Description</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="category">
                            <?php if(!empty($results)):?>
                    <?php foreach($results as $row):?>
                                <tr>
                                <td><input type="checkbox" name="id[]" class="item_id" id="myCheckbox" onchange="toggleDeleteButton()"></td>
                                <td class="hidden_id"><?=$row->id?></td>
                                    <!-- <td ><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""> </td> -->
                                    <td role="button"><a href="<?= ROOT ?>/Moderator/Maintenance"><?=$row->category?></a></td>
                                    <!-- <td>Sub Component</td> -->
                                    <!-- <td>Time Frame</td> -->
                                    <td><?= $row->description?></td>
                                    <td>
                                                <!-- <div class="more"> -->
                                                    <!-- <div class="view"><button onclick='passItemDetails("+i+")'><span class="material-icons-sharp">view_list</span></button></div>&nbsp;&nbsp;<div class="delete"><button type="button" onclick="fun()"><span class="material-icons-sharp">delete</span></button></div> -->
                                                   <div> <button class="view"><span class="material-icons-sharp">edit</span></button></div>
                                                <!-- </div> -->
                                            </td>
                                </tr>
<?php endforeach;?>
                <?php endif;?>
                            
                                   
                               
                            </tbody>
                        </table>
                    </div>
                   
                </div>
               
                <!-- </form> -->
        </main>
        <!-- <div class="popupview hidden">
            <button class="closebtn">&times;</button>
            <div class="popup-text">
                <div class="1">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h4>Item name</h4>
                    <h4><B>Samsung Inverter Windfree AC</B> </h4>
                </div>
                <div class="2">
                    <span class="material-icons-sharp">chat_bubble_outline</span>
                    <h4>Maintenance task</h4>
                    <h4><b>Replace HAVC air filters</b></h4>
                </div>
                <div class="3">
                    <span class="material-icons-sharp">construction</span>
                    <h4>Sub Component</h4>
                    <h4><b>Air filter</b></h4>
                </div>
            </div>
            <div class="actions">
                <button>Add to template</button>
                <button>Edit</button>
                <button>Reject</button>
            </div>
        </div> -->
       
        <!-- <div id="common-ancestor"> -->
<div class="popupview popupview1 hidden">
        <form id="popup-form1" method="post" action="#" class="fm">
        <div class="itemDetails">
                    <div class="topInput">
                    
                        <div class="input-box">
                            <span class="details">Item template Name</span>
                            <input type="text" name="itemtemplate_name" value="<?= $result_obj->itemtemplate_name?>" id=""  readonly>
                        </div>

 </div>        

                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Status</span>
                                <select name="status" id="status1"></select>
                            </div>

                            <div class="input-box">
                                <span class="details">Image</span>
                                <input type="file" class="imgInput" name="image" id="upfile" placeholder="Enter Brand">
                            </div>
                            <div class="input-box">
                                <span class="details">Type Name</span>
                                <input type="text" name="type_id" id="" value="<?= $result_obj->type_name?>" readonly>
                            </div>
                          


                        </div>
                        <div class="input-box">
                            <span class="details">Category</span>
                            <input type="text" name="category" id="" required placeholder="Enter Category">

                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea rows="3" cols="100" name="description" id="" required placeholder="Enter Description about item Template"></textarea>
                        </div>


                        <div class="button">
                            <input type="submit" value="Add Item">
                        </div>

                    </div>
  <!-- text input field with "readonly" attribute -->
 
</form>
</div>
<div class="popupview popupview2 hidden">
        <form id="popup-form2" method="post" action="#" class="fm">
        <div class="itemDetails">
                    <div class="topInput">
                    <input type="hidden" name="operation" value=" 'update'">
                    <input type="hidden" name="id" id="rowid-input">
                        <div class="input-box">
                            <span class="details">Item template Name</span>
                            <input type="text" name="itemtemplate_name" value="<?= $result_obj->itemtemplate_name?>" id=""  readonly>
                        </div>

 </div>        

                        <div class="middleInput">
                            <div class="input-box">
                                <span class="details">Status</span>
                                <select name="status" id="status2" ></select>
                            </div>

                            <div class="input-box">
                                <span class="details">Image</span>
                                <input type="file" class="imgInput" name="image" id="upfile"  value="<?= $result_obj->image?>"placeholder="Enter Brand">
                            </div>
                            <div class="input-box">
                                <span class="details">Type Name</span>
                                <input type="text" name="type_id" id="" value="<?= $result_obj->type_name?>" readonly>
                            </div>
                          


                        </div>
                        <div class="input-box">
                            <span class="details">Category</span>
                            <input type="text" name="category" value="<?= $result_obj->category?>" id="" required placeholder="Enter Category">

                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea rows="3" cols="100" name="description" value="<?= $result_obj->description?>" id="" required placeholder="Enter Description about item Template"></textarea>
                        </div>


                        <div class="button">
                            <input type="submit" value="Add Item">
                        </div>

                    </div>
  <!-- text input field with "readonly" attribute -->
 
</form>
</div>
                    <!-- </div> -->

        <div class="overlayview hidden"></div>
    </div>
    </div>
    <script src="<?= ROOT ?>/assets/js/Moderator/item.js"></script>
</body>

</html>