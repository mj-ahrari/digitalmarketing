<?php
session_start();
ob_start();
include_once('../class/functions.php');
include_once('../class/sefaresh.php');
include_once('../class/basket.php');
include_once('../class/sp.php');
include_once('../class/product.php');
$sabtesefaresh = new sefaresh();
$functionsabad=new functions();

if(isset($_POST['send']))
{
	$product3=new product();
	$name = $functionsabad->post_value($_POST['name']);
	$mail = $functionsabad->post_value($_POST['mail']);
	$phone = $functionsabad->post_value($_POST['phone']);
	$code = $functionsabad->post_value($_POST['code']);
	if(isset($_POST['tabe']))
	{
		$tabe = $functionsabad->post_value($_POST['tabe']);
	}
	else
	{
		$tabe="off";
	}
	$tahvilname = $functionsabad->post_value($_POST['tahvilname']);
	$tahvilphone = $functionsabad->post_value($_POST['tahvilphone']);
	$ostan = $functionsabad->post_value($_POST['ostan']);
	$shahr = $functionsabad->post_value($_POST['shahr']);
	$postcode = $functionsabad->post_value($_POST['postcode']);
	$postaddr = $functionsabad->post_value($_POST['postaddr']);
	$sabtesefaresh->insert($name,$mail,$phone,$code,$tabe,$tahvilname,$tahvilphone,$ostan,$shahr,$postcode,$postaddr);
	$ressefaresh = $sabtesefaresh->selectlast();
	$rowsefaresh=$ressefaresh->fetch(PDO::FETCH_ASSOC);
	$oid=$rowsefaresh['oid'];
	$basket =new basket();
	$resbasket=$basket->searchuser($_SESSION['user']);
	$sp=new sp();
	while($rowbasket=$resbasket->fetch(PDO::FETCH_ASSOC))
	{
		$resproduct3=$product3->selectProduct($rowbasket['productid']);
		$rowproduct3=$resproduct3->fetch(PDO::FETCH_ASSOC);
		$amount=$rowbasket['count']*$rowproduct3['price'];
		$sp->insert($oid,$rowbasket['productid'],$rowbasket['count'],$amount);
	}
	$basket->delete($_SESSION['user']);
	header("location:../tanks.php");
	exit;
}
else if(isset($_GET['oid']))
{
	$oid2 = $functionsabad->get_value($_GET['oid']);
	$resdel = $sabtesefaresh->delete($oid2);
	header("location:../admin/orderlist.php?err=2020");
	exit;
}
else
{
	header("location:../index.php");
	exit;
}