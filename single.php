<?php
ob_start();
session_start(); 
include_once('class/product.php');
include_once('class/category.php');
include_once('class/brand.php');
include_once('class/basket.php');
$product=new product();
$category=new category();
$brand=new brand();
$basket=new basket();
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
}
else
{
    header("location:index.php");
    exit;
}

$res=$product->selectProduct($pid);
$row=$res->fetch(PDO::FETCH_ASSOC);
$res25=$category->selectOne($row['cid']);
$row25=$res25->fetch(PDO::FETCH_ASSOC);
$res26=$brand->selectOne($row['bid']);
$row26=$res26->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $row['title'] ?>"/>
<meta name="keywords" content="<?php echo $row['keywords'] ?>"/>
<script src="js/jsmobile.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="sliderengine/amazingslider-1.css">
<link rel="stylesheet" type="text/css" href="css/jquery.verySimpleImageViewer.css">
<script src="sliderengine/jquery.js"></script>
<script src="sliderengine/amazingslider.js"></script>
<script src="sliderengine/initslider-1.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="css/demo.css">
<script src="js/jquery.scrollbox.js"></script>
<script src="js/jquery.verySimpleImageViewer.js"></script>





<title>امورفیا</title>
</head>

<body>

	<div id="fullpage">

<?php include_once('template/header.php'); ?>
<?php include_once('template/topmenu.php'); ?>


         
        <div id="single">
        	<div id="single-product">
           		<div id="single-product-1">
                    <div id="single-title"> فروشگاه امورفیا  - >  <?php echo $row['title'] ?></div>
                    <div id="single-body">
						<div id="single-product-top">
							<div id="imageViewerContainer">
							<script>
								$("#imageViewerContainer").verySimpleImageViewer({
									imageSource: "<?php echo $row['picture'] ?>",
									//frame: ['100%', '100%'],
									maxZoom: '900%',
									zoomFactor: '10%',
									mouse: true,
									toolbar: true,
								});
							</script>
							</div>
                            <div id="single-product-top-l"><br />
<span style="font-size:20px; color:#FFFFFF; background-color:#FF69B4; padding:5px 100px 5px 100px; background-color:#FF69B4; border-radius:5px;"><?php echo $row['title'] ?></span><br /><br />
    برند: <?php echo $row26['title'] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;دسته بندی: <?php echo $row25['title'] ?><br /><br />
    شرکت امورفیا<br />
<br />
ارسال به تمامی نقاط ایران از طریق پست<br />
<br />
    <span style="color:#FF0033; font-size:24px;">قیمت: <?php echo $row['price'] ?>تومان</span><br /><br />
    <form method="post" name="" action="checking/add2cartcheck.php">
    <input type="hidden" name="hiddenpid" value="<?php echo $row['id'] ?>" />
    <input type="submit" value="افزودن به سبد خرید" id="add2cartbtn" name="add2cartbtn"/></form><br />
    گارانتی محصول: این محصول دارای گارانتی <?php echo $row['garanti'] ?> روزه می باشد.</div>
                        </div>
                        <div id="single-product-down" style="direction:rtl; text-align:justify"><span style="font-size:20px; border-bottom:dashed 1px #FF0000; padding:4px; direction:rtl; text-align:justify">توضیحات محصول:</span><br /><br /> <?php echo html_entity_decode($row['details']); ?>.</div>
                    </div><!--End of singlebody-->
                </div>
            </div><!--End of single-product-->
        </div><!--End of single-->
		<div id="footer">
        
        	<div id="foo-1">
            	<div id="foo-1-1"><div id="foo-1-1-matn">بازگشت به بالا</div></div>
                <div id="foo-1-2">
                	<div id="foo-1-2-r">تحویل فوری</div>
                    <div id="foo-1-2-c">ضمانت اصل بودن</div>
                    <div id="foo-1-2-l">پرداخت در محل</div>
                </div>
            </div><!--End of foo-1-->
            <?php include_once('template/foo-23.php'); ?>
        
        </div><!--End of fullpage-->	
    </div><!--End of fullpage-->
    
</body>
</html>