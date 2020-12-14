<?php
ob_start();
session_start(); 
include_once('class/magazine.php');
$magazine=new magazine();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
else
{
    header("location:index.php");
    exit;
}

$res=$magazine->selectmagazine($id);
$row=$res->fetch(PDO::FETCH_ASSOC);
$res2 = $magazine->selectAll();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی"/>
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , امورفیا"/>
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
<script src="dist/zoomify.js"></script>
<link rel="stylesheet" type="text/css" href="s/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="s/slick/slick-theme.css"/>





<title>مجله زیبایی</title>
</head>

<body>

	<div id="fullpage">

<?php include_once('template/header.php'); ?>
<?php include_once('template/topmenu.php'); ?>


         
        <div id="single">
        	<div id="single-product">
           		<div id="single-product-1">
                    <div id="single-title"> مجله زیبایی  - >  <?php echo $row['title'] ?></div>
                    <div id="single-body-2" style="float: right; direction: rtl; text-align: justify">
                    <IMG style="z-index:10;" SRC="<?php echo $row['picture'] ?>" id="myimage2" ALIGN="left" width="350px" height="400px" class="single-b-aks" /><?php echo html_entity_decode($row['details'])?>
					</div><!--End of singlebody-2-->
                </div>
            </div><!--End of single-product-->

            <div id="pishnahadatemortabet">
                <div id="single-title" style="margin-right:15px;"> پیشنهادات مرتبط</div>
                <div class="op-contain autoplay5" style="width:1050px">
            <?php
				while($row2 = $res2->fetch(PDO::FETCH_ASSOC))
				{
			 ?>
            	<div class="op-product">
                	<div class="op-p-1"><img src="<?php echo $row2['picture']; ?>" /></div>
                    <div class="op-p-2">
                    	<div class="op-p-2-l" ><a href="?id=<?php echo $row2['id'];?>">اطلاعات بیشتر</a></div>
                    </div>
                </div><!--End of op-product-->
        	<?php
				}
			?>
            </div><!--End of contain-->
            </div><!--pishnahadatemortabet-->
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
    <script>
	$('#myimage2').zoomify();
</script>
    <script type="text/javascript" src="s/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="s/slick/slick.min.js"></script>
<script type="text/javascript" src="s/js.js"></script>
</body>
</html>