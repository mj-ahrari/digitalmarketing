<?php
session_start();
ob_start();
include_once('../class/functions.php');
include_once('../class/basket.php');
include_once('../class/product.php');
$func=new functions();
$basket=new basket();
if(isset($_POST['add2cartbtn']))
{
	if(!isset($_SESSION['user']))
	{
		header("location:../register.php?err=2024");
		exit;
	}
	$pid=$func->post_value($_POST['hiddenpid']);
	if($_POST['hiddenpid'] !== "")
	{
		$res1=$basket->hasproduct($_SESSION['user'],$pid);
		if($res1->rowCount() === 0)
		{
			$basket->insert($_SESSION['user'],$pid);
			header("location:../single.php?pid=$pid");
			exit;
		}
		else
		{
			$row1=$res1->fetch(PDO::FETCH_ASSOC);
			if($row1['count'] === 0 || $row1['count'] < 0)
			{
				$basket->updatezero($_SESSION['user'],$pid);
				header("location:../single.php?pid=$pid");
				exit;
			}
			else
			{
				$basket->updatecount($_SESSION['user'],$pid);
				header("location:../single.php?pid=$pid");
				exit;
			}
		}
	}
	header("location:../single.php?pid=$pid");
	exit;
}
else
{
	header("location:../index.php");
	exit;
}