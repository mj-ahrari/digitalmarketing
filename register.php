
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی"/>
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , امورفیا"/>
<script src="js/jsmobile.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />	
<script src="sliderengine/jquery.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>





<title>ثبت نام در امورفیا</title>
</head>

<body>

	<div id="fullpage">
    
    	<?php include_once('template/header.php'); ?>
	
        
        <?php include_once('template/topmenu.php'); ?>
        <div id="single" style="margin-top:20px;">  
        <?php 
			if(isset($_GET['err']))
			{
				$err=$_GET['err'];
				if($err==='2020')
				{
					echo "<center><p class='registererr'>پر کردن تمامی فیلدها الزامی است.</center></p><br />
";
				}
				elseif($err==='2030')
				{
					echo "<center><p class='registererr'>برای ثبت نام باید شرایط و قوانین سایت را بپذیرید</center></p><br />";
				}
				elseif($err==='2021')
				{
					echo "<center><p class='registererr'>این ایمیل قبلا در سایت ثبت شده است.</center></p><br />";
				}
				elseif($err==='2022')
				{
					echo "<center><p class='registererr' style='color:#00FF00'>ثبت نام شما با موفقیت انجام شد. می توانید وارد سایت شوید.</center></p><br />";
				}
				elseif($err==='2024')
				{
					echo "<center><p class='registererr' >برای افزودن به سبد خرید ابتدا می بایست عضو سایت شوید.</center></p><br />";
                }
                elseif($err==='4141')
				{
					echo "<center><p class='registererr'>لطفا کپچا را وارد کنید.</center></p><br />";
				}
				
			}
		?>
            <div id="Show" style="float:right"></div>
                <div class="Joomina">    
                    <div class="first">
                        <a class="home" href=""></a>
                            <h1>ثبت نام در امورفیا</h1>
                    </div>
                            <form action="checking/registercheck.php" method="POST" name="login" id="form1">
                            <div class="inputs">
                            <input name="mail"  type="text" placeholder="آدرس ایمیل" size="20" maxlength="50">
                            <input name="password" type="password" placeholder="پسورد">
                            </div>
                            <div class="g-recaptcha" style="float:left; margin-left:80px;" data-sitekey="6Le_oqsUAAAAAKhHgBXnBno2Ykf9Nn3AQWeXgJIk"></div>
                    <div class="second">
                            <div class="right">
                            <label for="remember" style="margin-right:5px;">با شرایط و قوانین استفاده از سرویس های سایت امورفیا موافقم.</label>
                            &nbsp;&nbsp;<input name="accept" value="accept" id="remember" type="checkbox" style="margin-top:7px;">
                            <a href="login.php">قبلا در امورفیا ثبت نام کرده اید؟ وارد شوید.</a>
                            </div>
                            <br />
                            <div class="s-login">
                            <br />
                            <input type="submit" value="ثبت نام" class="reg" style="margin-left:180px;" id="s-login-btn" name="regsubmit" />
                            
                            </div>
                            </form>
                    </div>
                </div>
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