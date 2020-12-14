<?php
include_once('../class/branch.php');
include_once('../class/functions.php');
$branch=new branch();
$func=new functions();
if(isset($_POST['branchinsert']))
{
	$title = $func->post_value($_POST['title']);
	$details = $func->post_value($_POST['details']);
	$tel = $func->post_value($_POST['tel']);
	$email = $func->post_value($_POST['email']);
	$fax = $func->post_value($_POST['fax']);
	if($title == "" || $details == "" || $tel == "" || $fax == "" || $email == "")
	{
		header("location:../admin/insertbranch.php?err=2020");
		exit;
	}
	else
	{
		if($_FILES['picture']['error']>0)
		{
			header("location:../admin/insertbranch.php?err=2021");
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
					$res=$branch->insert($title,$details,$tel,$fax,$email,$picture);
					if($res)
					{
						header("location:../admin/insertbranch.php?err=2025");
						exit;
					}
					else
					{
						header("location:../admin/insertbranch.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:../admin/insertbranch.php?err=2023");
					exit;	
				}
			}
			else
			{
				header("location:../admin/insertbranch.php?err=2022");
				exit;
			}
		}
	}
}
if(isset($_GET['id']))
{
	$id=$func->get_value($_GET['id']);
	$respro=$branch->selectbranch($id);
	$rowpro=$respro->fetch(PDO::FETCH_ASSOC);
	unlink("../".$rowpro['pic']);
	$branch->delete($id);
	header("location:../admin/branchlist.php?err=4040");
	exit;
}

if(isset($_POST['bfinsert']))
{
	$details=$func->post_value($_POST['details']);
	$result2=$branch->updatedet($details);
	header("location:../admin/branchsetting.php?err=4045");
	exit;
}
if(isset($_POST['bhinsert']))
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
					$resfinal = $branch->selectAll2();
					$rowunlinktheader=$resfinal->fetch(PDO::FETCH_ASSOC);
					unlink("../".$rowunlinktheader['pic']);
					$res=$branch->updatepic($picture);
					if($res)
					{
						header("location:../admin/branchsetting.php?err=2025");
						exit;
					}
					else
					{
						header("location:../admin/branchsetting.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:../admin/branchsetting.php?err=2023");
					exit;	
				}
			}
			else
			{
				header("location:../admin/branchsetting.php?err=2022");
				exit;
			}
		}
}
?>