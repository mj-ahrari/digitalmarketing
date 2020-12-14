<?php
include_once('onload.php');
include_once('class/basket.php');
include_once('class/customer.php');
$basketsefaresh =new basket();
$customersefaresh =new customer();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی"/>
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , امورفیا"/>
<script src="js/jsmobile.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script src="sliderengine/jquery.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>


<?php
$rescustomersefaresh=$customersefaresh->selectOne($_SESSION['user']);

$rowcustomersefaresh=$rescustomersefaresh->fetch(PDO::FETCH_ASSOC);?>


<title>ثبت سفارش</title>
</head>

<body>

	<div id="fullpage">
    
<?php include_once('template/header.php'); ?>	
<?php include_once('template/topmenu.php'); ?>
		<div id="profile-big">         
            <div id="profile">
                
                <div id="profile-body">
                    
                    <div id="profile-body-l">
                        <div id="profile-body-l-top" style="width:970px;">اطلاعات شخصی</div>
                        <div id="profile-body-l-down" style="width:1000px;">
                        <form method="post" action="checking/sabtesefaresh.php">
                            <table style="width:1000px;" id="tbl-sabtesefaresh">
                            <tr></tr>
                            <tr>
                                <td>نام و نام خانوادگی:<input type="text" value="<?php echo $rowcustomersefaresh['fullname'] ?>" name="name"/></td>
                                <td>آدرس پست الکترونیکی:<input type="text" value="<?php echo $rowcustomersefaresh['mail'] ?>" name="mail"/></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>شماره موبایل:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="<?php echo $rowcustomersefaresh['mobile'] ?>" name="phone"/></td>
                                <td>کد ملی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $rowcustomersefaresh['codemeli'] ?>" name="code"/></td>
                            </tr>
                            <tr></tr>
                            <!--<tr>
                                <td colspan="2"><input type="checkbox" name="tabe"<?php if($rowcustomersefaresh['khareji']==1){echo "checked";} ?>
                                />&nbsp;&nbsp;تبعه خارجی فاقد کد ملی هستم</td>
                            </tr>-->
                            <tr></tr>
                            <tr>
                                <td>نام و نام خانوادگی تحویل گیرنده:<input type="text" value="<?php echo $rowcustomersefaresh['fullname'] ?>" name="tahvilname"/></td>
                                <td>موبایل تحویل گیرنده:<input type="text" value="<?php echo $rowcustomersefaresh['mobile'] ?>" name="tahvilphone"/></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td>استان:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $rowcustomersefaresh['ostan'] ?>" name="ostan"/></td>
                                <td>شهر:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $rowcustomersefaresh['city'] ?>" name="shahr"/></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="2">کدپستی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="postcode" value="<?php echo $rowcustomersefaresh['codeposti'] ?>"/></td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td colspan="2"> آدرس کامل پستی:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="postaddr" placeholder="آدرس کامل پستی..."><?php echo $rowcustomersefaresh['address'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center;"><input type="submit" name="send" value="ثبت سفارش" /></td>
                            </tr>
                        </table>
                        </form>
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