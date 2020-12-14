<?php
include_once('onload.php');
include_once('../class/category.php');
include_once('../class/functions.php');
$func=new functions();
$category=new category();
$rescategory=$category->select();
$i=0;

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت دسته ها</title>
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
            <h2>مدیریت دسته ها</h2>
            <div id="content-body">
            	<div id="c-b-top">
               		<?php
                    @$err=$_GET['err'];
                    if($err==4040)
                    {
                        echo "<center><p style='color:green;' >دسته با موفقیت حذف گردید.</center></p><br />";
                    } 
					elseif($err==5050)
					{
						 echo "<center><p style='color:green;' >دسته با موفقیت اضافه گردید.</center></p><br />";
					}
                    ?>
                	<form method="post" action="../checking/catbra.php">
                	<table  cellpadding="5" cellspacing="2">
                    <tr>
                    	<td><input type="text" id="pprice" placeholder="نام دسته..." name="title" /></td>
                        <td><input type="submit" value="افزودن" id="pinsert" name="cinsert"/></td>
                    </tr>
                    </table>
                    </form>
					
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>نام دسته</td>
                            <td>عملیات</td>
                        </tr>
                        <?php 
						while($row=$rescategory->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $row['title'];?></td>
                                <td><a href="../checking/catbra.php?cid=<?= $row['cid']?>">حذف</a></td>
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
