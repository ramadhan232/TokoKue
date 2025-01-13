<header id="header" class="header-scroll top-header headrom headerBg">
    <!-- .navbar -->
    <nav class="navbar navbar-dark navbar-pink">
        <div class="container">
            <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
            <a class="navbar-brand" href="index.php"> TokoKue </a>
            <div class="collapse navbar-toggleable-md float-lg-right" id="mainNavbarCollapse">
                <ul class="nav navbar-nav">
                    <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link active" href="jenis kue.php">Jenis Kue<span class="sr-only"></span></a> </li>
                    <?php
                    if (empty($_SESSION["user_id"])) {
                        echo '
                            <li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
                            <li class="nav-item"><a href="registration.php" class="nav-link active bgGreen">Signup</a> </li>';
                    } else {
                        echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
                        echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.navbar -->
</header>

<style type="text/css">
    /* Navbar Styling */
    .navbar-pink {
        background-color: #ff66b2; /* Pink background */
        border-bottom: 3px solid #ff3385; /* Darker pink border */
    }

    .navbar-pink .navbar-brand {
        font-size: 24px;
        font-weight: bold;
        color: white;
    }

    .navbar-pink .navbar-brand:hover {
        color: #ff3385; /* Darker pink on hover */
    }

    .navbar-pink .nav-link {
        color: white;
        font-size: 16px;
        font-weight: 600;
        transition: color 0.3s ease;
    }

    .navbar-pink .nav-link:hover {
        color: #ff3385; /* Pink on hover */
    }

    .navbar-pink .nav-item.active {
        background-color: #ff3385; /* Active link background */
        border-radius: 5px;
    }

    .navbar-pink .nav-item.active a {
        color: white; /* White text for active link */
    }

    .navbar-pink .navbar-toggler {
        border-color: #ff3385; /* Pink toggle button border */
    }

    .navbar-pink .navbar-toggler-icon {
        background-color: #ff3385; /* Pink hamburger icon */
    }

    /* Mobile responsive styling */
    @media (max-width: 768px) {
        .navbar-pink .navbar-toggler-icon {
            background-color: white; /* White icon for mobile */
        }
    }
</style>
