<?php
include_once('connect.php');
class sp extends connect
{
	public function insert($oid,$pid,$count,$amount)
	{
		$connection=$this->connect();
		$sql="INSERT INTO `tbl_sp` (`oid`, `pid`, `count`, `amount`) VALUES (:oid,:pid , :count, :amount);";
		$res=$connection->prepare($sql);
		$res->bindParam(":oid",$oid);
		$res->bindParam(":pid",$pid);
		$res->bindParam(":count",$count);
		$res->bindParam(":amount",$amount);
		$res->execute();
		return $res;
	}
	public function select($oid)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_sp` where oid=:oid;";
		$res=$connection->prepare($sql);
		$res->bindParam(":oid",$oid);
		$res->execute();
		return $res;
	}
}
?>