<?php
include_once('onload.php');
include_once('../class/brand.php');
include_once('../class/category.php');
include_once('../class/functions.php');
$func=new functions();
$brand=new brand();
$cat22 = new category();
$res22 = $cat22->select();
$resbrand=$brand->select();
$i=0;

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت برندها</title>
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
            <h2>مدیریت برند ها</h2>
            <div id="content-body">
            	<div id="c-b-top">
               		<?php
                    @$err=$_GET['err'];
                    if($err==4040)
                    {
                        echo "<center><p style='color:green;' >برند با موفقیت حذف گردید.</center></p><br />";
                    } 
					elseif($err==2025)
					{
						 echo "<center><p style='color:green;' >برند با موفقیت اضافه گردید.</center></p><br />";
					}
                    ?>
                	<form method="post" action="../checking/catbra.php" enctype="multipart/form-data">
                	<table  cellpadding="5" cellspacing="2">
                    <tr>
                    	<td><input type="text" id="pprice" placeholder="نام برند..." name="title" /></td>
						<td>دسته مورد نظر : <select name="category">
						<?php
						while($row22=$res22->fetch(PDO::FETCH_ASSOC))
						{
							?>
							<option value="<?php echo $row22['cid'] ?>"><?php echo $row22['title'] ?></option>
							<?php
						}
						?>
						</select>
						</td>
                        <td>تصویر  برند : <input type="file" name="picture" /></td>
                        <td><input type="submit" value="افزودن" id="pinsert" name="pinsert"/></td>
                    </tr>
                    <tr>
                        <td colspan="2">سایز عکس فرق نمی کند ولی بهتریت سایز عرض 302 و طول 280 است.</td>
                    </tr>
                    </table>
                    </form>
					
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>نام برند</td>
                            <td>تصویر</td>
                            <td>عملیات</td>
                        </tr>
                        <?php 
						while($row=$resbrand->fetch(PDO::FETCH_ASSOC))
						{
							$i++;
							?>
                            <tr>
                                <td><?= $i;?></td>
                                <td><?= $row['title'];?></td>
                                <td><img src="../<?= $row['picture'];?>" width="70px" height="70px" /></td>
                                <td><a href="../checking/catbra.php?bid=<?= $row['id']?>">حذف</a></td>
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
