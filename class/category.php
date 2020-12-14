<?php
include_once('connect.php');
class category extends connect
{
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from `tbl_category`;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectOne($id)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_category` where cid=:id;";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id);
		$res->execute();
		return $res;
	}
	public function delete($id)
	{
		$connection=$this->connect();
		$sql="delete from `tbl_category` where cid=:id;";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id);
		$res->execute();
		return $res;
	}
	public function insert($title)
	{
		$connection=$this->connect();
		$sql="insert into `tbl_category`(cid,title)values('NULL' , :title);";
		$res=$connection->prepare($sql);
		$res->bindParam(":title",$title);
		$res->execute();
		return $res;
	}
}
?>