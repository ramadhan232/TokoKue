<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
include_once 'product-action.php';
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Toko BoluBerry</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/footer.css" rel="stylesheet">
    <style type="text/css">
    /* Navbar Pink Theme */
    .navbar {
        background-color: #ff66b2; /* Pink navbar */
        border-bottom: 3px solid #ff3385; /* Darker pink border */
    }

    .navbar .navbar-brand, .navbar .nav-link {
        color: white; /* White text */
    }

    .navbar .nav-link:hover {
        color: #ff3385; /* Dark pink hover effect */
    }

    .navbar .nav-item.active {
        background-color: #ff3385;
        border-radius: 5px;
    }

    .navbar .nav-item.active a {
        color: white;
    }

    /* Food Item Card */
    .food-item {
        border: 1px solid #ff3385; /* Pink border */
        margin-bottom: 20px;
        padding: 15px;
        background-color: #fff5f8; /* Light pink background */
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .food-item h6 a {
        color: #ff3385; /* Pink color for titles */
    }

    .food-item p {
        color: #666;
    }

    .food-item .price {
        color: #ff3385; /* Pink price color */
        font-weight: bold;
    }

    .food-item .ctaBtn {
        background-color: #ff3385; /* Pink Add to Cart button */
        color: white;
    }

    .food-item .ctaBtn:hover {
        background-color: #e60073; /* Darker pink on hover */
    }

    /* Shopping Cart */
    .widget-cart {
        background-color: #fff5f8; /* Light pink background */
        border: 1px solid #ff3385; /* Pink border */
        padding: 15px;
        border-radius: 8px;
    }

    .widget-cart .widget-heading h3 {
        color: #ff3385; /* Pink heading */
    }

    .widget-cart .price-wrap {
        background-color: #ff3385; /* Pink total section background */
        color: white;
        padding: 20px;
        text-align: center;
    }

    .widget-cart .price-wrap h3.value {
        font-size: 20px;
        font-weight: bold;
    }

    .widget-cart .price-wrap p {
        font-size: 16px;
    }

    .widget-cart .btn {
        background-color: #ff3385; /* Pink checkout button */
        color: white;
    }

    .widget-cart .btn:hover {
        background-color: #e60073; /* Darker pink on hover */
    }

    /* Links (Breadcrumb, etc.) */
    .breadcrumb a {
        color: #ff3385; /* Pink links */
    }

    .breadcrumb a:hover {
        color: #e60073; /* Darker pink on hover */
    }

    /* Footer Section */
    .footerSection {
        background-color: #ff66b2; /* Pink footer background */
        color: white;
        padding: 30px 0;
    }

    .footerSection .footerLogoDiv span {
        color: #fff;
        font-size: 24px;
        font-weight: bold;
    }

    .footerSection .footerIntro p {
        color: #fff;
        font-size: 16px;
    }

    .footerSection .footContactDetails .info {
        color: #fff;
        font-size: 14px;
    }

    .footerSection .footContactDetails .info .iconDiv {
        color: #ff3385; /* Pink icons */
    }

    .footerSection .footContactDetails .info span {
        color: #fff;
    }

    /* Button Styling */
    .btn.theme-btn {
        background-color: #ff3385; /* Pink button */
        color: white;
        padding: 12px 30px;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn.theme-btn:hover {
        background-color: #e60073; /* Darker pink hover */
    }
</style>
</head>
<body>
    <!--header starts-->
    <?php include("includes/navbar.php") ?>
    <!-- header end -->
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="jenis kue.php">Choose Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="makanan.php?res_id=<?php echo $_GET['res_id']; ?>">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                </ul>
            </div>
        </div>
        <?php $ress = mysqli_query($db, "select * from jenis_kue where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);
        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/restoran_image.">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Restaurant logo">'; ?></figure>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                <p><?php echo $rows['address']; ?></p>
                                <ul class="nav nav-inline">
                                    <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min Rp.30000</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i> 30 min</a> </li>
                                    <li class="nav-item ratings">
                                        <a class="nav-link" href="#" style="color: yellow;">
                                            <span>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end:Inner page hero -->
        <div class="breadcrumb">
            <div class="container">
            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Your Shopping Cart
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                                    <div class="title-row">
                                        <?php echo $item["title"]; ?><a href="makanan.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                            <i class="fa fa-trash pull-right"></i></a>
                                    </div>
                                    <div class="form-group row no-gutter">
                                        <div class="col-xs-8">
                                            <input type="text" class="form-control b-r-0" value=<?php echo "Rp." . $item["price"]; ?> readonly id="exampleSelect1">
                                        </div>
                                        <div class="col-xs-4">
                                            <input class="form-control" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        </div>
                                    </div>
                                <?php
                                    $item_total += ($item["price"] * $item["quantity"]);
                                }
                                ?>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>TOTAL</p>
                                <h3 class="value"><strong><?php echo "Rp." . $item_total; ?></strong></h3>
                                <p>Free Shipping</p>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check" class="btn theme-btn btn-lg">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

                    <!-- end:Widget menu -->
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                POPULAR ORDERS Delicious hot food! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php
                            $stmt = $db->prepare("select * from kue where rs_id='$_GET[res_id]'");
                            $stmt->execute();
                            $products = $stmt->get_result();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                            ?>
                                    <div class="food-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-8">
                                                <form method="post" action='makanan.php?res_id=<?php echo $_GET['res_id']; ?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                                    <div class="rest-logo pull-left">
                                                        <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo">'; ?></a>
                                                    </div>
                                                    <!-- end:Logo -->
                                                    <div class="rest-descr">
                                                        <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                        <p> <?php echo $product['slogan']; ?></p>
                                                    </div>
                                                    <!-- end:Description -->
                                            </div>
                                            <!-- end:col -->
                                            <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                                <span class="price pull-left">Rp.<?php echo $product['price']; ?></span>
                                                <input class="b-r-0" type="text" name="quantity" style="margin-left:20px;" value="1" size="2" />
                                                <input type="submit" class="btn theme-btn ctaBtn" style="margin-top:20px; background: rgb(255, 176, 231); color: white;" value="Add to Cart" />
                                            </div>
                                            </form>
                                        </div>
                                        <!-- end:row -->
                                    </div>
                                    <!-- end:Food item -->
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <!-- end:Collapse -->
                    </div>
                    <!-- end:Widget menu -->

                </div>
            </div>
            <!-- end:row -->
        </div>
        <!-- end:Container -->
        <!-- Featured restaurants ends -->
        <!-- FOOTER SECTION ----------------------- -->
        <?php include("includes/footer.php"); ?>
        <!-- FOOTER SECTION END----------------- -->
    </div>
    <!-- end:page wrapper -->
    </div>
    <!--/end:Site wrapper -->
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