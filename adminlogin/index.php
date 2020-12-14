<?php
session_start();
ob_start();
$err=0;

if(isset($_POST['submit']))
{
	include_once('../class/functions.php');
	include_once('../class/adminlogin.php');
	$func=new functions();
	if(isset($_POST['g-recaptcha-response']))
	{
		$secret = '6Le_oqsUAAAAAAK25DUCzdpCo31ehKFLUKQrGtWW';
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success == true)
		{
			
			$adminlogin=new adminlogin();
			$email=$func->post_value($_POST['email']);
			$password=$func->post_value($_POST['password']);
			$password=$func->passhash($password);
			if($email == "" || $password == "")
			{
				$err = 2020;
			}
			else
			{
				$res=$adminlogin->select($email,$password);
				if($res->rowCount()>0)
				{
					$_SESSION['admin']=$email;
					header("location:../admin/index.php");
					exit;
				}
				else
				{
					$err=2021;
				}
			}
		}
		else
		{
			$err = 4141;
		}
	}
	else
	{
		$err = 5151;
	}
}
?>
<!DOCTYPE HTML>
<html dir="ltr" lang="en-US">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<title>ورود به پنل مدیریت</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
 <!--[if (gte IE 6)&(lte IE 8)]>
		<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="selectivizr.js"></script>
		<noscript><link rel="stylesheet" href="fallback.css" /></noscript>
	<![endif]-->
	</head>
	<body>
    <?php
	if($err==2020)
	{
		echo "<center><p class='registererr'>پر کردن تمامی فیلدها الزامی است.</center></p><br />";
	}
	elseif($err==2021)
	{
		echo "<center><p class='registererr'>مشخصات وارد شده صحیح نمی باشد</center></p><br />";
	}
	elseif($err==4141)
	{
		echo "<center><p class='registererr'>لطفا کپچا را وارد  کنید.</center></p><br />";
	}
	elseif($err==5151)
	{
		echo "<center><p class='registererr'>لطفا کپچا را وارد  کنید.</center></p><br />";
	}
	?>
		<div id="container">
			<form action="" method="post">
				<div class="login">ورود به حساب</div>
				<div class="username-text">: آدرس ایمیل</div>
				<div class="password-text">: رمز عبور</div>
				<div class="username-field">
					<input type="text" name="email" placeholder="Email..." />
				</div>
				<div class="password-field">
					<input type="password" name="password" placeholder="Password..." />
				</div>
				<div class="g-recaptcha" style="margin-left:85px;" data-sitekey="6Le_oqsUAAAAAKhHgBXnBno2Ykf9Nn3AQWeXgJIk"></div>
				<input type="submit" name="submit" value="ورود" />
				
			</form>
		</div>
		
	</body>
</html>
