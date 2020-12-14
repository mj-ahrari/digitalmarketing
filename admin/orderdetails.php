<?php
include_once('onload.php');
include_once('../class/sp.php');
include_once('../class/functions.php');
include_once('../class/product.php');
$func=new functions();
$oid=$func->get_value($_GET['oid']);
$sp=new sp();
$res=$sp->select($oid);
$product=new product();
$i=0;
$total=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت سفارشات</title>
<link type="text/css" rel="stylesheet" href="style.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.flot.js"></script>
<script type="text/javascript" src="doc.js"></script>
<script type="text/javascript" src="js.js"></script>
</head>
<body>

	<div class="body_style">

        <div class="menu">
        <a href="#" class="logo"></a>
        </div>
        <?php include_once("template/rightmenu.php");?>
        <div class="content">
            <?php include_once("template/topmenu.php");?>
            <h2>سفارش <?php echo $oid?> </h2>
            <div id="content-body">
            	<div id="c-b-top">
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>نام محصول</td>
                            <td>تعداد</td>
                            <td>قیمت</td>
                        </tr>
                        <?php 
						while($row=$res->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							$respro=$product->selectProduct($row['pid']);
							$rowpro=$respro->fetch(PDO::FETCH_ASSOC);
							$total=$total+$row['amount'];
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $rowpro['title'];?></td>
                                <td><?= $row['count'];?></td>
								<td><?= $row['amount'];?> تومان</td>
                            </tr>
                            <?php
						}
						?>
                        <tr style="background-color:#CCCCCC">
                        	<td colspan="4">هزینه کل سفارش : <?=$total;?> تومان</td>
                        </tr>
                    </table>
                    <div id="userdetails">
                    
                    </div>
                </div>
                <div id="c-b-down">
                </div>
            </div><!--ٍEnd of content-body-->

    
	</div><!--ٍEnd of body_style-->
</body>
</html>
