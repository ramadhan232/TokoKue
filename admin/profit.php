<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (empty($_SESSION["adm_id"])) {
    header('location:index.php');
} else {
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Hitung Keuntungan</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            background-color: #ffe6f2;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #d63384;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #d63384;
            border-color: #d63384;
        }
        .btn-primary:hover {
            background-color: #c21874;
            border-color: #c21874;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        label {
            color: #d63384;
            font-weight: bold;
        }
        .form-control {
            border-radius: 10px;
        }
        #printableArea {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
    </style>
</head>

<body class="fix-header fix-sidebar">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>
        <div class="page-wrapper">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hitung Keuntungan</h3>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Hitung Keuntungan</h4>
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <label>Modal Awal</label>
                                        <input type="number" name="initial_capital" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tanggal Akhir</label>
                                        <input type="date" name="end_date" class="form-control" required>
                                    </div>
                                    <button type="submit" name="calculate" class="btn btn-primary">Hitung Keuntungan</button>
                                </form>
                                <?php
                                if (isset($_POST['calculate'])) {
                                    $initial_capital = isset($_POST['initial_capital']) ? floatval($_POST['initial_capital']) : 0;
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];

                                    $revenue_query = "SELECT SUM(price) as total_revenue FROM users_orders WHERE date BETWEEN '$start_date' AND '$end_date'";
                                    $revenue_result = mysqli_query($db, $revenue_query);
                                    $revenue_row = mysqli_fetch_assoc($revenue_result);
                                    $total_revenue = $revenue_row['total_revenue'] ?? 0;

                                    $total_cost = $total_revenue * 0.6;
                                    $profit = $total_revenue - $total_cost;
                                    $total_profit = $initial_capital + $profit;

                                    echo "<div id='printableArea'>";
                                    echo "<h3 class='mt-4'>Laporan Keuntungan</h3>";
                                    echo "<p>Periode: " . date('d/m/Y', strtotime($start_date)) . " - " . date('d/m/Y', strtotime($end_date)) . "</p>";
                                    echo "<p>Modal Awal: Rp " . number_format($initial_capital, 2, ',', '.') . "</p>";
                                    echo "<p>Total Pendapatan: Rp " . number_format($total_revenue, 2, ',', '.') . "</p>";
                                    echo "<p>Total Biaya: Rp " . number_format($total_cost, 2, ',', '.') . "</p>";
                                    echo "<p>Keuntungan: Rp " . number_format($profit, 2, ',', '.') . "</p>";
                                    echo "<p>Total Keuntungan (termasuk modal awal): Rp " . number_format($total_profit, 2, ',', '.') . "</p>";
                                    echo "</div>";

                                    echo "<div class='mt-3'>";
                                    echo "<button onclick='printReport()' class='btn btn-primary me-2'>Cetak Laporan</button>";
                                    echo "<button onclick='resetReport()' class='btn btn-secondary'>Reset Laporan</button>";
                                    echo "</div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script>
        function printReport() {
            const printContents = document.getElementById('printableArea').innerHTML;
            const originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }

        function resetReport() {
            document.getElementById('printableArea').innerHTML = '';
            const buttons = document.querySelector('.mt-3');
            if (buttons) {
                buttons.remove();
            }
        }
    </script>
</body>
</html>
<?php
}
?>

