<?php
include_once('../class/product.php');
include_once('../class/functions.php');
$product=new product();
$func=new functions();
if(isset($_POST['insert']))
{
	$title = $func->post_value($_POST['title']);
	$details = $func->post_value($_POST['details']);
	$price = $func->post_value($_POST['price']);
	$keyword = $func->post_value($_POST['keyword']);
	$garanti = $func->post_value($_POST['garanti']);
	$category = $func->post_value($_POST['category']);
	$brand = $func->post_value($_POST['brand']);
	if(isset($_POST['special']))
	{
		$special=1;
	}
	else
	{
		$special=0;
	}
	if(isset($_POST['wonderfull']))
	{
		$wonderfull=1;
	}
	else
	{
		$wonderfull=0;
	}
	if($title == "" || $details == "" || $price == "" || $garanti == "" || $category == "" || $brand == "" || $_FILES['picture']['name'] == "" )
	{
		header("location:../admin/insertproduct.php?err=2020");
		exit;
	}
	else
	{
		if($_FILES['picture']['error']>0)
		{
			header("location:../admin/insertproduct.php?err=2021");
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
					$res=$product->insert($title,$details,$price,$garanti,$category,$brand,$special,$wonderfull,$picture,$keyword);
					if($res)
					{
						header("location:../admin/insertproduct.php?err=2025");
						exit;
					}
					else
					{
						header("location:../admin/insertproduct.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:../admin/insertproduct.php?err=2023");
					exit;	
				}
			}
			else
			{
				header("location:../admin/insertproduct.php?err=2022");
				exit;
			}
		}
	}
}
elseif(isset($_GET['pid']))
{
	$pid=$func->get_value($_GET['pid']);
	$respro=$product->selectProduct($pid);
	$rowpro=$respro->fetch(PDO::FETCH_ASSOC);
	unlink("../".$rowpro['picture']);
	$product->delete($pid);
	header("location:../admin/productlist.php?err=4040");
	exit;
}

if(isset($_POST['update']))
{
	$title = $func->post_value($_POST['title']);
	$details = $func->post_value($_POST['details']);
	$price = $func->post_value($_POST['price']);
	$keyword = $func->post_value($_POST['keyword']);
	$garanti = $func->post_value($_POST['garanti']);
	$category = $func->post_value($_POST['category']);
	$brand = $func->post_value($_POST['brand']);
	$pid=$func->post_value($_POST['pid']);
	if($title == "" || $details == "" || $price == "" || $garanti == "" || $category == "" || $brand == "" )
	{
		header("location:../admin/productdetails.php?err=2020");
		exit;
	}
	else
	{
		$res=$product->update($pid,$title,$details,$price,$garanti,$category,$brand,$keyword);
		if($res)
		{
			header("location:../admin/productdetails.php?dpid=$pid&err=2025");
			exit;
		}
		else
		{
			header("location:../admin/productdetails.php?err=2024");
			exit;
		}
	}
}

if(isset($_POST['pupdate']))
{
	$pid=$func->post_value($_POST['pid']);
	if($_FILES['picture']['error']>0)
		{
			header("location:../admin/productdetails.php?err=2021");
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
					$respro1=$product->selectProduct($pid);
					$rowpro1=$respro1->fetch(PDO::FETCH_ASSOC);
					unlink("../".$rowpro1['picture']);
					$res=$product->pupdate($pid,$picture);
					if($res)
					{
						header("location:../admin/productdetails.php?dpid=$pid&err=2035");
						exit;
					}
					else
					{
						header("location:../admin/productdetails.php?err=2024");
						exit;
					}
				}
				else
				{
					header("location:../admin/productdetails.php?err=2023");
					exit;	
				}
			}
			else
			{
				header("location:../admin/productdetails.php?err=2022");
				exit;
			}
		}

}
?>