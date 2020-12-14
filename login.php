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






<title>ورود به سایت</title>
</head>

<body>

	<div id="fullpage">
    
    	<?php include_once('template/header.php')?>
        
        <?php include_once('template/topmenu.php')?>
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
				elseif($err==='2021')
				{
					echo "<center><p class='registererr'>ایمیل یا پسورد وارد شده اشتباه است.</center></p><br />";
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
                        <a class="home" href="index-2.html"></a>
                            <h1>ورود به امورفیا</h1>
                    </div>
                            <form action="checking/logincheck.php" method="POST" name="login" id="form1">
                            <div class="inputs">
                            <input name="email"  type="text" placeholder="آدرس ایمیل" size="20" maxlength="50">
                            <input name="password" type="password" placeholder="پسورد">
                            </div>
                            <div class="g-recaptcha" style="float:left; margin-left:80px;" data-sitekey="6Le_oqsUAAAAAKhHgBXnBno2Ykf9Nn3AQWeXgJIk"></div>
                    <div class="second">
                            <div class="right">
                            <input name="remember" id="remember" type="checkbox" value="" style="margin-top:7px;">
                            <span style="margin-right:10px;">مرا به خاطر داشته باش</span>
                            <a href="forgetpass.php?forget=forget">گذرواژه خود را فراموش کرده اید؟</a>
                            </div>
                            <div class="logins">
                            <input name="submit" type="submit" value="ورود" id="logins-btn">
                    </div>
                            </form>
                            <br />
                            <br />
                            <div class="s-login">
                            <a class="reg" href="register.php" style="width:200px;" id="s-login-btn">ثبت نام در امورفیا</a>
                            </div>
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