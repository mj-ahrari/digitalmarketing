<?php
include_once('onload.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>پنل مدیریت</title>
<link type="text/css" rel="stylesheet" href="style.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.flot.js"></script>
<script type="text/javascript" src="doc.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>

<div class="body_style">

	<div class="menu">
    <a href="#" class="logo"></a>
    </div>
    <?php include_once("template/rightmenu.php");?>
    <div class="content">
		<?php include_once("template/topmenu.php");?>
        <h2>صفحه اصلی مدیریت</h2>
        <div id="content-body">مدیر محترم وب سایت<br>
با سلام و احترام<br>
<br>
شما در این بخش از سایت می توانید تمامی فعالیت های مدیریتی سایت خود را انجام دهید.<br>

این فعالیت ها شامل مدیریت سفارشات، مدیریت کاربران، مدیریت محصولات، مدیریت دسته ها، مدیریت برند ها و ... است.<br>
در این پنل مدیریت سعی شده است تا با طراحی ساده به راحتی بتوانید سایت خود را مدیریت کنید.
		</div><!--ٍEnd of content-body-->

    
</div><!--ٍEnd of body_style-->
</body>
</html>
