<?php
include_once('connect.php');
class setting extends connect
{
	public function insert($a,$t,$i,$f,$d,$dp,$dm,$email)
	{
		$connect=$this->connect();
		$sql="UPDATE `tbl_setting` SET `about` = :a, `telegram` = :t, `instagram` = :i, `facebook` = :f, `daftaraddr` = :d, `daftarphone` = :dp, `daftarmobile` = :dm , `email` = :email WHERE `id` = 0;";
		$res=$connect->prepare($sql);
		$res->bindParam(":a",$a);
		$res->bindParam(":t",$t);
		$res->bindParam(":i",$i);
		$res->bindParam(":f",$f);
		$res->bindParam(":d",$d);
		$res->bindParam(":dp",$dp);
		$res->bindParam(":dm",$dm);
		$res->bindParam(":email",$email);
		$res->execute();
		return $res;
	}
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from tbl_setting";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
}
?>