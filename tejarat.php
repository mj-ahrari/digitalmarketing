<?php
ob_start();
session_start(); 
include_once('class/branch.php');
$branch=new branch();
$res=$branch->selectAll();
$res2=$branch->selectAll2();
$row2=$res2->fetch(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="امورفیا"/>
<meta name="keywords" content="فروشگاه لوازم آرایشی و بهداشتی"/>
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



<title>بازرگانی</title>
</head>

<body>

	<div id="fullpage">

<?php include_once('template/header.php'); ?>
<?php include_once('template/topmenu.php'); ?>





         
        <div class="ba-t">
            <img src="<?php echo $row2['pic']?>" />
        </div><!--End of ba-t-->
        <div class="ba-m">

            <div class="ba-m-t"><h2>بازرگانی</h2></div><!--End of d-m-t-->
				<div class="ba-m-b" >
					
				</div><!--End of ba-m-b-->
            
        </div><!--End of ba-m-->

        <div class="ba-b">
        <?php 
        while($row10=$res->fetch(PDO::FETCH_ASSOC))
        {
        ?>
            <div class="ba-pro-kol">
                <div class="ba-pro-t"><?php echo $row10['title'] ?></div>
                <div class="ba-pro-m">
                    <div class="ba-pro-m-r"><img src = "<?php echo $row10['pic'] ?>" /></div>
                    <div class="ba-pro-m-l"><?php echo html_entity_decode($row10['details']) ?></div>
                </div>
                <div class="ba-pro-b">
                تلفن : <?php echo $row10['tel'] ?>
                </br>
                ایمیل : <?php echo $row10['email'] ?>
                </br>
                فکس : <?php echo $row10['fax'] ?>
                </div>
            </div><!--End of ba-pro-kol-->
        <?php
        }
        ?>
        </div><!--End of ba-b-->
        <div class="ba-vb"><?php echo html_entity_decode($row2['details'])?> </div><!--End of ba-vb-->
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