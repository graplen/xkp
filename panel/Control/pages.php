<?php

function redirection($page)
{
	header('Location: ?page='.$page);
	exit();
}

if(isset($_GET['page']))
{
	switch($_GET['page'])
	{
	    case 'login':
	        include_once('panel/login/login.php');
	        $page_title = 'Yuu\'s - Login';
	        break;
	    case 'register':
	        include_once('panel/login/register.php');
	        $page_title = 'Yuu\'s - Login';
	        break;
	    case 'dashboard':
	   	 	include_once('panel/userpanel/index.php');
	   	 	$page_title = 'Yuu\'s - User Panel';
	   	 	break;
	    case 'profile':
	   	 	include_once('panel/userpanel/user.php');
	   	 	$page_title = 'Yuu\'s - User Panel';
	   	 	break;
	    default:
	        redirection('login');
	        $page_title = 'Yuu\'s - Login';
	}
}
else{
redirection('login');
}


?>