<?php
include 'panel/include/include.php';

error_reporting(0);
if (!isset($_SESSION)) { session_start(); }
if (isset($_SESSION['id'])) {
    header('Location: ?page=dashboard');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
<head>
	
<meta charset="utf-8" />
	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="panel/login/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="panel/login/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="panel/login/css/font.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
<link rel="stylesheet" href="panel/login/css/style.auth.css" id="theme-stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



</head><style>
a:link {
  color: white; 
  background-color: transparent; 
  text-decoration: none;
}
a:hover {
  color: pink;
  background-color: transparent;
  text-decoration: underline;
}
</style>
<body>
<div id="app" class="app login-page">
<div class="container d-flex align-items-center">
<div class="form-holder has-shadow">
<div class="row">
<div class="col-lg-6">
<div class="info d-flex align-items-center">
<div class="content">
<div class="logo">
<h1>Login</h1>
</div>
</div>
</div>
</div>

<div class="col-lg-6">
<div class="form d-flex align-items-center">
<div class="content">
<form class="form-validate mb-4" name="login" method="POST">
<div class="form-group">
<input type="text" class="input-material" name="username" id="username" data-msg="Please enter your username!" autocomplete="off" required value="">
<label for="username" class="label-material">Username</label>
</div>
<div class="form-group">
<input type="password" class="input-material" name="password" id="password" data-msg="Please enter your password!" autocomplete="off" required value="">
<label for="password" class="label-material">Password</label>
</div>
	
<!-- recaptcha -->

<button name="login" type="submit" class="btn btn-block btn-primary mt-3">Login</button>
<?php
    if(isset($_POST) && isset($_POST['username']) && isset($_POST['password'])) 
    {
        if (!isset($_SESSION)) 
        { 
            session_start(); 
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password))
        {
            echo '<script type="text/javascript">
                swal("", "Invalid username or password!", "error");
            /script>';
        }
        else
        {            	
            $result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '". mysqli_real_escape_string($con,$username) ."' " ) or die(mysqli_error($con));
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_array($result))
              	{
                    $stored_pass = md5(md5($row["salt"]).md5($password));
                    if($stored_pass != $row["password"])
                    {
                        echo '<script type="text/javascript">
                            swal("", "Invalid password!", "error");
                        </script>';
                    }
                    else
                    {
                        $_SESSION['id'] = $row["id"];
                         echo '<script type="text/javascript">
                            swal("Success", "Successfully logged in, youre gonna get redirected in few seconds!", "success");
                        </script>';

                        header('Location: ?page=dashboard');

                    }
                }
            }
            else{
            	echo '<script type="text/javascript">
                            swal("", "Invalid username!", "error");
                    </script>';
            }
        }
    }
?>
<button onclick="window.location.href='?page=register'" class="btn btn-block btn-primary mt-3">Register</button>
	<br>
	</form>
 	<div>
</div>
</div>
</div>
</div>
<div class="copyrights text-center">
<p>&copy; Rzy Industries, LLC Copyright - All Rights Reserved</p>
</div>
</div>
	<br>
<script src="panel/login/vendor/jquery/jquery.min.js"></script>
	<script src="panel/login/libs/jquery/jquery.min.html"></script>
	<script src="panel/login/scripts/bootstrap-auto-dismiss-alert.js"></script>
<script src="panel/login/vendor/popper.js/umd/popper.min.js"> </script>
<script src="panel/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="panel/login/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="panel/login/vendor/chart.js/Chart.min.js"></script>
<script src="panel/login/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="panel/login/js/front.js"></script>
