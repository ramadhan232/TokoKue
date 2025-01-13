<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();




if (isset($_POST['submit'])) {



    if (empty($_POST['c_name']) || empty($_POST['res_name']) || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['url'] == '' || $_POST['o_hr'] == '' || $_POST['c_hr'] == '' || $_POST['o_days'] == '' || $_POST['address'] == '') {
        $error = '<div class="alert alert-danger alert-dismissible fade show">
		    			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    			<strong>All fields Must be Fillup!</strong>
		    		</div>';
    } else {

        $fname = $_FILES['file']['name'];
        $temp = $_FILES['file']['tmp_name'];
        $fsize = $_FILES['file']['size'];
        $extension = explode('.', $fname);
        $extension = strtolower(end($extension));
        $fnew = uniqid() . '.' . $extension;
        $store = "Res_img/" . basename($fnew);

        if ($extension == 'jpg' || $extension == 'png' || $extension == 'gif') {
            if ($fsize >= 1000000) {
                $error = '<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Max Image Size is 1024kb!</strong> Try different Image.
									</div>';
            } else {
                $res_name = $_POST['res_name'];

                $sql = "INSERT INTO restaurant(c_id,title,email,phone,url,o_hr,c_hr,o_days,address,image) VALUE('" . $_POST['c_name'] . "','" . $res_name . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['url'] . "','" . $_POST['o_hr'] . "','" . $_POST['c_hr'] . "','" . $_POST['o_days'] . "','" . $_POST['address'] . "','" . $fnew . "')";
                mysqli_query($db, $sql);
                move_uploaded_file($temp, $store);

                $success = '<div class="alert alert-success alert-dismissible fade show">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<strong>Congrass!</strong> New Restaurant Added Successfully.
										</div>';
            }
        } elseif ($extension == '') {
            $error = '<div class="alert alert-danger alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>select image</strong>
								</div>';
        } else {

            $error = '<div class="alert alert-danger alert-dismissible fade show">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>invalid extension!</strong>png, jpg, Gif are accepted.
								</div>';
        }
    }
}


?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
    body {
        background-color: #fff0f5; /* Pink muda lembut untuk latar belakang */
        font-family: 'Arial', sans-serif;
    }

    .btn-success {
        background-color: #ff69b4 !important; /* Tombol dengan warna pink cerah */
        border-color: #ff69b4 !important;
        color: white;
    }

    .btn-success:hover {
        background-color: #ff1493 !important; /* Pink lebih gelap saat hover */
    }

    .btn-warning {
        background-color: #ffc0cb !important; /* Tombol dengan warna pink muda */
        border-color: #ffc0cb !important;
        color: white;
    }

    .btn-warning:hover {
        background-color: #ffb6c1 !important; /* Pink lebih cerah saat hover */
    }

    .card {
        border-radius: 10px; /* Membuat kartu menjadi lebih halus */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Memberikan efek bayangan */
    }

    .card-header {
        background-color: #ff69b4 !important; /* Pink cerah untuk header kartu */
        color: white !important;
        font-weight: bold;
    }

    .form-control {
        border: 1px solid #ff69b4; /* Border input pink */
        border-radius: 5px; /* Membuat sudut lebih lembut */
    }

    .form-control:focus {
        border-color: #ff1493; /* Pink lebih gelap saat fokus */
        box-shadow: 0 0 8px #ff1493; /* Efek bayangan fokus */
    }

    .form-actions {
        text-align: right; /* Tombol berada di sebelah kanan */
    }

    h4.m-b-0 {
        font-size: 1.5rem;
        letter-spacing: 1px;
    }

    textarea.form-control {
        resize: none; /* Mencegah pengguna mengubah ukuran */
    }

    select.form-control {
        background-color: #fff5f7; /* Latar belakang dropdown pink muda */
    }

    /* Breadcrumb styling */
    .page-titles {
        background-color: #ffe4e1;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .page-titles h3 {
        color: #ff69b4;
        font-weight: bold;
    }
</style>
</head>

<body class="fix-header">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- Pembungkus Utama -->
    <div id="main-wrapper">
        <!-- Mulai Header -->
        <?php include("includes/header.php"); ?>
        <!-- Akhir Header -->
        <!-- Mulai Sidebar Kiri -->
        <?php include("includes/sidebar.php"); ?>
        <!-- Akhir Sidebar Kiri -->
        <!-- Pembungkus Halaman -->
        <div class="page-wrapper" style="height:1200px;">
            <!-- Breadcrumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dasbor</h3>
                </div>
            </div>
            <!-- Akhir Breadcrumb -->
            <!-- Kontainer Utama -->
            <div class="container-fluid">
                <!-- Mulai Konten Halaman -->


                <?php

                echo $error;
                echo $success;
                ?>
                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header" style="background: rgb(0, 128, 0);">
                            <h4 class="m-b-0 text-white">Tambah Jenis kue</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">

                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama jenis kue</label>
                                                <input type="text" name="res_name" class="form-control" placeholder="Nama Jenis kue">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Email Bisnis</label>
                                                <input type="text" name="email" class="form-control form-control-danger" placeholder="contoh@gmail.com">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Telepon</label>
                                                <input type="text" name="phone" class="form-control" placeholder="62-(xxx)-xxx-xxx">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">URL Situs Web</label>
                                                <input type="text" name="url" class="form-control form-control-danger" placeholder="http://contoh.com">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Jam Buka</label>
                                                <select name="o_hr" class="form-control custom-select" data-placeholder="Pilih Jam">
                                                    <option>--Pilih Jam Buka--</option>
                                                    <option value="6am">6 pagi</option>
                                                    <option value="7am">7 pagi</option>
                                                    <option value="8am">8 pagi</option>
                                                    <option value="9am">9 pagi</option>
                                                    <option value="10am">10 pagi</option>
                                                    <option value="11am">11 pagi</option>
                                                    <option value="24hours">24 jam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Jam Tutup</label>
                                                <select name="c_hr" class="form-control custom-select" data-placeholder="Pilih Jam">
                                                    <option>--Pilih Jam Tutup--</option>
                                                    <option value="3pm">3 sore</option>
                                                    <option value="4pm">4 sore</option>
                                                    <option value="5pm">5 sore</option>
                                                    <option value="6pm">6 sore</option>
                                                    <option value="7pm">7 sore</option>
                                                    <option value="24hours">24 jam</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Hari Buka</label>
                                                <select name="o_days" class="form-control custom-select" data-placeholder="Pilih Hari" tabindex="1">
                                                    <option>--Pilih Hari--</option>
                                                    <option value="mon-tue">Senin-Selasa</option>
                                                    <option value="mon-wed">Senin-Rabu</option>
                                                    <option value="mon-thu">Senin-Kamis</option>
                                                    <option value="mon-fri">Senin-Jumat</option>
                                                    <option value="mon-sat">Senin-Sabtu</option>
                                                    <option value="every-day">Setiap Hari</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Gambar</label>
                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                            </div>
                                        </div>
                                        <!--/span-->

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="control-label">Pilih Kategori</label>
                                                <select name="c_name" class="form-control custom-select" data-placeholder="Pilih Kategori" tabindex="1">
                                                    <option>--Pilih Kategori--</option>
                                                    <?php $ssql = "select * from res_category";
                                                    $res = mysqli_query($db, $ssql);
                                                    while ($row = mysqli_fetch_array($res)) {
                                                        echo ' <option value="' . $row['c_id'] . '">' . $row['c_name'] . '</option>';;
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                    <h3 class="box-title m-t-40">Alamat</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="form-group">
                                                <textarea name="address" type="text" style="height:100px;" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!--/span-->
                                </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-success" value="Simpan" style="background: rgb(0, 188, 126);">
                            <a href="dashboard.php" class="btn btn-warning">Batal</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Akhir Konten Halaman -->
    </div>

    </div>
    <!-- Akhir Pembungkus Halaman -->
    </div>
    <!-- Akhir Pembungkus Utama -->
    <!-- Semua Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>
