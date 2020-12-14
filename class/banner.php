<?php
include_once('connect.php');
class banner extends connect
{
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from `tbl_banner`;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function delete()
	{
		$connection=$this->connect();
		$sql="delete from `tbl_banner` where bid=1;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function update($picture)
	{
		$connection=$this->connect();
		$sql="update`tbl_banner` set picture=:picture where bid=1;";
		$res=$connection->prepare($sql);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
}
?>