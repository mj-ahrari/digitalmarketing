<?php
include_once('onload.php');
include_once('../class/contactus.php');
$message = new contactus();
$res=$message->select();
$i=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت پیام</title>
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
            <h2>مدیریت پیام ها</h2>
            <div id="content-body">
            	<div id="c-b-top">
                <?php
				@$err=$_GET['err'];
				if($err==2026)
				{
					echo "<center><p style='color:green;' >محصول با موفقیت حذف گردید.</center></p><br />";
				}  
				?>
                	<table class="table-users" cellpadding="5" cellspacing="2" style="width:1000px;">
                        <tr>
                        	<td>ردیف</td>
                            <td>نام فرستنده</td>
                            <td>ایمیل</td>
                            <td>وب سایت</td>
                            <td style="width:400px;">متن پیام</td>
                            <td>عملیات</td>
                        </tr>
                        <?php 
						while($row=$res->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $row['name'];?></td>
                                <td><?= $row['email'];?></td>
                                <td><?= $row['websit'];?></td>
                                <td style="text-align:right"><?= $row['message'];?></td>
                                <td><a href="../checking/contactus.php?id=<?= $row['id']?>">حذف</a></td>
                            </tr>
                            <?php
						}
						?>
                    </table>
                </div>
                <div id="c-b-down">
                </div>
            </div><!--ٍEnd of content-body-->

    
	</div><!--ٍEnd of body_style-->
</body>
</html>
