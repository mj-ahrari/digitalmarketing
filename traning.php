<?php
ob_start();
session_start(); 
include_once('class/course.php');
include_once('class/setting2.php');
include_once('class/modares.php');
$setting2 = new setting2();
$resultset2 = $setting2->selectsetting();
$rowset2=$resultset2->fetch(PDO::FETCH_ASSOC);
$course=new course();
$res=$course->selectAll();
include_once('class/modares.php');
$modares=new modares();
$res2=$modares->selectAll();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="سایت فروش انواع محصولات آرایشی و بهداشتی و زیبایی"/>
<meta name="keywords" content="omorfia ,زیبایی ,بهداشتی ,آرایشی , امورفیا"/>
<script src="js/jsmobile.js"></script>
<link rel="stylesheet" type="text/css" href="s/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="s/slick/slick-theme.css"/>
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



<style>

.autoplay4 img
{
	width:300px;
	height:250px;
}
</style>


<title>دوره های آموزشی</title>
</head>

<body>

	<div id="fullpage">

<?php include_once('template/header.php'); ?>
<?php include_once('template/topmenu.php'); ?>





         
        <div class="d-t">
            <img src="<?php echo $rowset2['modaresheader'] ?>" />
        </div><!--End of d-t-->
        <div class="d-m">
            <div class="d-m-t">
            <h2>مدرسین ما</h2>    
            </div><!--End of d-m-t-->
			<div class="autoplay4" style="float:right; height:290px; width:820px; margin-right:255px;" >
			<?php 
			while($row2=$res2->fetch(PDO::FETCH_ASSOC))
			{
			?>
				<div class="d-m-b" >
					<div class="d-m-b-r" ><?php echo html_entity_decode($row2['bio']) ?></div><!--End of d-m-b-r-->
					<div class="d-m-b-l" ><img src="<?php echo $row2['picture'] ?>"/></div><!--End of d-m-b-l-->    
				</div><!--End of d-m-b-->
			<?php
			}
			?>
			</div>
            
        </div><!--End of d-m-->
        <div id="d-b">
            <div id="d-b-t">
                <h2>دوره های آموزشی تخصصی</h2>
            </div><!--End of d-b-t-->
            <div id="d-b-b">
			<?php
			while($row=$res->fetch(PDO::FETCH_ASSOC))
			{
			?>
                <div class="d-our">
                    <div class="d-our-t">
                        <img src="<?php echo $row['pic']?>" />
                    </div>
                    <div class="d-our-b">
                        <a href="#">توضیحات</a>
                    </div>
                </div><!--End of d-our-->
			<?php
			}
			?>        	
            </div><!--End of d-b-b-->
        </div><!--End of d-b-->

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
    <script type="text/javascript" src="s/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="s/slick/slick.min.js"></script>
<script type="text/javascript" src="s/js.js"></script>
</body>
</html>