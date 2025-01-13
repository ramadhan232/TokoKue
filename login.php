<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <style>
    body {
      background-image: url('images/loginn.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      color: #444444;
      font-family: "Poppins", sans-serif;
    }

    .form-containerr {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .form {
      background-color: #ffe6f1;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 100%;
      max-width: 400px;
    }

    h2 {
      text-align: center;
      color: #ff6699;
      margin-bottom: 20px;
      font-size: 28px;
      font-weight: 600;
    }

    .form-control {
      border: 2px solid #ff99b3;
      border-radius: 5px;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #ff6699;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #ff6699;
      border: none;
      color: #fff;
      font-size: 16px;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #ff3366;
    }

    .regis {
      text-align: center;
      margin-top: 20px;
      color: #777;
    }

    .regis a {
      color: #ff6699;
      text-decoration: none;
    }

    .regis a:hover {
      text-decoration: underline;
    }

    span {
      display: block;
      text-align: center;
      margin: 10px 0;
    }
  </style>
</head>

<body>
  <?php
  include("connection/connect.php");
  error_reporting(0);
  session_start();
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_POST["submit"])) {
      $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'";
      $result = mysqli_query($db, $loginquery);
      $row = mysqli_fetch_array($result);
      if (is_array($row)) {
        $_SESSION["random_id"] = rand();
        $_SESSION["user_id"] = $row['u_id'];
        header("refresh:1;url=index.php");
      } else {
        $message = "Invalid Username or Password!";
      }
    }
  }
  ?>

  <div class="form-containerr">
    <div class="form">
      <h2>LOGIN FORM</h2>
      <span style="color:red;"><?php echo $message; ?></span>
      <span style="color:green;"><?php echo $success; ?></span>
      <form action="" method="post">
        <div class="form-group">
          <input class="form-control" type="text" placeholder="Username" name="username" />
        </div>
        <div class="form-group">
          <input class="form-control" type="password" placeholder="Password" name="password" />
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-block" type="submit" name="submit" value="Login">Login</button>
        </div>
      </form>
      <div class="regis">Not registered?<a href="registration.php"> Create an account</a></div>
    </div>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
