<?php
include_once('connect.php');
class adminlogin extends connect
{
	public function select($email,$password)
	{
		$connection=$this->connect();
		$sql="select * from tbl_admin where email=:email and password=:password";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email,PDO::PARAM_STR);
		$res->bindParam(":password",$password,PDO::PARAM_STR);
		$res->execute();
		return $res;
	}
	public function selectpass($email)
	{
		$connection=$this->connect();
		$sql="select * from tbl_admin where email=:email";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email,PDO::PARAM_STR);
		$res->execute();
		return $res;
	}
	public function update($email,$pass)
	{
		$connection=$this->connect();
		$sql="update tbl_admin set password=:pass where email=:email";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email,PDO::PARAM_STR);
		$res->bindParam(":pass",$pass,PDO::PARAM_STR);
		$res->execute();
		return $res;
	}
}
?>