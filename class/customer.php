<?php
include_once('connect.php');
class customer extends connect
{
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from tbl_customer ";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectOne($email)
	{
		$connection=$this->connect();
		$sql="select * from tbl_customer where mail=:email";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email,PDO::PARAM_STR);
		$res->execute();
		return $res;
	}
	public function delete($email)
	{
		$connection=$this->connect();
		$sql="delete from tbl_customer where mail=:email";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email,PDO::PARAM_STR);
		$res->execute();
		return $res;
	}
	public function insert($email,$password)
	{
		$connect=$this->connect();
		$sql="insert into tbl_customer(mail,password)values(:mail,:password)";
		$res=$connect->prepare($sql);
		$res->bindParam(":mail",$email);
		$res->bindParam(":password",$password);
		if($res->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function selectcustomer($email,$password)
	{
		$connect=$this->connect();
		$sql="select * from tbl_customer where mail=:mail and password=:password";
		$res=$connect->prepare($sql);
		$res->bindParam(":mail",$email);
		$res->bindParam(":password",$password);
		$res->execute();
		return $res;
	}
	public function update($email,$name,$codemeli,$codeposti,$khareji,$phone,$ostan,$city,$address)
	{
		$connect=$this->connect();
		$sql="UPDATE `tbl_customer` SET `fullname` = :fullname, `address` = :address, `mobile` = :mobile, `codemeli` = :codemeli, `khareji` = :khareji, `ostan` = :ostan, `city` = :city, `codeposti` = :codeposti WHERE `mail` = :mail";
		$res=$connect->prepare($sql);
		$res->bindParam(":mail",$email);
		$res->bindParam(":fullname",$name);
		$res->bindParam(":address",$address);
		$res->bindParam(":mobile",$phone)
		;$res->bindParam(":codemeli",$codemeli);
		$res->bindParam(":khareji",$khareji);
		$res->bindParam(":ostan",$ostan);
		$res->bindParam(":city",$city);
		$res->bindParam(":codeposti",$codeposti);
		$res->execute();
		return $res;
	}
	public function update2($email,$password)
	{
		$connect=$this->connect();
		$sql="UPDATE `tbl_customer` SET `password` = :password WHERE `mail` = :mail";
		$res=$connect->prepare($sql);
		$res->bindParam(":mail",$email);
		$res->bindParam(":password",$password);
		$res->execute();
		return $res;
	}
}
?>