<?php
include_once('onload.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی">/
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , امورفیا"/>
<script src="js/jsmobile.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="sliderengine/jquery.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>





<title>جزئیات سفارش</title>
</head>

<body>

	<div id="fullpage">
    
    	<?php include_once('template/header.php'); ?>	
		<?php include_once('template/topmenu.php'); ?>
        <?php include_once('class/sp.php'); ?>
        <?php include_once('class/functions.php'); ?>
         <?php include_once('class/product.php'); ?>
		<div id="profile-big">         
            <div id="profile">
                <div id="profile-title">جزئیات سفارش<?php echo $_GET['oid']?></div>
                <div id="profile-body">
                    <div id="profile-body-r">
                        <table>
                            <tr>
                                <td style="padding-right:10px; border:solid 1px #CCCCCC; color:#FFF; background-color:#09F; font-size:18px;">حساب کاربری شما</td>
                            </tr>
                            <tr style="background-image:url(images/profile.png);">
                                <td style="padding-right:40px;"><a href="myprofile.php">پروفایل</a></td>
                            </tr>
                            <tr style="background-image:url(images/order.png);">
                                <td style="padding-right:40px;"><a href="myorder.php">لیست سفارش ها</a></td>
                            </tr>
                            <tr style="background-image:url(images/logout.png); background-size:28px;">
                                <td style="padding-right:40px;"><a href="logout.php?logout=true">خروج از سیستم</a></td>
                            </tr>
                        </table>
                    </div>
                    <div id="profile-body-l">
                        <div id="profile-body-l-top">جزئیات سفارش<?php echo $_GET['oid']?></div>
                        <div id="profile-body-l-down">
                            <table>
                            <tr style="text-align:center">
                                <td style="background-color:#CCC">نام محصول</td>
                                <td style="background-color:#CCC">قیمت</td>
                                <td style="background-color:#CCC">تعداد</td>
                                <td style="background-color:#CCC">قیمت کل</td>
                            </tr>
                            <?php
							$sp1=new sp();
							$func3=new functions();
							$oid=$func3->get_value($_GET['oid']);
							$ressp=$sp1->select($oid);
							$product3=new product();
							$totalsefaresh2=0;
							while($rowsp=$ressp->fetch(PDO::FETCH_ASSOC))
							{
								$resproduct3=$product3->selectProduct($rowsp['pid']);
								$rowproduct3=$resproduct3->fetch(PDO::FETCH_ASSOC);
							?>
                            <tr style="text-align:center;">
                                <td><?php echo $rowproduct3['title']?></td>
                                <td><?php echo $rowproduct3['price']?> تومان</td>
                                <td><?php echo $rowsp['count'] ?></td>
                                <td><?php echo $rowsp['amount'] ?> تومان</td>
                            </tr>
                            <?php
							$totalsefaresh2=$totalsefaresh2+$rowsp['amount'];
							}
							?>
                            <tr style="text-align:center;">
                                <td colspan="4" style="background-color:#eee;">قیمت کل سفارش : <?php echo $totalsefaresh2; ?> تومان</td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
                
            </div><!--End of profile-->
        </div><!--End of profile-big-->
		<div id="footer">
        
        	<div id="foo-1">
            	<!--<div id="foo-1-1"><div id="foo-1-1-matn">بازگشت به بالا</div></div>-->
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