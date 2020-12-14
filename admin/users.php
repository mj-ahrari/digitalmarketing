<?php
include_once('onload.php');
include_once('../class/customer.php');
$customer = new customer();
$res=$customer->select();
$i=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت کاربران</title>
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
            <h2>مدیریت کاربران</h2>
            <div id="content-body">
            	<div id="c-b-top">
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>ایمیل(نام کاربری)</td>
                            <td>نام و نام خانوادگی</td>
                            <td>مشخصات</td>
                            <td>تغییرات</td>
                        </tr>
                        <?php 
						while($row=$res->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $row['mail'];?></td>
                                <td><?= $row['fullname'];?></td>
                                <td style="cursor:pointer;" class="userdetails-1" det=<?php echo $row['mail'] ?>>مشخصات کاربر</td>
                                <td><a href="../checking/userdet.php?mailremove=<?= $row['mail']?>">حذف</a></td>
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
