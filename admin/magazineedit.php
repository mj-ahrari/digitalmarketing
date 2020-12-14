<?php
include_once('onload.php');
if(!isset($_GET['eid']))
{
    header("location:index.php");
    exit;
}
include_once('../class/magazine.php');
include_once('../class/functions.php');
$myfunc = new functions();
$id = $myfunc->get_value($_GET['eid']);
$magazine =new magazine();
$respu = $magazine->selectmagazine($id);
$rowpu = $respu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت مجلات</title>
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
            <h2> ویرایش مجله</h2>
            <div id="content-body">
            <?php
			@$err=$_GET['err'];
			if($err == 2020)
			{
				echo "<center><p class='registererr' style='color:#ff0000;'>پرکردن تمامی فیلدهای ستاره دار الزامی است</center></p><br />";
			}
			elseif($err==2025)
			{
				echo "<center><p style='color:green;' >مجله با موفقیت ویرایش شد.</center></p><br />";
            }
            elseif($err==2035)
			{
				echo "<center><p style='color:green;' >عکس با موفقیت تغییر کرد.</center></p><br />";
			}
			?>
            	<form method="post" action="../checking/magazine.php" enctype="multipart/form-data">
                	<table cellpadding="5" cellspacing="2">
                        <tr>
                        	<td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><input type="text" name="title" id="ptitle" value="<?php echo $rowpu['title'] ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><textarea class="cke_rtl" name="details" id="editor1"><?php echo $rowpu['details']?></textarea></td>
                        </tr>
                        
						
                       
             
                        
                        <tr>
                            <td colspan="2"><input type="hidden" name="eid" value="<?php echo $id; ?>" /><input type="submit" name="update" value="به روز رسانی" id="pinsert" /></td>
                        </tr>
                    </table>
                </form>
            </div><!--ٍEnd of content-body-->
            <h2>ویرایش تصویر مجله</h2>
            <span style="font-size:16px">تصویر فعلی</span></br>
            <img src="../<?php echo $rowpu['picture']?>" width="200px" height="200">
            <form method="post" action="../checking/magazine.php" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="2">
                <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس جدید<input type="file" name="picture" /></td>
                </tr>
                <tr>
                            <td colspan="2"><input type="hidden" name="eid" value="<?php echo $id; ?>" /><input style="width:150px" type="submit" name="pupdate" value="به روزرسانی تصویر" id="pinsert" /></td>
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
