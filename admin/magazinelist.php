<?php
include_once('onload.php');
include_once('../class/magazine.php');
$magazine=new magazine();
$res=$magazine->selectAll();
$i=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>لیست مجله ها</title>
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
            <h2>لیست مجله ها</h2>
            <div id="content-body">
            	<div id="c-b-top">
                <?php
				@$err=$_GET['err'];
				if($err==4040)
				{
					echo "<center><p style='color:green;' >مجله با موفقیت حذف شد..</center></p><br />";
				}  
				?>
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>نام مجله</td>
                            <td>تصویر</td>
                            <td>عملیات</td>
                        </tr>
                        <?php 
						while($row=$res->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $row['title'];?></td>
                                <td><img width="70px" height="70px" src="../<?= $row['picture'];?>"</td>
                                <td><a href="../checking/magazine.php?id=<?= $row['id']?>">حذف</a> | <a href="magazineedit.php?eid=<?= $row['id']?>">ویرایش</a></td>
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
