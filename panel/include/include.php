<?php
$myhost = "localhost";
$myuser = "rzy";
$mypass = "6y1MXi5qQM";
$mydb = "yuus";

$con = mysqli_connect($myhost, $myuser, $mypass, $mydb);


if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>