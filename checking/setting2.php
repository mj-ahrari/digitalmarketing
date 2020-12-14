<?php
include_once('../class/setting2.php');
include_once('../class/functions.php');
$setting2=new setting2();
$func=new functions();

if(isset($_POST['mhinsert']))
{
	if($_FILES['picture']['error']>0)
		{
			header("location:../admin/branchsetting.php?err=2021");
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
					$resfinal = $setting2->selectsetting();
					$rowunlinkmheader=$resfinal->fetch(PDO::FETCH_ASSOC);
					unlink("../".$rowunlinkmheader['modaresheader']);
					$res=$setting2->updatemheader($picture);
					if($res)
					{
						header("location:../admin/modaressetting.php?err=2025");
						exit;
					}
					else
					{
						header("location:../admin/modaressetting.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:../admin/modaressetting.php?err=2023");
					exit;	
				}
			}
			else
			{
				header("location:../admin/modaressetting.php?err=2022");
				exit;
			}
		}
}
?>