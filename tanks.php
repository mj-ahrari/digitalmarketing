<?php 
include_once('onload.php');
include_once('class/product.php');
include_once('class/basket.php');
include_once('class/sefaresh.php');
include_once('class/sp.php');
$product=new product();
$basket=new basket();
$sefaresh=new sefaresh();
$sp=new sp();
$totalsefaresh=0;
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



<title>تشکر</title>
</head>

<body>

	<div id="fullpage">

<?php include_once('template/header.php'); ?>
<?php include_once('template/topmenu.php'); ?>


         
        <div id="single">
        	<div id="single-product">
           		<div id="single-product-1">
                    <div id="single-title"> فروشگاه امورفیا -> اتمام ثبت سفرش</div>
                    <div id="single-body">
                    <?php
					$ressefaresh=$sefaresh->selectlast2($_SESSION['user']);
					$rowsefaresh=$ressefaresh->fetch(PDO::FETCH_ASSOC);
					?>
                    <table class="tankspage" style="width:1000px;" id="tbl-sabtesefaresh">
                            <tr></tr>
                            <tr>
                                <td colspan="2" style="font-size:20px; text-align:center; background-color:#CCC;">شماره سفارش:<?php echo $rowsefaresh['oid'] ?></td>
                            </tr>
                            <tr>
                                <td>نام و نام خانوادگی:<?php echo $rowsefaresh['fullname'] ?></td>
                                <td>آدرس پست الکترونیکی:<?php echo $rowsefaresh['email'] ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>شماره موبایل:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rowsefaresh['mobile'] ?></td>
                                <td>کد ملی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsefaresh['codemeli'] ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="2"<?php if($rowsefaresh['khareji']==1){echo "تبعه خارجی هستم";} ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>نام و نام خانوادگی تحویل گیرنده:<?php echo $rowsefaresh['fullname'] ?></td>
                                <td>موبایل تحویل گیرنده:<?php echo $rowsefaresh['mobile'] ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>استان:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsefaresh['ostan'] ?></td>
                                <td>شهر:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsefaresh['city'] ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="2">کدپستی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsefaresh['codeposti'] ?></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="2"> آدرس کامل پستی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsefaresh['address'] ?></td>
                            </tr>
                            
                        </table>
                        <table class="tankspage" style="width:1000px;" id="tbl-sabtesefaresh">
                        <tr></tr>
                            <tr>
                                <td colspan="3" style="font-size:20px; text-align:center; background-color:#CCC;">لیست محصولات این سفارش</td>
                            </tr>
                        <?php
						$ressp=$sp->select($rowsefaresh['oid']);
						while($rowsp=$ressp->fetch(PDO::FETCH_ASSOC))
						{
                                                        $product->updateforush($rowsp['pid']);
							$resproduct2=$product->selectProduct($rowsp['pid']);
							$rowproduct2=$resproduct2->fetch(PDO::FETCH_ASSOC);
						?>
                            <tr></tr>
                            <tr>
                                <td>نام محصول:<?php echo $rowproduct2['title'] ?></td>
                                <td>تعداد:<?php echo $rowsp['count'] ?></td>
                                <td>هزینه:<?php echo $rowsp['amount'] ?>تومان</td>
                            </tr>
                         <?php
						 $totalsefaresh=$totalsefaresh+$rowsp['amount'];
						}
						 ?>
                         <tr></tr>
                            <tr>
                                <td colspan="3" style="font-size:20px; text-align:center; background-color:#CCC;">هزینه کلی سفارش:<?php echo $totalsefaresh; ?> تومان</td>
                            </tr>
                        </table>
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