<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی"/>
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , امورفیا"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="js/jsmobile.js"></script>
<link href="css/login.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />	
<script src="sliderengine/jquery.js"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>

<?php
$err=0;
if(isset($_POST['submit']))
{
	include_once("class/functions.php");
	include_once("class/customer.php");
	$customer789=new customer();
	$fun789=new functions();
	$email=$fun789->post_value($_POST['email']);
	$res789=$customer789->selectOne($email);
	if($res789->rowCount() > 0)
	{
		$pass=$fun789->forgetpass();
		$passhash=$fun789->passhash($pass);
		$header = "From:info@zenoniran.ir \r\n";
		$ret = mail($email,"پسورد جدید " ,"پسورد جدید شما :".$pass,$header);
		if($ret)
		{
			$customer789->update2($email,$passhash);
			$err2=2020;
			
		}
		else
		{
			$err2=2021;
		}
	}
}
?>



<title>فراموشی رمز عبور</title>
</head>

<body>

	<div id="fullpage">
    
    	<?php include_once('template/header.php')?>
        
        <?php include_once('template/topmenu.php')?>
        <div id="single" style="margin-top:20px;">  
        <?php 

				if($err=='2020')
				{
					echo "<center><p class='registererr'>پسورد جدید با موفقیت به ایمیل شما فرستاده شد.</center></p><br />
";
				}
				elseif($err=='2021')
				{
					echo "<center><p class='registererr'>مشکلی در تولید و ارسال پسورد به وجود آمده است.</center></p><br />";
				}
				
		?>
            <div id="Show" style="float:right"></div>
                <div class="Joomina">    
                    <div class="first">
                        <a class="home" href="index-2.html"></a>
                            <h1>فراموشی رمز عبور</h1>
                    </div>
                            <form action="" method="POST" >
                            <div class="inputs">
                            <input name="email"  type="text" placeholder="آدرس ایمیل" size="20" maxlength="50">
                            </div>
                    <div class="second">
                            
                            <div class="logins">
                            <input name="submit" type="submit" value="دریافت" id="" style="margin-left:140px; font-size:18px">
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