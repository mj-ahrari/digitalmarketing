<?php
include_once('onload.php');
include_once('../class/magazine.php');
$magazine = new magazine();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>افزودن مجله</title>
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
            <h2>ایجاد مجله</h2>
            <div id="content-body">
            <?php
			@$err=$_GET['err'];
			if($err == 2020)
			{
				echo "<center><p class='registererr' style='color:#ff0000;'>پرکردن تمامی فیلدهای ستاره دار الزامی است</center></p><br />";
			}
			elseif($err==2025)
			{
				echo "<center><p style='color:green;' >مجله با موفقیت ایجاد گردید.</center></p><br />";
			}
			?>
            	<form method="post" action="../checking/magazine.php" enctype="multipart/form-data">
                	<table cellpadding="5" cellspacing="2">
                        <tr>
                        	<td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><input type="text" name="title" placeholder="عنوان مجله..." id="ptitle"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:18px;">*قسمت توضیحات</span><textarea class="cke_rtl" placeholder="توضیحات مجله..." name="details" id="editor1"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس : <input type="file" name="picture" />سایز عکس فرقی نمی کند ولی بهترین اندازه عرض 350 و طول 400 پیکسل است.</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="minsert" value="افزودن" id="minsert" /></td>
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
