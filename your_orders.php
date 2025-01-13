<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="#">
        <title>My Orders</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="footer.css" rel="stylesheet">
        <style type="text/css" rel="stylesheet">
    /* General Styling */
    body {
        background-color: #f7f7f7;
        font-family: 'Arial', sans-serif;
    }

    .inner-page-hero {
        background-color: #f8d4e3; /* Soft pink background */
    }

    .btn {
        border-radius: 25px;
        font-weight: bold;
    }

    .btn-info {
        background-color: #ff69b4;
        border-color: #ff69b4;
    }

    .btn-info:hover {
        background-color: #ff4c9d;
        border-color: #ff4c9d;
    }

    .btn-warning {
        background-color: #ffb6c1;
        border-color: #ffb6c1;
    }

    .btn-warning:hover {
        background-color: #ff99b2;
        border-color: #ff99b2;
    }

    .btn-success {
        background-color: #ff66b2;
        border-color: #ff66b2;
    }

    .btn-success:hover {
        background-color: #ff3385;
        border-color: #ff3385;
    }

    .btn-danger {
        background-color: #ff4d77;
        border-color: #ff4d77;
    }

    .btn-danger:hover {
        background-color: #ff1a58;
        border-color: #ff1a58;
    }

    /* Table Styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
    }

    tr:nth-of-type(odd) {
        background-color: #fce4ec; /* Light pink for alternating rows */
    }

    th {
        background-color: #e91e63; /* Pink color */
        color: white;
        font-weight: bold;
    }

    td,
    th {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
        font-size: 14px;
    }

    /* Responsive Styling */
    @media only screen and (max-width: 768px) {
        table {
            width: 100%;
        }

        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
        }

        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
            content: attr(data-column);
            color: #000;
            font-weight: bold;
        }
    }
</style>
    </head>

    <body>

        <!--header starts-->
        <?php include("includes/navbar.php") ?>
        <!-- header end -->

        <div class="page-wrapper">
            <!-- top Links -->

            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            <div class="inner-page-hero bg-image" data-image-src="images/kue.jpeg">
                <div class="container"> </div>
                <!-- end:Container -->
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row">


                    </div>
                </div>
            </div>
            <!-- //results show -->
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">

                                    <table>
                                        <thead>
                                            <tr>

                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>price</th>
                                                <th>status</th>
                                                <th>Date</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>



                                            <?php
                                            $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
                                            if (!mysqli_num_rows($query_res) > 0) {
                                                echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                                            } else {
                                                while ($row = mysqli_fetch_array($query_res)) {

                                            ?>
                                                    <tr>
                                                        <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                        <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                        <td data-column="price">Rp.<?php echo $row['price']; ?></td>
                                                        <td data-column="status">
                                                            <?php
                                                            $status = $row['status'];
                                                            if ($status == "" or $status == "NULL") {
                                                            ?>
                                                                <button type="button" class="btn btn-info" style="font-weight:bold;">Lagi Dibuat</button>
                                                            <?php
                                                            }
                                                            if ($status == "in process") {
                                                            ?>
                                                                <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>Lagi di Jalan</button>
                                                            <?php
                                                            }
                                                            if ($status == "closed") {
                                                            ?>
                                                                <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true">Sudah di antar</button>
                                                            <?php
                                                            }
                                                            ?>
                                                            <?php
                                                            if ($status == "rejected") {
                                                            ?>
                                                                <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>dibatalkan</button>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                        <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Apakah kamu benar benar ingin membatalkannya?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> </td>
                                                    </tr>


                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end:row -->
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <!-- Featured restaurants ends -->



        <!-- FOOTER SECTION ----------------------- -->
        <?php include("includes/footer.php"); ?>
        <!-- FOOTER SECTION END----------------- -->

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
    </body>

</html>
<?php
}
?>