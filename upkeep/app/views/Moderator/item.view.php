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
            <div class="header nbs">
                <div class="left">

                </div>
                <div class="center">
                    <h1>Item</h1>
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
            <div class="toolbar">
        <a href="<?= ROOT ?>/Moderator/AddDisposal_places"><button class="addItem">Add Disposal places</button></a>
       
        <button id="deleteButton" name="deleteButton" style="display: none;" class="del"><span>Delete</span></button>

    </div>
            <div class="insight">
                <div class="card-main">
                    <div class="itemView">
                        <div class="view-1">
                            <?php
                            $result = json_decode($data['result']);
                            $result_obj = $result[0];

                            ?>

                            <div class='img'>
                                <img src="<?= ROOT ?>/assets/images/uploads/<?= $result_obj->image ?>">
                            </div>

                        </div>
                        <div class="view-3">
                            <div class='view-1-text'>
                                <div class='name'>
                                    <h5>Item Template Name</h5>
                                    <p><?= $result_obj->itemtemplate_name ?></p>
                                </div>
                                <div class='type'>
                                    <h5>Category</h5>
                                    <p><?= $result_obj->category_name ?></p>
                                </div>
                                <div class='sta'>
                                    <h5>Status</h5>
                                    <p><?= $result_obj->status ?></p>
                                </div>

                            </div>
                            <a href="http://localhost/upkeep/upkeep/public/Moderator/Maintenance/parentmaintenanceTasks/<?= $result_obj->id ?>">
                            <button class="view-1-button">
                                   View Maintenances
                            </button>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="view-3"> -->




                    <!-- <div class="view-3"></div> -->
                    <div class="view-2">
                        <div class="text">
                            <div class="text-1">
                                <h2>Item Users</h2>

                            </div>
                            <div class="text-2">
                                <div class="t1">
                                    <h4>Total Users <h3>130</h3>
                                    </h4>
                                </div>
                                <div class="t2">
                                    <h4>Item Users <h3>10</h3>
                                    </h4>
                                </div>

                            </div>
                        </div>
                        <div class="pie-view">
                            <canvas id="pieChart">
                                <canvas>
                        </div>

                    </div>
                </div>
                <!-- <form action="" method="post"> -->
                <div class="maintenances">

                    <h1>Sub Categories</h1>
                    <button id="deleteButton" name="deleteButton" style="display: none;" class="del"><span>Delete</span></button>
                    <span> <button id="popup-btn" class="subcategory">Add Sub Category</button></span>
                    <div class="table">
                        <table id="categoryTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="hidden_id"></th>
                                    <th>Item name</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody class="category">
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="item_id" id="myCheckbox" onchange="toggleDeleteButton()"></td>
                                    <td class="hidden_id">87</td>
                                    <td role="button"><a href="<?= ROOT ?>/Moderator/Maintenance/maintenanceTasks/5">aaaa></a></td>
                                    <td id="status">nnoyt</td>
                                    <td class="des">aaa</td>
                                    <td>
                                        <div> <button class="view"><span>edit</span></button></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- </form> -->
        </main>

        <div class="popupview hidden" id="add-item">
        <button class="closebtn closebtn1">&times;</button>
            <form id="popup-form1" method="post" action="add" class="fm" enctype="multipart/form-data">
                <div class="itemDetails">
                    <h1>Add Item Template</h1>
                    <div class="topInput">
                        <input type="hidden" name="parent_id" value="<?= $result_obj->id ?>" id="rowid-input">
                        <div class="input-box">
                            <span class="details">Item template Name</span>
                            <input type="text" name="itemtemplate_name" pattern="[A-Za-z ]+" value="" id="itemtemplate_name">
                            <small></small>
                        </div>

                    </div>

                    <div class="middleInput">
                        <div class="input-box">
                            <span class="details">Status</span>
                            <select name="status" id="status1" required=""></select>
                            <small></small>
                        </div>

                        <div class="input-box">
                            <span class="details">Image</span>
                            <input type="file" class="imgInput" name="image" id="upfile" placeholder="Enter Brand">
                            <small></small>
                        </div>
                        <div class="input-box">
                            <span class="details">Category Name</span>
                            <input type="text" name="category_id" id="name1" value="<?= $result_obj->category_name ?>" readonly>
                            <small></small>
                        </div>

                    </div>
                    <div class="input-box">
                        <span class="details">Description</span>
                        <textarea rows="3" cols="100" name="description" id="description" required placeholder="Enter Description about item Template"></textarea>
                        <small></small>
                    </div>


                    <div class="button">
                        <input type="submit" value="Add Item" id="add">
                    </div>

                </div>
                <!-- text input field with "readonly" attribute -->

            </form>
        </div>
        <div class="popupview hidden" id="update-item">
        <button class="closebtn closebtn2">&times;</button>
            <form id="popup-form2" method="post" action="updateItem" class="fm">
                <div class="itemDetails">
                    <h1>Edit Item Template</h1>
                    <div class="topInput">
                        <input type="hidden" name="id" id="rowid-input1">
                        <input type="hidden" name="parent_id" value="<?= $result_obj->id ?>" id="rowparentid-input">
                        <div class="input-box">
                            <span class="details">Item template Name</span>
                            <input type="text" name="itemtemplate_name" pattern="[A-Za-z ]+" value="" id="Itemtemplate_name">
                            <small></small>
                        </div>

                    </div>

                    <div class="middleInput">
                        <div class="input-box">
                            <span class="details">Status</span>
                            <select name="status" id="Status" required="" value=""></select>
                            <small></small>
                        </div>

                        <div class="input-box">
                            <span class="details">Image</span>
                            <input type="file" class="imgInput" name="image" id="Upfile" value="" placeholder="Enter Brand">
                            <small></small>
                        </div>
                        <div class="input-box">
                            <span class="details">Category Name</span>
                            <input type="text" name="category_id" id="name2" value="<?= $result_obj->category_name ?>" readonly>
                            <small></small>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Description</span>
                        <textarea rows="3" cols="100" name="description" id="Description" required placeholder="Enter Description about item Template"></textarea>
                        <small></small>
                    </div>


                    <div class="button">
                        <input type="submit" value="Update Item" id="update">
                    </div>

                </div>
                <!-- text input field with "readonly" attribute -->

            </form>
        </div>
        <!-- </div> -->

        <div class="overlayview hidden"></div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php
    echo "<script> var ROOT = '" . ROOT . "'; </script>";
    ?>
    <script src="<?= ROOT ?>/assets/js/Moderator/item.js"></script>
</body>

</html>