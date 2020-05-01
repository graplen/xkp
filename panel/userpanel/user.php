<?php
include 'panel/include/include.php';
error_reporting(0);
if (!isset($_SESSION)) { session_start(); }
if (!isset($_SESSION['id'])) {
    header('Location: ?page=login');
exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Yuu's | User Panel </title>
    <link href="panel/userpanel/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="panel/userpanel/css/animate.css" rel="stylesheet">
    <link href="panel/userpanel/css/style.css" rel="stylesheet">
    <link href="panel/userpanel/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<?php

$registeredusers = mysqli_query($con, "SELECT  COUNT(*) as count FROM users");
while ($row = mysqli_fetch_array($registeredusers)) { $var = $row['count']; }



?>

<body>
    <!-- Preloader -->

    <div id="wrapper">
        <!-- Navigation -->

        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="?page=dashboard" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    <li>
                        <a href="?page=profile" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">Profile</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile</h4> </div>

                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        	<form method="POST">
                        		<button type="submit" name="logout" class="btn btn-danger pull-right m-l-20 btn-rounded btn-outline hidden-xs hidden-sm waves-effect waves-light">Logout</button>
                        	</form>

                        	<?php
								if(isset($_POST['logout'])){
									session_destroy();
                                    header('Location: ?page=login');
								}
			                ?>

                    
                    </div>
                    <!-- /.col-lg-12 -->
                </div>



                <!-- row -->
                <div class="row">
                    <!--col -->
                     <div class="col-md-8 col-xs-12">
                        <label class="page-title">Change your Password</label>
                        <div class="white-box">
                            <form name="update" method="POST" class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Current Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" id="password" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="newpassword" id="newpassword" class="form-control form-control-line"> </div>
                                        </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">New Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="newpassword2" id="newpassword2" class="form-control form-control-line"> </div>
                                        </div>
                                    
      
                     
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button name="update" type="submit" class="btn btn-success">Update Profile</button>
                                        <?php

                                        if(isset($_POST) && isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['newpassword2'])) 
                                        {
                                            if (!isset($_SESSION)) 
                                            { 
                                                session_start(); 
                                            }

                                            $password = $_POST['password'];
                                            $newpassword = $_POST['newpassword'];
                                            $newpassword2 = $_POST['newpassword2'];

                                            if($newpassword != $newpassword2)
                                            {
                                                echo '<script type="text/javascript">
                                                    swal("", "The second password does not match with the first one!", "error");
                                                </script>';
                                            }
                                            else
                                            {
                                                $id = $_SESSION['id'];
                                                $result = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '". mysqli_real_escape_string($con,$id) ."' " ) or die(mysqli_error($con));
                                                if ($result->num_rows > 0) {
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $oldpasswordencrypted = md5(md5($row["salt"]).md5($password));
                                                        $newpasswordencrypted = md5(md5($row["salt"]).md5($newpassword));
                                                        if($row["password"] != $oldpasswordencrypted)
                                                        {
                                                            echo '<script type="text/javascript">
                                                                swal("", "Current password does not match with our database!", "error");
                                                            </script>';
                                                        }
                                                        else
                                                        {
                                                            $updatepassword = mysqli_query($con, "UPDATE users set password='" . $newpasswordencrypted . "' WHERE id='" . $_SESSION['id'] . "'");
                                                            if($updatepassword){
                                                                echo '<script type="text/javascript">
                                                                    swal("Success", "Successfully edited your password!", "success");
                                                                </script>';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <!-- /.col -->
                </div>


					<div class="col-md-8 col-xs-12">
                        <label class="page-title"></br>Update your HWID</label>
                        <div class="white-box">
                            <form name="update" method="POST" class="form-horizontal form-material">
 
                                    <div class="form-group">
                                        <label class="col-md-12">New HWID</label>
                                        <div class="col-md-12">
                                            <input type="text" name="newhwid" id="newhwid" class="form-control form-control-line"> </div>
                                       </div>
                                    <div class="form-group">
                                    <label class="col-md-12">Your Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" id="password" class="form-control form-control-line"> </div>
                                    </div>
      
                     
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        
                                    	<?php
                                    		if (!isset($_SESSION)) 
                                            { 
                                                session_start(); 
                                            }
                                            $id = $_SESSION['id'];
                                            $result = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '". mysqli_real_escape_string($con,$id) ."' " ) or die(mysqli_error($con));
                                            if ($result->num_rows > 0) {
                                            	while($row = mysqli_fetch_array($result))
                                                {
                                                	if($row["rank"] == 1)
                                                	{
                                                		echo '<button name="update" type="submit" class="btn btn-success">Update Profile</button>';                                                	
                                                	}
                                                	elseif($row["rank"] == 0)
                                                	{
                                                		echo'<button name="update" type="submit" class="btn btn-success" disabled>Update Profile</button>';
                                                	}
                                                }
                                            }
                                    	?>
                                        
                                        


                                        <?php

                                        if(isset($_POST) && isset($_POST['password']) && isset($_POST['newhwid'])) 
                                        {
                                            if (!isset($_SESSION)) 
                                            { 
                                                session_start(); 
                                            }

                                            $password = $_POST['password'];
                                            $newhwid = $_POST['newhwid'];

                                            if(empty($newhwid) || empty($password))
                                            {
                                                echo '<script type="text/javascript">
                                                    swal("", "Fields cannot be empty!", "error");
                                                </script>';
                                            }
                                            else
                                            {

                                                $id = $_SESSION['id'];
                                                $result = mysqli_query($con, "SELECT * FROM `users` WHERE `id` = '". mysqli_real_escape_string($con,$id) ."' " ) or die(mysqli_error($con));
                                                if ($result->num_rows > 0) {
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $passwordencrypted = md5(md5($row["salt"]).md5($password));
                                                        if($row["password"] != $passwordencrypted)
                                                        {
                                                            echo '<script type="text/javascript">
                                                                swal("", "Password does not match with our database!", "error");
                                                            </script>';
                                                        }
                                                        else
                                                        {
                                                            $updatepassword = mysqli_query($con, "UPDATE users set hwid='" . $newhwid . "' WHERE id='" . $_SESSION['id'] . "'");
                                                            if($updatepassword){
                                                                echo '<script type="text/javascript">
                                                                    swal("Success", "Successfully edited your HWID!", "success");
                                                                </script>';
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center">&copy; Rzy Industries, LLC Copyright - All Rights Reserved</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>        

    <!-- /#wrapper -->
    <!-- jQuery -->
    <!-- Bootstrap Core JavaScript -->
    <script src="panel/userpanel/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <!--slimscroll JavaScript -->
    <script src="panel/userpanel/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="panel/userpanel/js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="panel/userpanel/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="panel/userpanel/plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="panel/userpanel/js/custom.min.js"></script>
    <script src="panel/userpanel/js/dashboard1.js"></script>
    <script src="panel/userpanel/plugins/bower_components/toast-master/js/jquery.toast.js"></script>

</body>

</html>
