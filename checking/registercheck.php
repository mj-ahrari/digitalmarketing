<?php
ob_start();
include_once('../class/functions.php');
include_once('../class/customer.php');
?>
<meta content="text/html" http-equiv="content-type" charset="utf-8" />
<?php
if(!isset($_POST['regsubmit']))
{
	header("location:../register.php");
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
		$mail=$func->post_value($_POST['mail']);
		$password=$func->post_value($_POST['password']);
		$accept=$func->post_value($_POST['accept']);
		if($mail==="" || $password==="")
		{
			header("location:../register.php?err=2020");
			exit;
		}
		if($accept!=="accept")
		{
			header("location:../register.php?err=2030");
			exit;
		}
		$res=$customer->selectOne($mail);
		$num=$res->rowCount();
		if($num > 0)
		{
			header("location:../register.php?err=2021");
			exit;
		}
		$password=$func->passhash($password);
		$register=$customer->insert($mail,$password);
		if($register===true)
		{
			header("location:../register.php?err=2022");
			exit;
		}
	}
	else
	{
		header("location:../register.php?err=4141");
		exit;
	} 
}
else
{
	header("location:../register.php?err=4141");
	exit;
}
?>