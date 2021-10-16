<?php

session_start();

if(isset($_SESSION['id']))
{
	unset($_SESSION['id']);

}

header("Location:login.php");

die;


//session_start();

//session_unset();
//session_destroy();

//header("Location: login.php");
