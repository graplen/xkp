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
                        <h4 class="page-title">Dashboard</h4> </div>

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
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h5 class="text-muted vb">YOUR ID</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php echo $_SESSION['id']?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                    <h5 class="text-muted vb">TOTAL REGISTERED</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger"><?php echo $var?></h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                    <h5 class="text-muted vb">CURRENTLY UNDETECTED</h5> </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h3 class="counter text-right m-t-15 text-danger">✓</h3> </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
               
                
                <!-- /.row -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Announcements</h3>
                            <div class="message-center">
                                <a href="#">
                                    <div class="mail-contnet">
                                    	<h5>RZY#2004</h5> <span class="mail-desc">Working on the website.</span> <span class="time">April 4, 2020</span> 
                                	</div>
                                </a>
                                <a href="#">
                                    <div class="mail-contnet">
                                    	<h5>RZY#2004</h5> <span class="mail-desc">Login and register page has been done today.</span> <span class="time">April 4, 2020</span> 
                                	</div>
                                </a>
                                <a href="#">
                                    <div class="mail-contnet">
                                    	<h5>RZY#2004</h5> <span class="mail-desc">Bought web host and domain name.</span> <span class="time">April 4, 2020</span> 
                                	</div>
                                </a>
                                <a href="#">
                                    <div class="mail-contnet">
                                    	<h5>RZY#2004</h5> <span class="mail-desc">Tested every SS TOOLS, and Yuu's is actually undetected.</span> <span class="time">March 31, 2020</span> 
                                	</div>
                                </a>
                                <a href="#">
                                    <div class="mail-contnet">
                                    	<h5>RZY#2004</h5> <span class="mail-desc">Rework has been started.</span> <span class="time">March 31, 2020</span> 
                                	</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Changelogs</h3>
                            <div class="message-center">
                                <a href="#">
                                    <div class="mail-contnet">
                                        <h5>Yuu's BETA 0.1</h5> <span class="mail-desc">+ Reach </br>+ Velocity</br>+ Autoclicker</br>+ wTAP</br>+ Login Page</br>+ Removed Detection</span> <span class="time">April 4, 2020</span> </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                </br>
                </br>
                <!-- /.row -->
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
