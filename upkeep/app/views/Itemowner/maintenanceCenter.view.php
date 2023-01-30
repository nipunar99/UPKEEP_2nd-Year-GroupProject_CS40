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
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/public.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/Itemowner/maintenanceCenter.css">
    <link rel="stylesheet" href="styles.css">
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
                <a href="#" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>

                <a href="<?= ROOT ?>/itemowner/item">
                    <span class="material-icons-sharp">view_in_ar</span>
                    <h3>Item</h3>
                </a>

                <a href="#" >
                    <span class="material-icons-sharp">person</span>
                    <h3>Technician</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">forum</span>
                    <h3>Community</h3>
                </a>


                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Conversation</h3>
                    <span class="message-count">11</span>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">trending_up</span>
                    <h3>Statistics</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>

                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Log out</h3>
                </a>

            </div>
        </aside>

        <main class="main2">
            <div class="date">
                <p>14/11/2022</p>
            </div>

            <div class="tableView maintenanceUp">
                <h2>Upcomming Maintenance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Sub Component</th>
                            <th>Due date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td class="danger">07/02/2023</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tableView maintenanceMissed">
                <h2 class="danger">Overdue Maintenance</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Sub Component</th>
                            <th>Due date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td class="danger">07/02/2023</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Action</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="tableView maintenanceList">
                <h2>Maintenance Tasks List </h2>
                <table>
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Sub Component</th>
                            <th>Start Date</th>
                            <th>Time frame</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td>07/02/2023</td>
                            <td><span></span> <span>03 months</span> <span>10 days</span></td>
                            <td class="success">Active</td>
                            <td class="primary">Action</td>
                        </tr>
                        <tr>
                            <td>Cleaning the coils</td>
                            <td>Coils</td>
                            <td>07/02/2023</td>
                            <td><span></span> <span>03 months</span> <span>10 days</span></td>
                            <td class="success">Active</td>
                            <td class="primary">Action</td>
                        </tr>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td>07/02/2023</td>
                            <td><span></span> <span>03 months</span> <span>10 days</span></td>
                            <td class="success">Active</td>
                            <td class="primary">Action</td>
                        </tr>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td>07/02/2023</td>
                            <td><span></span> <span>03 months</span> <span>10 days</span></td>
                            <td class="success">Active</td>
                            <td class="primary">Action</td>
                        </tr>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td>07/02/2023</td>
                            <td><span></span> <span>03 months</span> <span>10 days</span></td>
                            <td class="success">Active</td>
                            <td class="primary">Action</td>
                        </tr>
                        <tr>
                            <td>AC air filter clean</td>
                            <td>Air filter</td>
                            <td>07/02/2023</td>
                            <td><span></span> <span>03 months</span> <span>10 days</span></td>
                            <td class="success">Active</td>
                            <td class="primary">Action</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </main>
        <!-- End of Main -->
    </div>
</body>
</html>