<?php
include_once('onload.php');
include_once('../class/sefaresh.php');

$sefaresh=new sefaresh();
$res=$sefaresh->selectAll();
$i=0;

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
            <h2>مدیریت سفارشات</h2>
            <?php
            if(isset($_GET['err']))
            {
                if($_GET['err']==2020)
                {
                    echo "<center><p style='color:green;' >سفارش با موفقیت حذف گردید.</center></p><br />";
                }
            }
            ?>
            <div id="content-body">
            	<div id="c-b-top">
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>شماره سفارش</td>
                            <td>نام سفارش دهنده</td>
                            <td>ایمیل سفارش دهنده</td>
                            <td>تلفن سفارش دهنده</td>
                            <td>کدملی سفارش دهنده</td>
                            <td>آدرس+سفارش+دهنده</td>
                            <td>استان تحویل گیرنده</td>
                            <td>شهر تحویل گیرنده</td>
                            <td>کدپستی تحویل گیرنده</td>
                            <td>نام تحویل گیرنده</td>
                            <td>تلفن تحویل گیرنده</td>
                            <td>عملیات</td>
                        </tr>
                        <?php 
						while($row=$res->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><a href="orderdetails.php?oid=<?=$row['oid']?>"><?= $row['oid'];?></a></td>
                                <td><?= $row['fullname'];?></td>
								<td><?= $row['email'];?></td>
                                <td><?= $row['mobile'];?></td>
                                <td><?= $row['codemeli'];?></td>
                                <td><?=$row['address']?></td>
                                <td><?= $row['ostan'];?></td>
                                <td><?= $row['city']?></td>
                                <td><?= $row['codeposti']?></td>
                                <td><?= $row['tfullname'];?></td>
                                <td><?= $row['tmobile'];?></td>
                                <td><a href = ../checking/sabtesefaresh.php?oid=<?= $row['oid'];?>>حذف</a></td>
                            </tr>
                            <?php
						}
						?>
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
