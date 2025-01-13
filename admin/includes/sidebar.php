<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Sidebar Background and Text Colors */
        .left-sidebar {
            background-color: #ffe6f2 !important; /* Soft pink background */
        }

        .sidebar-nav ul li a {
            color: #ff69b4 !important; /* Hot pink text */
        }

        .sidebar-nav ul li a:hover {
            background-color: #ffccdd !important; /* Lighter pink hover effect */
            color: #ff1493 !important; /* Deep pink on hover */
        }

        .sidebar-nav ul li a .fa {
            color: #ff69b4 !important; /* Pink icons */
        }

        .sidebar-nav ul li.nav-label {
            color: #ff1493 !important; /* Deep pink for labels */
            font-weight: bold;
        }

        .sidebar-nav ul li a.has-arrow {
            font-weight: bold;
            color: #ff69b4 !important;
        }

        .sidebar-nav ul li a.has-arrow .fa {
            color: #ff1493 !important; /* Deep pink arrow icons */
        }

        /* Collapsed Menu */
        .sidebar-nav ul.collapse li a {
            color: #ff69b4 !important;
        }

        .sidebar-nav ul.collapse li a:hover {
            background-color: #ffb6c1 !important; /* Soft pink highlight */
            color: #ff1493 !important;
        }

        /* Divider */
        .nav-devider {
            border-top: 2px solid #ff69b4;
            margin: 15px 0;
        }
    </style>
</head>
<body>
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Dashboard</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li style="font-size: 20px; font-weight: 700px; color: pink;"><a href="dashboard.php" style="font-size: 20px, W">Dashboard</a></li>
                    </ul>
                </li>
                <li class="nav-label">Log</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"> <span><i class="fa fa-user f-s-20 "></i></span><span class="hide-menu">Users</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="allusers.php">All Users</a></li>
                        <li><a href="add_users.php">Add Users</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Jenis Kue</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="allrestraunt.php">Semua Jenis Kuet</a></li>
                        <li><a href="add_restraunt.php">Tambah Jenis Kue</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-cutlery" aria-hidden="true"></i><span class="hide-menu">Menu Kue</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="all_menu.php">Semua Menu Kue</a></li>
                        <li><a href="add_menu.php">Tambah Menu Kue</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="hide-menu">Orders</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="all_orders.php">All Orders</a></li>
                    </ul>
                </li>
                <!-- New Profit Button -->
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-money-bill" aria-hidden="true"></i><span class="hide-menu">Profit</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="profit.php">Profit</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
 
</body>
</html>