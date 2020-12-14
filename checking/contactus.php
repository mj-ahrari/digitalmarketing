<?php
include_once('../class/contactus.php');
include_once('../class/functions.php');
$contactus=new contactus();
$func=new functions();
if(isset($_POST['send']))
{
	$name = $func->post_value($_POST['name']);
	$email = $func->post_value($_POST['email']);
	$web = $func->post_value($_POST['web']);
	$text = $func->post_value($_POST['text']);
	
	$res=$contactus->insert($name,$email,$web,$text);
	if($res)
	{
		header("location:../contactus.php?err=2025");
		exit;
	}
}
if(isset($_GET['id']))
{
	$id = $func->get_value($_GET['id']);
	
	$res=$contactus->delet($id);
	if($res)
	{
		header("location:../admin/messages.php?err=2026");
		exit;
	}
}
?>