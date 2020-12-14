<?php
include_once('../class/customer.php');
include_once('../class/functions.php');
$customer=new customer();
$func=new functions();
if(isset($_GET['mailremove']))
{
	$mail = $func->post_value($_GET['mailremove']);
	$customer->delete($mail);
	header("location:../admin/users.php");
	exit;
}
elseif(isset($_POST['mail']))
{
	$mail=$_POST['mail'];
	$mail=$func->post_value($mail);
	
	$res=$customer->selectOne($mail);
	$row=$res->fetch(PDO::FETCH_ASSOC);
	?>
	<table class="table-users" cellpadding="5" cellspacing="2">
							<tr>
								<td>موبایل</td>
								<td>کدملی</td>
								<td>کدپستی</td>
								<td>استان</td>
								<td>شهر</td>
								<td>تبعه خارجی</td>
								<td>آدرس</td>
							</tr>
								<tr>
									<td><?= $row['mobile'];?></td>
									<td><?= $row['codemeli'];?></td>
									<td><?= $row['codeposti'];?></td>
									<td><?= $row['ostan'];?></td>
									<td><?= $row['city'];?></td>
									<td><?php if($row['khareji'] == 1) {echo "هستم";} else {echo"نیستم";} ;?></td>
									<td><?= $row['address'];?></td>
								</tr>
	</table>
	<?php
}
?>