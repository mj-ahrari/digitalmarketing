<?php
include_once('connect.php');
class setting2 extends connect
{
	public function updatemheader($pic)
	{
		$connect=$this->connect();
		$sql="update `tbl_setting2` set modaresheader=:pic where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":pic",$pic);
		$res->execute();
		return $res;
	}
	public function updatelogo($pic)
	{
		$connect=$this->connect();
		$sql="update `tbl_setting2` set logo=:pic where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":pic",$pic);
		$res->execute();
		return $res;
	}
	public function selectsetting()
	{
		$connection=$this->connect();
		$sql="select * from tbl_setting2";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
}
?>