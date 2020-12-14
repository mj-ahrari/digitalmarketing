<?php
include_once('connect.php');
class setting3 extends connect
{
	public function tupdate($picture)
	{
		$connect=$this->connect();
		$sql="update tbl_setting3 set telegram=:picture where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function iupdate($picture)
	{
		$connect=$this->connect();
		$sql="update tbl_setting3 set instagram=:picture where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function fupdate($picture)
	{
		$connect=$this->connect();
		$sql="update tbl_setting3 set facebook=:picture where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function pic1update($picture)
	{
		$connect=$this->connect();
		$sql="update tbl_setting3 set pic1=:picture where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function pic2update($picture)
	{
		$connect=$this->connect();
		$sql="update tbl_setting3 set pic2=:picture where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function pic3update($picture)
	{
		$connect=$this->connect();
		$sql="update tbl_setting3 set pic3=:picture where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function select()
	{
		$connect=$this->connect();
		$sql="select * from tbl_setting3 where id=1";
		$res=$connect->prepare($sql);
		$res->execute();
		return $res;
	}
}
?>