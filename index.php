<?php
ob_start();
session_start();
include_once('class/setting3.php');
$setting31=new setting3();
$resse31=$setting31->select();
$rowse31 = $resse31->fetch(PDO::FETCH_ASSOC);
include_once('class/product.php');
include_once('class/category.php');
include_once('class/brand.php');
$indexcat=new category();
$indexbrand=new brand();
$product=new Product;


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
<script src="sliderengine/jquery.js"></script>
<script src="sliderengine/amazingslider.js"></script>
<script src="sliderengine/initslider-1.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<link rel="stylesheet" type="text/css" href="css/demo.css">
<script src="js/jquery.scrollbox.js"></script>
<link rel="stylesheet" type="text/css" href="s/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="s/slick/slick-theme.css"/>

<title>امورفیا</title>
</head>

<body>

	<div id="fullpage">
    
<?php include_once('template/header.php'); ?>	
<?php include_once('template/topmenu.php'); ?>
<?php include_once('template/slider.php'); ?>
<?php include_once('template/brand.php'); ?>
<?php //include_once('template/special.php'); ?>

<div class="otherproducts">
        	<div class="op-title">پرفروش ترین ها</div>
			<div class="porforushhiddenbox">
				<ul>
				<?php
				$resindexbrand2=$indexbrand->select();
				while($rowindexbrand2 = $resindexbrand2->fetch(PDO::FETCH_ASSOC))
				{
				?>
					<li><a href="brand.php?bid=<?php echo $rowindexbrand2['id']; ?>"><?php echo $rowindexbrand2['title']?></a></li>
				<?php
				}
				?>
				</ul>
			</div>
			<div style="float:right; height:35px;line-height:30px;background-color:#7cff00;border-top-left-radius:5px;"><img class="porforushhiddenboxclick" style="float:right; padding-top:5px; ba" src="images/menu.png" /></div>
            <div  class="op-contain autoplay3" style="direction:ltr;">
            <?php 
			$resproductporforush=$product->selectporforush();
			while($rowproductporforush=$resproductporforush->fetch(PDO::FETCH_ASSOC)) { ?>
            	<div class="op-product">
                	<div class="op-p-1"><img src="<?php echo $rowproductporforush['picture']; ?>" title="<?php echo $rowproductporforush['title'] ?>" /></div>
					<div class="qaz"><?php echo $rowproductporforush['title'];?></div>
					<div class="op-p-2">
                    	<div class="op-p-2-r"><a href="single.php?pid=<?php echo $rowproductporforush['id'] ?>">مشاهده جزئیات و خرید</a></div>
                        <div class="op-p-2-l"><?php echo number_format($rowproductporforush['price'])?> تومان</div>
                    </div>
                </div><!--End of op-product-->
                <?php } ?>
            </div><!--End of contain-->
        </div><!--End of otherproducts-->
		
<?php
$resindexcat=$indexcat->select();
while($rowindexcat=$resindexcat->fetch(PDO::FETCH_ASSOC))
{
	$resproduct=$product->selectAll12($rowindexcat['cid']);
?>
		<div class="otherproducts">
        	<div class="op-title"><a style="color:#000; text-decoration:none;" href="category.php?cid=<?php echo $rowindexcat['cid']?>"><?php echo $rowindexcat['title']?></a></div>
			<div class="porforushhiddenbox">
				<ul>
				<?php
				$resindexbrand=$indexbrand->select2($rowindexcat['cid']);
				while($rowindexbrand = $resindexbrand->fetch(PDO::FETCH_ASSOC))
				{
				?>
					<li><a href="brand.php?bid=<?php echo $rowindexbrand['id']; ?>"><?php echo $rowindexbrand['title']?></a></li>
				<?php
				}
				?>
				</ul>
			</div>
			<div style="float:right; height:35px;line-height:30px;background-color:#7cff00;border-top-left-radius:5px;"><img class="porforushhiddenboxclick" style="float:right; padding-top:5px;" src="images/menu.png" /></div>
            <div  class="op-contain autoplay" style="direction:ltr;">
            <?php while($rowsproduct=$resproduct->fetch(PDO::FETCH_ASSOC)) { ?>
            	<div class="op-product">
                	<div class="op-p-1"><img src="<?php echo $rowsproduct['picture']; ?>" title="<?php echo $rowsproduct['title'] ?>" /></div>
                    <div class="qaz"><?php echo $rowsproduct['title']; ?></div>
					<div class="op-p-2">
                    	<div class="op-p-2-r"><a href="single.php?pid=<?php echo $rowsproduct['id'] ?>">مشاهده جزئیات و خرید</a></div>
                        <div class="op-p-2-l"><?php echo number_format($rowsproduct['price'])?> تومان</div>
                    </div>
                </div><!--End of op-product-->
                <?php } ?>
            </div><!--End of contain-->
        </div><!--End of otherproducts-->
<?php
}
?>		
		
		
		
      
        
		<div id="footer">
        
        	<div id="foo-1">
            	<div id="foo-1-1"><div id="foo-1-1-matn">بازگشت به بالا</div></div>
                <div id="foo-1-2">
                	<div id="foo-1-2-r"><img src="<?=$rowse31['pic1']?>" /></div>
                    <div id="foo-1-2-c"><img src="<?=$rowse31['pic2']?>" /></div>
                    <div id="foo-1-2-l"><img src="<?=$rowse31['pic3']?>" /></div>
                </div>
            </div><!--End of foo-1-->
            <?php include_once('template/foo-23.php'); ?>
        
        </div><!--End of fullpage-->	
    </div><!--End of fullpage-->
    <script type="text/javascript" src="s/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="s/slick/slick.min.js"></script>
<script type="text/javascript" src="s/js.js"></script>
</body>
<?php
if(isset($_GET['err']))
{
	if($_GET['err'] == 2020)
	{
		?>
        <script>alert("لطفا یک آدرس لیمیل وارد کنید.");</script>
        <?php
	}
	elseif($_GET['err'] == 2021)
	{
		?>
        <script>alert("شما با موفقیت در خبرنامه ما عضو شدید.");</script>
        <?php
	}
}
?>
</html>