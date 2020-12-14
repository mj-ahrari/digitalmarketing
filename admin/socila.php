<?php
include_once('onload.php');

include_once('../class/setting3.php');
include_once('../class/functions.php');
$myfunc = new functions();
$setting3 = new setting3();
$respu = $setting3->select();
$rowpu = $respu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت تصاویر شبکه های مجازی</title>
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
            <?php
			@$err=$_GET['err'];
            if($err==2035)
			{
				echo "<center><p style='color:green;' >عکس با موفقیت تغییر کرد.</center></p><br />";
			}
			?>
            <h2>ویرایش تصویر تلگرام</h2>
            <span style="font-size:16px">تصویر فعلی</span></br>
            <img src="../<?php echo $rowpu['telegram']?>" width="200px" height="200">
            <form method="post" action="../checking/setting3.php" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="2">
                <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس جدید<input type="file" name="picture" /></td>
                </tr>
                <tr>
                            <td colspan="2"><input style="width:150px" type="submit" name="tupdate" value="به روزرسانی تصویر" id="pinsert" /></td>
                        </tr>
                </table>
            </form>
    	</div>
		<div class="content">
            
            <h2>ویرایش تصویر اینستاگرام</h2>
            <span style="font-size:16px">تصویر فعلی</span></br>
            <img src="../<?php echo $rowpu['instagram']?>" width="200px" height="200">
            <form method="post" action="../checking/setting3.php" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="2">
                <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس جدید<input type="file" name="picture" /></td>
                </tr>
                <tr>
                            <td colspan="2"><input style="width:150px" type="submit" name="iupdate" value="به روزرسانی تصویر" id="pinsert" /></td>
                        </tr>
                </table>
            </form>
    	</div>
		<div class="content">
            
            <h2>ویرایش تصویر فیسبوک</h2>
            <span style="font-size:16px">تصویر فعلی</span></br>
            <img src="../<?php echo $rowpu['facebook']?>" width="200px" height="200">
            <form method="post" action="../checking/setting3.php" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="2">
                <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس جدید<input type="file" name="picture" /></td>
                </tr>
                <tr>
                            <td colspan="2"><input style="width:150px" type="submit" name="fupdate" value="به روزرسانی تصویر" id="pinsert" /></td>
                        </tr>
                </table>
            </form>
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
