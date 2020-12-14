<?php
include_once('../class/course.php');
include_once('../class/functions.php');
$course=new course();
$func=new functions();
if(isset($_POST['insert']))
{
	$name = $func->post_value($_POST['name']);
	if($name == "")
	{
		header("location:../admin/insertcourse.php?err=2020");
		exit;
	}
	else
	{
		if($_FILES['picture']['error']>0)
		{
			header("location:../admin/insertcourse.php?err=2021");
			exit;
		}
		else
		{
			if(is_uploaded_file($_FILES['picture']['tmp_name']))
			{
				$finename = md5($_FILES['picture']['name'].microtime()).substr($_FILES['picture']['name'],-5,5);
				$path="../images/".$finename;
				$picture="images/".$finename;
				$move=move_uploaded_file($_FILES['picture']['tmp_name'],$path);
				if($move)
				{
					$res=$course->insert($name,$picture);
					if($res)
					{
						header("location:../admin/insertcourse.php?err=2025");
						exit;
					}
					else
					{
						header("location:../admin/insertcourse.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:../admin/insertcourse.php?err=2023");
					exit;	
				}
			}
			else
			{
				header("location:../admin/insertcourse.php?err=2022");
				exit;
			}
		}
	}
}
elseif(isset($_GET['pid']))
{
	$pid=$func->get_value($_GET['pid']);
	$respro=$course->selectcourse($pid);
	$rowpro=$respro->fetch(PDO::FETCH_ASSOC);
	unlink("../".$rowpro['picture']);
	$course->delete($pid);
	header("location:../admin/courselist.php?err=4040");
	exit;
}
?>