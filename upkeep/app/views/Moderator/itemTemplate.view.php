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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

                <a href="#">
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
                    <h1>Item Template</h1>
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
        <div class="searchBar">
            <input type="search" name="" id="txtHint" placeholder="Search item" onkeyup="myFunction()">
            <span class="material-icons-sharp">search</span>
        </div>
        <a href="<?= ROOT ?>/Moderator/Additemtemplate"><button class="addItem">Add An Item Template</button></a>
        <div class="filter">
            <button onclick="showDropdwn()" class="filter_table"><span class="material-icons-sharp">filter_list</span>
                <div class="fil"> Filter
                </div>
            </button>
            <select class="table-status" id="main-dropdwn" style="display:none;">
                <optgroup label="Status" id="status">Status
                    <option value="1">Approved</option>
                    <option value="2">Pending</option>
                </optgroup>
                <optgroup label="Item Type">Status
                    <option value="3">Electronics</option>
                    <option value="4">Appliances</option>
                    <option value="5">Tools and equipment</option>
                    <option value="6">Vehicles</option>
                    <option value="7">Furniture</option>
                    <option value="8">Home and garden</option>
                    <option value="9">Other</option>
                </optgroup>
            </select>

        </div>

    </div>


    <div class="item-details">


        <div class="insight">
            <div class="itemTemplateList">
                <table id="templateTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th class="items" onclick="sortTable(0)">Item</th>
                            <th class="category" onclick="sortTable(1)">Item Type </th>
                            <th onclick="sortTable(2)" class="status">Status </th>
                            <th class="description">Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="details">
                        <tr>
                            <td><input type="checkbox" name="id[]" class="item_id" id="myCheckbox" onchange="toggleDeleteButton()"></td>
                            <td class="template_name">
                                <img src="<?= ROOT ?>/assets/images/uploads/2.png">
                                <span>new</span>
                            </td>
                            <td>abc</td>
                            <td id="status" class="primary">pending</td>
                            <td class="des_color">btre </td>
                            <td>
                                <div class="more">
                                    <div class="view"><button class="view"><a href="<?= ROOT ?>/Moderator/Item/viewItem">view</a></button></div>
                                    &nbsp;&nbsp;<div class="delete"><button type="button" onclick="fun()"></button></div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </main>



    <div class="popupview hidden">
        <!-- <button class="closebtn">&times;</button> -->

        <div class="delete1">

            <!-- <form method="post" enctype="multipart/form-data" id=""> -->

            <h2>Do you want to delete this item template</h2>
        </div>
        <div class="actions">

            <button class="confirmbtn">Yes</button>
            <button class="closebtn1">No</button>
            <a href="<?= ROOT ?>/Moderator/Itemtemplate" style='display:none;' class="autoclick"></a>
        </div>



    </div>

    <div class="overlayview hidden"></div>





    <script src="<?= ROOT ?>/assets/js/Moderator/itemtemplate.js">
    </script>
</body>

</html>