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
                    <input type="search" name="" id="txtHint" placeholder="Search item" onkeyup="myFunction()">
                    <span class="material-icons-sharp">search</span>
                </div>
                <a href="<?= ROOT ?>/Moderator/Additemtemplate"><button class="addItem">Add An Item Template</button></a>
                <!-- <div class="dropdown">
                
                <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                 <div id="myDropdown" class="dropdown-content"> 
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <button class="#item_type">Item Type</button>
                    <button class="#category">Category</button>
                    <button class="#status">Status</button>
                    </div> -->
                <!-- </div>  -->
                <!-- <div class="dropdown">
                <button onclick="myFunction1()" class="dropbtn">Filter</button>
                <select id="myDropdown" class="dropdown-content" name="filter">
                    <optgroup label="Category"></optgroup> -->

                <!-- <option value="option2">Status</option> -->
                <!-- <optgroup label="Status">
                        <option value="nested-option1">Pending</option>
                        <option value="nested-option2">Approved</option>
                    </optgroup> -->
                <!-- <option value="option3">Option 3</option> -->
                <!-- </select> -->
            </div>


            <!-- </div> -->

            <div class="item-details">


                <div class="insight">
                    <div class="itemTemplateList" >
                        <table id="templateTable">
                            <thead>

                                <!-- <tr> -->
                                <!-- <th>Item</th> -->
                                <th  onclick="sortTable(0)">Item</th>
                                <th class="category"  onclick="sortTable(1)">Item Type
                                <!-- <select name="category" id="category"> -->
                                    <!-- <optgroup label="status"> -->
                                        <!-- <option value="Status">Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option> -->
                                    <!-- </optgroup> -->
                                         </th>
                                <th  onclick="sortTable(2)">Status<select name="status" id="status">
                                    <!-- <optgroup label="status"> -->
                                        <!-- <option value="Status">Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="approved">Approved</option> -->
                                    <!-- </optgroup> -->
                                <!-- </select>  -->
                                
                                    <!-- <div class="dropdown-content">
                                    <a href="#">Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
                                    </div> -->
                                </th>
                                <th  class="description">Description</th>
                                <!-- <select class="table-filter" onchange="filter_rows()">
                                            <option value="all"></option>
                                         </select> -->
                                <th>Action</th>
                                <!--  -->
                                <!-- <th>Esti.lifespan</th> -->
                                <!-- </tr> -->
                            </thead>
                            <tbody>

                              
                                        <tr>
                                            <!-- <td><input type="checkbox" name="name1" /></td> -->
                                            <td class="template_name">
                                                <div class="image"><img src="<?= ROOT ?>/assets/images/uploads/2.png"></div>
                                                <div class="name">new</div>
                                            </td>
                                            <td>abc</td>
                                            <!-- <td class="category"><?= $row->category ?></td> -->
                                            <td class="status">pending</td>
                                            <td>btre </td>
                                            <td>
                                                <div class="more">
                                                    <div class="view"><button><a href="<?= ROOT ?>/Moderator/Item/viewItem/28"><span class="material-icons-sharp">view_list</span></a></button></div>&nbsp;&nbsp;<div class="delete"><button><span class="material-icons-sharp">delete</span></button></div>
                                                </div>
                                            </td>
                                        </tr>
                                   
</tbody>

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
    <script src="<?= ROOT ?>/assets/js/Moderator/itemtemplate.js">
        // window.onload = () => {
        //     console.log(document.querySelector("#templlateTable > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
        // };

        // getUniqueValuesFromColumn()
    </script>
</body>

</html>