<?php
ob_start();
session_start(); 
include_once('class/product.php');
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb1p5WCG_VFnUfcjdGVCLFfvpyOQ4liwo"></script>
<title>تماس با ما</title>
<style type="text/css">
        
        body
        {
            font-size: 13px;
            font-style: Verdana, Tahoma, sans-serif;
        }
        h2
        {
            margin-bottom: 20px;
            color: #474E69;
            direction: rtl;
        }
        .ccc
        {
            padding: 10px;
            border: 1px solid #E5E5E5;
            width: 200px;
            color: #999999;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
            -webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 8px;
			margin-right:50px;
        }
        
        .cctt
        {
            width: 400px;
            height: 150px;
            max-width: 400px;
            line-height: 18px;
        }
        
        
        input:hover, textarea:hover, input:focus, textarea:focus
        {
            border-color: 1px solid #C9C9C9;
            box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 8px;
            -moz-box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 8px;
            -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 0px 8px;
        }
        
        .form label
        {
            margin-left: 10px;
            color: #999999;
        }
        
        
        .submit input
        {
            width: 100px;
            height: 40px;
            background-color: #474E69;
            color: #FFF;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
        }
    </style>

</head>
<?php
if(isset($_GET['err']))
{
	echo '<script>alert("پیام شما با موفقیت ارسال شد.")</script>';
}
?>
<body>

	<div id="fullpage">

<?php include_once('template/header.php'); ?>
<?php include_once('template/topmenu.php'); ?>


         
        <div id="single">
        	<div id="single-product" style="background-color:#eee">
            <div id="map" style="float:right; height:400px; width:1000px;" >
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6478.511459601172!2d51.36026857843008!3d35.71992873608588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e00b6f1222e37%3A0x8f220980ffc95df2!2sSattarkhan%2C+District+2%2C+Tehran%2C+Tehran+Province%2C+Iran!5e0!3m2!1sen!2snl!4v1561916617068!5m2!1sen!2snl" width="1000" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>               
            </div>
            <div style="margin-top:5px" id="single-title"> تماس با ما</div>
				</br></br>
                <form class="form" dir="rtl" method="post" action="checking/contactus.php">
    </br>
    <p style="color:#eee">تست</p>
	<p class="name">
        <input type="text" class="ccc" name="name" id="name" placeholder="نام و نام خانوادگی" />*
    </p>
	</br>
    <p class="email">
        <input type="text" class="ccc" name="email" id="email" placeholder="آدرس ایمیل" />*
    </p>
	</br>
    <p class="web">
        <input type="text" class="ccc" name="web" id="web" placeholder="آدرس وب سایت" />
    </p>
	</br>
    <p class="text">
        <textarea name="text" class="ccc cctt" placeholder="متن خود را بنویسید. " /></textarea>
    </p>
    <p class="submit" >
        <input type="submit" class="ccc" value="ارسال" name="send" />
    </p>
    </form>    
                    
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