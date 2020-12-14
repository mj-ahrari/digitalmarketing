<?php
include_once('../class/product.php');
include_once('../class/functions.php');
$product=new product();
$func=new functions();
$pid=$_POST['productid'];
$pid=$func->post_value($pid);
$res=$product->selectProduct($pid);
$row=$res->fetch(PDO::FETCH_ASSOC);
$data['picture']=$row['picture'];
$data['productpid']=$pid;
$data['title']=$row['title'];
$data['garanti']=$row['garanti'];
$data['price']=$row['price'];
echo json_encode($data);
?>
