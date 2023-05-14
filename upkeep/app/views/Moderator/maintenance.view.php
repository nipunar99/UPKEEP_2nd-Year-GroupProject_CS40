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
        <div class="header nbs">
                <div class="left">

                </div>
                <div class="center">
                    <h1>Maintenances</h1>
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

            <div class="insight">
                
                    <!-- <div class="name">name</div> -->
                    <button id="deleteButton" name="deleteButton" style="display: none;" class="del"><span>Delete</span></button>
                    <span> <div class="subcategory"><button>Add maintenance task </button></div></span>
                    <div class="temp_id">
                    <input type="hidden" name="task_ID" id="rowid-input">
                    </div>
                    <div class="table">
                        <table id="categoryTable">
                            <thead>
                                <tr>
                                    <th></th> 
                                    <th class="hidden_id"></th>      
                                    <th>Sub component</th>
                                    <th>Description</th>
                                    <!-- <th>Time Frame</th> -->
                                    <th>Time Frame</th>
                                    <th class="action">Action</th>

                                </tr>
                            </thead>
                            <tbody class="category">
                            
                                <tr>
                                    <td><input type="checkbox" name="task_ID[]" class="item_id" id="myCheckbox" onchange="toggleDeleteButton()"></td>
                                    <td class="hidden_id" id="task_ID"></td>
                                    <!-- <td ><img src="<?= ROOT ?>/assets/images/profile-1.jpg" alt=""> </td> -->    
                                    
                                    
                                    <td id="subcomponent">gfrt</td>
                                    <td id="C_description">gfrt</td>
                                    <td id="time_frame">6</td>
                                    <td>  <!-- display:flex; flex-direction:row;justify-content:center;align-items:center; -->
                                        <div class="btn-container">
                                            <button class="edit-maintenance"><span>edit</span></button>
                                        </div>
                                    </td>
                                </tr>

                                   
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- <a href="#3">Sub Component 3</a> -->
               
              
            </div>

            <!-- popupviews -->
            <div class="popupview hidden" id="add-maintenance" >
            <button class="closebtn closebtn1">&times;</button>
            
            <div class="content content1">
                
            <form method="post" enctype="multipart/form-data" id="popup-form1">
                    <h2>Maintenance Details</h2>
                    <div class="itemDetails">
                        <input type="hidden" name="item_template_id" id="rowid-input">
                        <div class="input-box">
                            <span class="details">Sub Component</span>
                            <input type="text" name="sub_component" id="sub_component" required placeholder="Enter Sub component">
                            <small></small>
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea rows="3" cols="90" name="description" id="description" required placeholder="Enter maintenance task"></textarea>
                            <small></small>
                        </div>

                        
                        <div class="input-box">
                            <span class="details">Sub Component Image</span>
                            <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="Enter Image">
                        </div>

                        <h2>Time frame</h2>
                        
                        <div class="middleInput">
                            
                            <div class="input-box">
                                <span class="details">Yearly</span>
                                <input type="number" min="0" max="10" name="years" id="years"  placeholder="Years">
                                <small></small>                                
                            </div>


                            <div class="input-box">
                                <span class="details">Monthly</span>
                                <input type="number" min="0" max="12" name="months" id="months"  placeholder="Months">
                                <small></small>                                
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Weekly</span>
                                <input type="number" min="0" max="4" name="weeks" id="weeks"  placeholder="Weeks"> 
                                <small></small>                               
                            </div>
                            <div class="input-box">
                                <span class="details">Status</span>
                                <select name="status" id="status"></select>
                                <small></small>
                            </div>
            
                        </div>
                        
                      
                        
                        <div class="button">
                            <input type="submit" value="Add a Maintenance" id="addMaintenancebtn"> 
                            
                        </div>
                        
                    </div>
                </form>
                
            </div>
        </div>
        
        

        <div class="popupview hidden" id="update-maintenance">
            <button class="closebtn closebtn2">&times;</button>
            
            <div class="content content1">
                
            <form id="popup-form2" method="post" action="#" class="fm">
                    <h2>Update Maintenance Details</h2>
                    <div class="itemDetails">
                    <!-- <input type="hidden" name="operation" value=" 'update'"> -->
                    <input type="hidden" name="task_ID" id="rowid_input1">
                    <input type="hidden" name="item_template_id" id="rowid-input2">
                        <div class="input-box">
                            <span class="details">Sub Component</span>
                            <input type="text" name="sub_component" id="Sub_component" required placeholder="Enter Sub component">
                            <small></small>
                        </div>
                        
                        <div class="input-box">
                            <span class="details">Description</span>
                            <textarea rows="3" cols="100" name="description" id="Description" required placeholder="Enter maintenance task"></textarea>
                            <small></small>
                        </div>

                        <div class="input-box">
                            <span class="details">Sub Component Image</span>
                            <input type="file" class = "imgInput" name="image" id="upfile"  placeholder="Enter Image">
                        </div>

                        <h2>Time frame</h2>
                        
                        <div class="middleInput">
                            
                            <div class="input-box">
                                <span class="details">Yearly</span>
                                <input type="number" min="0" max="10" name="years" id="Years"  placeholder="Years">
                                <small></small>                                
                            </div>


                            <div class="input-box">
                                <span class="details">Monthly</span>
                                <input type="number" min="0" max="12" name="months" id="Months"  placeholder="Months">
                                <small></small>                                
                            </div>
                            
                            <div class="input-box">
                                <span class="details">Weekly</span>
                                <input type="number" min="0" max="4" name="weeks" id="Weeks"  placeholder="Weeks">
                                <small></small>                                
                            </div>
                            <div class="input-box">
                                <span class="details">Status</span>
                                <select name="status" id="Status"></select>
                                <small></small>
                            </div>
            
                        </div>
                        
                      
                        
                        <div class="button">
                            <input type="submit" value="Update Maintenance" id="updateMaintenancebtn"> 
                            
                        </div>
                        
                    </div>
                </form>
                
            </div>
        </div> 
        
          <div class="overlayview hidden" id="overlay"></div>

            <script>
                const ROOT = "<?=ROOT?>";
            </script>
            <script src="<?= ROOT ?>/assets/js/Moderator/maintenances.js">
            </script>
                    
</body>

</html>