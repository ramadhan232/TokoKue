<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
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
    <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Dashboard</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        /* Pink-themed Cards */
.card {
    background-color: #ffccdd !important; /* Soft pink background */
    border: none;
    border-radius: 10px;
}

.card .media-left span i {
    color: #ff69b4; /* Hot pink icons */
}

.card .media-body h2 {
    color: #ff1493 !important; /* Deep pink text for numbers */
}

.card .media-body p {
    color: #ff69b4 !important; /* Hot pink for labels */
}

/* Buttons */
.btn-primary {
    background-color: #ff69b4 !important; /* Hot pink button */
    border-color: #ff1493 !important; /* Deep pink border */
    color: #fff !important;
}

.btn-primary:hover {
    background-color: #ff1493 !important; /* Deep pink on hover */
    border-color: #ff69b4 !important;
}

/* Input Fields */
input.form-control {
    border: 1px solid #ff69b4;
    border-radius: 5px;
}

input.form-control:focus {
    border-color: #ff1493;
    box-shadow: 0 0 5px #ff69b4;
}

    </style>
</head>

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <?php include("includes/header.php"); ?>
        <?php include("includes/sidebar.php"); ?>
        <div class="page-wrapper" style="height:1200px;">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(255,255,0);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="allrestraunt.php"><span><i class="fa fa-archive f-s-40" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700"><?php $sql = "select * from jenis_kue";
                                                                                $result = mysqli_query($db, $sql);
                                                                                $rws = mysqli_num_rows($result);
                                                                                echo $rws; ?></h2>
                                    <p class="m-b-0" style="color: white;">Jenis Kue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(0, 188, 136);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="all_menu.php"><span><i class="fa fa-cutlery f-s-40" aria-hidden="true" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700"><?php $sql = "select * from kue";
                                                                                $result = mysqli_query($db, $sql);
                                                                                $rws = mysqli_num_rows($result);
                                                                                echo $rws; ?></h2>
                                    <p class="m-b-0" style="color: white;">kue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(0,0,255);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="allusers.php"><span><i class="fa fa-user f-s-40 " style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700"><?php $sql = "select * from users";
                                                                                $result = mysqli_query($db, $sql);
                                                                                $rws = mysqli_num_rows($result);
                                                                                echo $rws; ?></h2>
                                    <p class="m-b-0" style="color: white;">Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30" style="background: rgb(255,0,0);">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <a href="all_orders.php"><span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true" style="color: white;"></i></span></a>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 style="color: white; font-weight: 700"><?php $sql = "select * from users_orders";
                                                                                $result = mysqli_query($db, $sql);
                                                                                $rws = mysqli_num_rows($result);
                                                                                echo $rws; ?></h2>
                                    <p class="m-b-0" style="color: white;">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="card p-30" style="background: rgb(128,0,128);">
          <div class="media">
            <div class="media-left meida media-middle">
              <a href="profit.php"><span><i class="fa fa-money-bill f-s-40" aria-hidden="true" style="color: white;"></i></span></a>
            </div>
            <div class="media-body media-text-right">
              <h2 style="color: white; font-weight: 700">Laba</h2>
              <p class="m-b-0" style="color: white;">Hitung Keuntungan</p>
            </div>
          </div>
        </div>
      </div>
      <!--Other divs here-->
    </div>
  </div>
                <div id="profitFeatureContainer" style="display: none;">
                    <div id="react-profit-feature"></div>
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
    <!-- React and ReactDOM CDN -->
    <script src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <!-- Babel for JSX transformation -->
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script type="text/babel">
        // React component
        function ProfitFeature() {
            const [capital, setCapital] = React.useState(0);
            const [newCapital, setNewCapital] = React.useState('');
            const [revenue, setRevenue] = React.useState(0);
            const [cost, setCost] = React.useState(0);
            const [profit, setProfit] = React.useState(0);
            const [startDate, setStartDate] = React.useState('');
            const [endDate, setEndDate] = React.useState('');

            const updateCapital = async () => {
                try {
                    const response = await fetch('calculate_profit.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `setCapital=1&capital=${newCapital}`,
                    });
                    const data = await response.json();
                    if (data.success) {
                        setCapital(parseFloat(newCapital));
                        setNewCapital('');
                    }
                } catch (error) {
                    console.error('Error updating capital:', error);
                }
            };

            const calculateProfit = async () => {
                try {
                    const response = await fetch('calculate_profit.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `getProfit=1&startDate=${startDate}&endDate=${endDate}`,
                    });
                    const data = await response.json();
                    setCapital(data.capital);
                    setRevenue(data.revenue);
                    setCost(data.cost);
                    setProfit(data.profit);
                } catch (error) {
                    console.error('Error calculating profit:', error);
                }
            };

            return (
                <div className="card p-6">
                    <h2 className="text-2xl font-bold mb-4">Restaurant Finance Calculator</h2>
                    <div className="mb-4">
                        <h3 className="text-xl font-semibold mb-2">Modal Awal</h3>
                        <div className="flex gap-4">
                            <input
                                type="number"
                                value={newCapital}
                                onChange={(e) => setNewCapital(e.target.value)}
                                placeholder="Enter initial capital"
                                className="form-control"
                            />
                            <button onClick={updateCapital} className="btn btn-primary">Perbarui Capital</button>
                        </div>
                    </div>
                    <div className="mb-4">
                        <h3 className="text-xl font-semibold mb-2">Menghitung Profit</h3>
                        <div className="flex gap-4 mb-4">
                            <input
                                type="date"
                                value={startDate}
                                onChange={(e) => setStartDate(e.target.value)}
                                placeholder="Start Date"
                                className="form-control"
                            />
                            <input
                                type="date"
                                value={endDate}
                                onChange={(e) => setEndDate(e.target.value)}
                                placeholder="End Date"
                                className="form-control"
                            />
                        </div>
                        <button onClick={calculateProfit} className="btn btn-primary">Hitung</button>
                    </div>
                    <div className="mt-4">
                        <h3 className="text-xl font-semibold mb-2">Ringkasan Keuangan</h3>
                        <p className="text-lg">Modal Lancar: ${capital.toFixed(2)}</p>
                        <p className="text-lg">Total Pendapatan: ${revenue.toFixed(2)}</p>
                        <p className="text-lg">Total Biaya: ${cost.toFixed(2)}</p>
                        <p className="text-lg">Profit: ${profit.toFixed(2)}</p>
                    </div>
                </div>
            );
        }

        // Render the React component
        ReactDOM.render(<ProfitFeature />, document.getElementById('react-profit-feature'));

        // Toggle profit feature visibility
        document.getElementById('profitButton').addEventListener('click', function(e) {
            e.preventDefault();
            const container = document.getElementById('profitFeatureContainer');
            container.style.display = container.style.display === 'none' ? 'block' : 'none';
        });
    </script>
</body>

</html>
<?php
}
?>