<?php
include_once('onload.php');
include_once('../class/adminlogin.php');
include_once('../class/functions.php');
$func=new functions();
$adminlogin=new adminlogin();
$err=0;
if(isset($_POST['submit']))
{
	$oldpass=$_POST['oldpass'];
	$newpass=$_POST['newpass'];
	$newpassagain=$_POST['newpassagain'];
	if($oldpass=="" || $newpass=="" || $newpassagain=="")
	{
		$err=2;
	}
	else
	{
		$res2=$adminlogin->selectpass($_SESSION['admin']);
		$row2=$res2->fetch(PDO::FETCH_ASSOC);
		$checkpass=$func->passhash($oldpass);
		if($row2['password'] === $checkpass)
		{
			if($newpass != $newpassagain)
			{
				$err=4;
			}
			else
			{
				$passmain=$func->passhash($newpass);
				$res3 = $adminlogin->update($_SESSION['admin'],$passmain);
				$err=5;
			}
		}
		else
		{
			$err=3;
		}
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>تنظیمات</title>
<link type="text/css" rel="stylesheet" href="style.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.flot.js"></script>
<script type="text/javascript" src="doc.js"></script>
<script type="text/javascript" src="js.js"></script>
</head>
<body>

	<div class="body_style">

        <div class="menu">
        <a href="#" class="logo"></a>
        </div>
        <?php include_once("template/rightmenu.php");?>
        <div class="content">
            <?php include_once("template/topmenu.php");?>
            <h2>تنظیمات</h2>
            <div id="content-body">
            <?php
			if($err==2)
			{
				echo "<center><p style='color:#FF0000'>پرکردن تمامی فیلدها الزامی است.</center></p><br />";
			}
			elseif($err==3)
			{
				echo "<center><p style='color:#FF0000'>پسورد وارد شده اشتباه است.</center></p><br />";
			}
			elseif($err==4)
			{
				echo "<center><p style='color:#FF0000'>پسوردهای وارد شده یکسان نمی باشند.</center></p><br />";
			}
			elseif($err==5)
			{
				echo "<center><p style='color:#00FF00'>پسورد با موفقیت تغییر یافت.</center></p><br />";
			}
			?>
            <form action="" method="post">
            	<table cellpadding="2" cellspacing="2">
                    <tr>
                    	<td>پسورد قدیم <input type="password" name="oldpass"  class="social" /></td>
                        <td>پسورد جدید <input type="password" name="newpass"  class="social" /></td>
                        <td>تکرار پسورد جدید <input type="password" name="newpassagain"  class="social" /></td>
                    </tr>
                     <tr>
                    	<td colspan="3"><input type="submit" name="submit"  value="تغییر پسورد" class="settingupdate" /></td>
                    </tr>
                </table>
            </form>
            
            </div><!--ٍEnd of content-body-->

    
	</div><!--ٍEnd of body_style-->
</body>
</html>
