<?php
session_start();
ob_start();
include_once('../class/functions.php');
include_once('../class/basket.php');
include_once('../class/product.php');
if(isset($_POST['updatebasket']))
{
	$sabadbasket=new basket();
	$functionsabad=new functions();
	$tedad = $functionsabad->post_value($_POST['tedad']);
	$psabadid = $functionsabad->post_value($_POST['psabadid']);
	$res=$sabadbasket->update($_SESSION['user'],$psabadid,$tedad);
	header("location:../sabad.php");
	exit;
}
else
{
	header("location:../sabad.php");
	exit;
}