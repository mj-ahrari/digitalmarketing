<?php
include_once('connect.php');
class sefaresh extends connect
{
	public function insert($name,$mail,$phone,$code,$tabe,$tahvilname,$tahvilphone,$ostan,$shahr,$postcode,$postaddr)
	{
		$connection=$this->connect();
		$sql="INSERT INTO `tbl_sefaresh` (`oid`, `fullname`, `email`, `mobile`, `codemeli`, `khareji`, `address`, `ostan`, `city`, `codeposti`, `tfullname`, `tmobile`) VALUES (NULL,:fullname , :email, :mobile, :codemeli, :khareji, :address, :ostan, :city, :codeposti, :tfullname, :tmobile);
";
		$res=$connection->prepare($sql);
		$res->bindParam(":fullname",$name);
		$res->bindParam(":email",$mail);
		$res->bindParam(":mobile",$phone);
		$res->bindParam(":codemeli",$code);
		$res->bindParam(":khareji",$tabe);
		$res->bindParam(":address",$postaddr);
		$res->bindParam(":ostan",$ostan);
		$res->bindParam(":city",$shahr);
		$res->bindParam(":codeposti",$postcode);
		$res->bindParam(":tfullname",$tahvilname);
		$res->bindParam(":tmobile",$tahvilphone);
		$res->execute();
		return $res;
	}
	public function selectlast()
	{
		$connection=$this->connect();
		$sql="select * from `tbl_sefaresh` order by oid desc limit 1";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectlast2($email)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_sefaresh` where email=:email order by oid desc limit 1 ";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email);
		$res->execute();
		return $res;
	}
	public function select($email)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_sefaresh` where email=:email ";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email);
		$res->execute();
		return $res;
	}
	public function selectAll()
	{
		$connection=$this->connect();
		$sql="select * from `tbl_sefaresh`";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function delete($oid)
	{
		$connection=$this->connect();
		$sql="delete from `tbl_sefaresh` where oid=:oid ";
		$res=$connection->prepare($sql);
		$res->bindParam(":oid",$oid);
		$res->execute();
		return $res;
	}
	
}
?>