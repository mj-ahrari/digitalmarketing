<?php
include_once('onload.php');
if(!isset($_GET['dpid']))
{
    header("location:index.php");
    exit;
}
include_once('../class/customer.php');
include_once('../class/category.php');
include_once('../class/brand.php');
include_once('../class/product.php');
include_once('../class/functions.php');
$myfunc = new functions();
$pid = $myfunc->get_value($_GET['dpid']);
$product =new product();
$respu = $product->selectProduct($pid);
$rowpu = $respu->fetch(PDO::FETCH_ASSOC);
$category=new category();
$brand=new brand();
$resb1 = $brand->selectOne($rowpu['bid']);
$rowb1=$resb1->fetch(PDO::FETCH_ASSOC);
$resc1 = $category->selectOne($rowpu['cid']);
$rowc1=$resc1->fetch(PDO::FETCH_ASSOC);
$customer = new customer();
$res=$customer->select();
$i=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت محصولات</title>
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
            <h2> ویرایش محصول</h2>
            <div id="content-body">
            <?php
			@$err=$_GET['err'];
			if($err == 2020)
			{
				echo "<center><p class='registererr' style='color:#ff0000;'>پرکردن تمامی فیلدهای ستاره دار الزامی است</center></p><br />";
			}
			elseif($err==2025)
			{
				echo "<center><p style='color:green;' >محصول با موفقیت ویرایش گردید.</center></p><br />";
            }
            elseif($err==2035)
			{
				echo "<center><p style='color:green;' >عکس با موفقیت تغییر کرد.</center></p><br />";
			}
			?>
            	<form method="post" action="../checking/productinsert.php" enctype="multipart/form-data">
                	<table cellpadding="5" cellspacing="2">
                        <tr>
                        	<td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><input type="text" name="title" placeholder="عنوان محصول ..." id="ptitle" value="<?php echo $rowpu['title'] ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><textarea class="cke_rtl" placeholder="توضیحات محصول ..." name="details" id="editor1"><?php echo $rowpu['details']?></textarea></td>
                        </tr>
                        <tr>
                            <td><span style="color:#FF0000; font-size:30px;">*</span><input type="text" placeholder="قیمت ..." name="price" id="pprice" value="<?php echo $rowpu['price']?>" /> تومان</td>
                            <td><span style="color:#FF0000; font-size:30px;">*</span><input type="text" placeholder="گارانتی ..." name="garanti" id="pgaranti" value="<?php echo $rowpu['garanti']?>" /> روز</td>
                        </tr>
						<tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><input type="text" placeholder="کلمات کلیدی ..." name="keyword" id="pprice" value="<?php echo $rowpu['keywords']?>" /> کلمات کلیدی با , از هم جدا شوند.</td>
                        </tr>
                        <tr>
                            <td><span style="color:#FF0000; font-size:30px;">*</span>دسته : <select name="category">
                            <option value="<?=$rowc1['cid']?>"><?=$rowc1['title']?></option>
                                <?php
								
                                $res=$category->select();
								while($row=$res->fetch(PDO::FETCH_ASSOC))
								{
								?>
                            	<option value="<?=$row['cid']?>"><?=$row['title']?></option>
                                <?php
								}
								?>
                            </select></td>
                            <td><span style="color:#FF0000; font-size:30px;">*</span>برند : <select name="brand">
                            <option value="<?=$rowb1['id']?>"><?=$rowb1['title']?></option>
                                <?php
								$resb=$brand->select();
								while($rowb=$resb->fetch(PDO::FETCH_ASSOC))
								{
								?>
                            	<option value="<?=$rowb['id']?>"><?=$rowb['title']?></option>
                                <?php
								}
								?>
                            </select></td>
                        </tr>
                        <!--<tr>
                            <td>فروش ویژه : <input type="checkbox" name="special" /></td>
                            <td>پیشنهاد شگفت انگیز : <input type="checkbox" name="wonderfull" /></td>
                        </tr>-->
                        
                        <tr>
                            <td colspan="2"><input type="hidden" name="pid" value="<?php echo $pid; ?>" /><input type="submit" name="update" value="به روز رسانی" id="pinsert" /></td>
                        </tr>
                    </table>
                </form>
            </div><!--ٍEnd of content-body-->
            <h2> ویرایش تصویر محصول</h2>
            <span style="font-size:16px">تصویر فعلی</span></br>
            <img src="../<?php echo $rowpu['picture']?>" width="700px" height="200">
            <form method="post" action="../checking/productinsert.php" enctype="multipart/form-data">
                <table cellpadding="5" cellspacing="2">
                <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس جدید<input type="file" name="picture" /></td>
                </tr>
                <tr>
                            <td colspan="2"><input type="hidden" name="pid" value="<?php echo $pid; ?>" /><input style="width:150px" type="submit" name="pupdate" value="به روزرسانی تصویر" id="pinsert" /></td>
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
