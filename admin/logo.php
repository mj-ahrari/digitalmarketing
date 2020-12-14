<?php
include_once('onload.php');
include_once('../class/setting2.php');
$setting2 = new setting2();
$resfinal = $setting2->selectsetting();
if(isset($_POST['insert']))
{
	
				$finename = md5($_FILES['picture']['name'].microtime()).substr($_FILES['picture']['name'],-5,5);
				$path="../images/".$finename;
				$picture="images/".$finename;
				$move=move_uploaded_file($_FILES['picture']['tmp_name'],$path);
				if($move)
				{
					$rowunlinklogo=$resfinal->fetch(PDO::FETCH_ASSOC);
					unlink("../".$rowunlinklogo['logo']);
					$res=$setting2->updatelogo($picture);
					if($res)
					{
						header("location:logo.php?err=2025");
						exit;
					}
					else
					{
						header("location:logo.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:logo.php?err=2023");
					exit;	
				}

}
$i=1;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت لوگو</title>
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
            <h2>مدیریت لوگو</h2>
            <div id="content-body">
            	<div id="c-b-top">
                	<form method="post" action="" enctype="multipart/form-data">
                	<table cellpadding="5" cellspacing="2">
                        
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود لوگو : <input type="file" name="picture" />سایز عکس فرقی نمی کند ولی بهترین سایز عرض 210 و طول 70 پیکسل است.</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="insert" value="افزودن" id="pinsert" /></td>
                        </tr>
                    </table>
                </form>
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                            <td>تصویر</td>
                        </tr>
                        <?php 
						$row2=$resfinal->fetch(PDO::FETCH_ASSOC);
							?>
                            <tr>
                                <td><img width="210px" height="70px" src="../<?= $row2['logo'];?>"</td>
                            </tr>
                    </table>
                    <div id="userdetails">
                    
                    </div>
                </div>
                <div id="c-b-down">
                </div>
            </div><!--ٍEnd of content-body-->

    
	</div><!--ٍEnd of body_style-->
</body>
</html>
