<?php
ob_start();
session_start();
include_once('../class/functions.php');
include_once('../class/customer.php');
?>
<meta content="text/html" http-equiv="content-type" charset="utf-8" />
<?php
if(!isset($_POST['submit']))
{
	header("location:../login.php");
	exit;
}
$func=new functions();
if(isset($_POST['g-recaptcha-response']))
{
	$secret = '6Le_oqsUAAAAAAK25DUCzdpCo31ehKFLUKQrGtWW';
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);
	if($responseData->success == true)
	{
		$customer=new customer();
		$email=$func->post_value($_POST['email']);
		$password=$func->post_value($_POST['password']);

		if($email==="" || $password==="")
		{
			header("location:../login.php?err=2020");
			exit;
		}
		$password=$func->passhash($password);
		$res=$customer->selectcustomer($email,$password);
		$num=$res->rowCount();
		if($num === 0)
		{
			header("location:../login.php?err=2021");
			exit;
		}
		else
		{
			$_SESSION['user']=$email;
			header("location:../index.php");
			exit;
		}
	}
	else
	{
		header("location:../login.php?err=4141");
		exit;
	}
}
?>