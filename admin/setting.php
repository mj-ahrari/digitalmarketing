<?php
include_once('onload.php');
include_once('../class/setting.php');
$setting=new setting();
$err=0;
if(isset($_POST['submit']))
{
	$setting->insert($_POST['about'],$_POST['telegram'],$_POST['instagram'],$_POST['facebook'],$_POST['daftaraddr'],$_POST['daftarphone'],$_POST['daftarmobile'],$_POST['email']);
	$err=1;
}
$res=$setting->select();
$row=$res->fetch(PDO::FETCH_ASSOC);
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
			if($err==1)
			{
				echo "<center><p style='color:#00FF00'>به روزرسانی با موفقیت انجام گردید.</center></p><br />";
			}
			?>
            <form action="" method="post">
            	<table cellpadding="2" cellspacing="2">
                	<tr>
                    	<td colspan="3">متن درباره ما<br>
 <textarea name="about" class="textareasetting"><?=$row['about']?></textarea></td>
                    </tr>
                    <tr>
                    	<td>آدرس تلگرام <input type="text" name="telegram" value="<?=$row['telegram']?>" class="social" /></td>
                        <td>آدرس اینستاگرام <input type="text" name="instagram" value="<?=$row['instagram']?>" class="social" /></td>
                        <td>آدرس فیسبوک <input type="text" name="facebook" value="<?=$row['facebook']?>" class="social" /></td>
                    </tr>
                    <tr>
                    	<td colspan="3">آدرس دفتر<br>
 <textarea name="daftaraddr" class="textareasetting" ><?=$row['daftaraddr']?></textarea></td>
                    </tr>
                    <tr>
                    	<td>شماره تلفن دفتر <input type="text" name="daftarphone"  value="<?=$row['daftarphone']?>" class="social" /></td>
                        <td>شماره موبایل دفتر <input type="text" name="daftarmobile"  value="<?=$row['daftarmobile']?>" class="social" /></td>
                    </tr>
                    <tr>
                    	<td>آدرس ایمیل <input type="text" name="email"  value="<?=$row['email']?>" class="social" /></td>
                    </tr>
                     <tr>
                    	<td><input type="submit" name="submit"  value="به روز رسانی" class="settingupdate" /></td>
                    </tr>
                </table>
            </form>
            
            </div><!--ٍEnd of content-body-->

    
	</div><!--ٍEnd of body_style-->
</body>
</html>
