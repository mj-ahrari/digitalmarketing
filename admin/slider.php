<?php
include_once('onload.php');
include_once('../class/slider.php');
$slider = new slider();
if(isset($_GET['id']))
{
	$res2=$slider->selectOne($_GET['id']);
	$row2=$res2->fetch(PDO::FETCH_ASSOC);
	unlink("../".$row2['picture']);
	$slider->delete($_GET['id']);
	header("location:slider.php");
	exit;
}
elseif(isset($_POST['insert']))
{
	$title=$_POST['title'];
	$alt=$_POST['title'];
	if($title == "" || $_FILES['picture']['name'] == "" )
	{
		header("location:slider.php?err=2020");
		exit;
	}
	else
	{
	
				$finename = md5($_FILES['picture']['name'].microtime()).substr($_FILES['picture']['name'],-5,5);
				$path="../images/".$finename;
				$picture="images/".$finename;
				$move=move_uploaded_file($_FILES['picture']['tmp_name'],$path);
				if($move)
				{
					$res=$slider->insert($title,$title,$picture);
					if($res)
					{
						header("location:slider.php?err=2025");
						exit;
					}
					else
					{
						header("location:slider.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:slider.php?err=2023");
					exit;	
				}
		
	}
}
$res=$slider->select();
$i=0;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>مدیریت اسلایدر</title>
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
            <h2>مدیریت اسلایدر</h2>
            <div id="content-body">
            	<div id="c-b-top">
                	<form method="post" action="" enctype="multipart/form-data">
                	<table cellpadding="5" cellspacing="2">
                        <tr>
                        	<td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span><input type="text" style="padding:1px;" name="title" placeholder="عنوان اسلایدر ..." id="ptitle"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><span style="color:#FF0000; font-size:30px;">*</span>آپلود عکس : <input type="file" name="picture" />سایز عکس فرقی نمی کند ولی بهترین سایز عرض 1326 و طول 450 پیکسل است.</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="insert" value="افزودن" id="pinsert" /></td>
                        </tr>
                    </table>
                </form>
                	<table class="table-users" cellpadding="5" cellspacing="2">
                        <tr>
                        	<td>ردیف</td>
                            <td>عنوان</td>
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
                                <td><img width="200px" height="70px" src="../<?= $row['picture'];?>"</td>
                                <td><a href="?id=<?= $row['id']?>">حذف</a></td>
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
