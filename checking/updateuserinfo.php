<?php
ob_start();
session_start();
include_once('../class/functions.php');
include_once('../class/customer.php');

if(!isset($_POST['updateprofile']))
{
	header("location:../index.php");
	exit;
}
$func=new functions();
$customer=new customer();
$name = $func->post_value($_POST['fullname']);
$phone = $func->post_value($_POST['phone']);
$codemeli = $func->post_value($_POST['codemeli']);
$ostan = $func->post_value($_POST['ostan']);
$city = $func->post_value($_POST['city']);
$codeposti = $func->post_value($_POST['codeposti']);
$address = $func->post_value($_POST['address']);
if(isset($_POST['khareji']))
{
	$khareji = 1;	
}
else
{
	$khareji = 0;
}


if($name==="" || $phone==="" || $codemeli==="" || $ostan==="" || $city==="" || $codeposti==="" || $address==="" )
{
	header("location:../myprofile.php?err=2020");
	exit;
}
$res2=$customer->update($_SESSION['user'],$name,$codemeli,$codeposti,$khareji,$phone,$ostan,$city,$address);

header("location:../myprofile.php?err=2021");
exit;
?>