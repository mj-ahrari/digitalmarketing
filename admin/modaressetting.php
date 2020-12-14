<?php
include_once('onload.php');
include_once('../class/setting2.php');
$setting2 = new setting2();
$result = $setting2->selectsetting();
$row = $result->fetch(PDO::FETCH_ASSOC)
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
<script src="../ckeditor/ckeditor.js"></script>

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
			@$err=$_GET['err'];
			if($err == 2020)
			{
				echo "<center><p class='registererr' style='color:#ff0000;'>پرکردن تمامی فیلدهای ستاره دار الزامی است</center></p><br />";
			}
			elseif($err==2025)
			{
				echo "<center><p style='color:green;' >عکس با موفقیت به روز رسانی شد.</center></p><br />";
            }
			?>
            	<form method="post" action="../checking/setting2.php" enctype="multipart/form-data">
                	<table cellpadding="5" cellspacing="2" style="border:solid 1px #ccc">
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس هدر صفحه شعبات<input type="file" name="picture" /></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="mhinsert" value="افزودن" id="pinsert" /></td>
                        </tr>
                        <tr>
                        <?php
                        
                        ?>
                            <td colspan="2"><img src="../<?php echo $row['modaresheader'] ?>" width="400px" height="100px" /> عکس فعلی               </td>
                        </tr>
                        <tr>
                            <td colspan="2">سایز عکس فرقی نمی کند ولی بهترین اندازه عرض 1330 و طول 400 پیکسل است.</td>
                        </tr>
                    </table>
                </form>
            </div><!--ٍEnd of content-body-->
    	</div>
	</div><!--ٍEnd of body_style-->
	<script>
	CKEDITOR.replace( 'editor1', {
    language: 'fa',
    uiColor: '#9AB8F3'
	});

	</script>
</body>
</html>
