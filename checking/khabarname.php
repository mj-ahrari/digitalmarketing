<?php
ob_start();
session_start();
include_once('../class/functions.php');
include_once('../class/khabarname.php');

if(!isset($_POST['btn-news']))
{
	header("location:../index.php");
	exit;
}
$func=new functions();
$khabar=new khabarname();
$email=$func->post_value($_POST['txt-news']);

if($email==="")
{
	header("location:../index.php?err=2020");
	exit;
}

$reskhabar=$khabar->insert($email);
header("location:../index.php?err=2021");
exit;
?>