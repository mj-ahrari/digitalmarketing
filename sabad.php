<?php
include_once('onload.php');
include_once('class/functions.php');
include_once('class/basket.php');
include_once('class/product.php');
$sabadbasket=new basket();
$ressabadbasket = $sabadbasket->searchuser($_SESSION['user']);
$productsabadbasket = new product();
$functionsabad=new functions();
$totalsefaresh=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی"/>
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , اومورفیا"/>
<script src="js/jsmobile.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="sliderengine/jquery.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>





<title>سبد خرید</title>
</head>

<body>

	<div id="fullpage">
    
    		
        
        
<?php include_once('template/header.php'); ?>	
<?php include_once('template/topmenu.php'); ?>
		<div id="profile-big">         
            <div id="profile" class="basketlist">
                
                <div id="profile-body">
                    
                    <div id="profile-body-l">
                        <div id="profile-body-l-top" style="width:970px;">اطلاعات سبد خرید شما</div>
                        <div id="profile-body-l-down" style="width:1000px;">
                            <table style="width:1000px;" id="tbl-basket">
                            	<tr style="background-color:#0F9;">
                                    <td>تصویر محصول</td>
                                    <td>نام محصول</td>
                                    <td>تعداد</td>
                                    <td>قیمت</td>
                                    <td colspan="2">قیمت کل</td>
                                </tr>
                                <?php
									while($rowsabadbasket = $ressabadbasket->fetch(PDO::FETCH_ASSOC))
									{				
									$resproductsabadbasket=$productsabadbasket->selectProduct($rowsabadbasket['productid']);
									$rowproductsabadbasket=$resproductsabadbasket->fetch(PDO::FETCH_ASSOC);
								?>
                                <tr style="border-bottom:solid 1px #999999;"> 
                                    <td><img src="<?php echo $rowproductsabadbasket['picture']; ?>" /></td>
                                    <td><?php echo $rowproductsabadbasket['title']?></td>
                                    <td><form method="post" action="checking/updatebasket.php"><input type="number"  value="<?php echo $rowsabadbasket['count'] ?>" style="border: solid 1px #CCC; padding:5px;" name="tedad"/></td>
                                    <td><?php echo $rowproductsabadbasket['price'] ?>تومان</td>
                                    <td><?php $totalsefaresh=$totalsefaresh+$rowproductsabadbasket['price']*$rowsabadbasket['count']; echo $rowproductsabadbasket['price']*$rowsabadbasket['count'] ?>تومان</td>
                                    <td>
                                    <input type="hidden" value="<?php echo $rowproductsabadbasket['id'] ?>" name="psabadid" />
                                    <input class="updatebaskert" type="submit" value="به روز رسانی" name="updatebasket" style="background-color:#09f; padding:5px 20px 5px 20px; color:#FFF;" />
                                    </form>
                                    </td>
                                </tr>
                                <?php
									}
								?>
                                <tr>
                                    <td colspan="6"><?php
                                    echo "مجموع سفارش : ".$totalsefaresh." تومان";
									?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"><form method="post" action="sabteetelaat.php"><input type="submit" class="updatebaskert" name="sabtesefaresh" value="ثبت سفارش" style="background-color:#09f; padding:5px 20px 5px 20px; color:#FFF;" /></form></td>
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