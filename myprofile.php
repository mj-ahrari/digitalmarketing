<?php
include_once('onload.php');
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





<title>پروفایل</title>
</head>

<body>

	<div id="fullpage">
    
    	<?php include_once('template/header.php'); ?>	
		<?php include_once('template/topmenu.php'); ?>
        <?php include_once('class/customer.php'); ?>
		<div id="profile-big">    
            
            <div id="profile">
                <?php
		if(isset($_GET['err']))
		{
			$err=$_GET['err'];
			if($err == 2020)
			{
				echo "<center><p class='registererr'>پر کردن تمامی فیلدها الزامی است.</center></p><br />";
			}
			elseif($err == 2021)
			{
				echo "<center><p class='registererr' style='color:#00FF00'>اطلاعات شما با موفقیت به روزرسانی گردید.</center></p><br />";
			}
		}
		?>
                <div id="profile-title">اطلاعات حساب کاربری شما</div>
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
                        <div id="profile-body-l-top">اطلاعات شخصی</div>
                        <div id="profile-body-l-down">
                        <?php
						$customer2=new customer();
						$rescustomer2=$customer2->selectOne($_SESSION['user']);
						$rowcustomer2=$rescustomer2->fetch(PDO::FETCH_ASSOC);
						?>
                        <form method="post" action="checking/updateuserinfo.php">
                            <table id="myprofiletable">
                            <tr>
                                <td>نام و نام خانوادگی: <input type="text" name="fullname" value="<?php echo $rowcustomer2['fullname'] ?>"/></td>
                                <td>آدرس پست الکترونیکی:<?php echo $rowcustomer2['mail'] ?></td>
                            </tr>
                            <tr>
                                <td>شماره موبایل: <input type="text" name="phone" value="<?php echo $rowcustomer2['mobile'] ?>"/></td>
                                <td>کد ملی: <input type="text" name="codemeli" value="<?php echo $rowcustomer2['codemeli'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>استان:&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="ostan" value="<?php echo $rowcustomer2['ostan'] ?>"/></td>
                                <td>شهر:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="city" value="<?php echo $rowcustomer2['city'] ?>"/></td>
                            </tr>
                            <tr>
                                <td>کدپستی: <input type="text" name="codeposti" value="<?php echo $rowcustomer2['codeposti'] ?>"/></td>
                                
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="khareji" checked="<?php if($rowcustomer2['khareji'] === 1) echo "checked"; ?>"/> تبعه خارجی هستم</td>
                            </tr><tr>
                                <td colspan="2"><textarea name="address" ><?php echo $rowcustomer2['address'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top:solid 1px #CCCCCC;"><input type="submit" value="به روز رسانی" name="updateprofile" /></td>
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