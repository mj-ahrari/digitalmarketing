<?php
include_once('connect.php');
class magazine extends connect
{
	public function insert($title,$details,$picture)
	{
		$connect=$this->connect();
		$sql="INSERT INTO `tbl_magazine` (`id`, `title`, `details`, `picture`) VALUES (NULL, :title, :details, :picture);";
		$res=$connect->prepare($sql);
		$res->bindParam(":title",$title);
		$res->bindParam(":details",$details);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function update($id,$title,$details)
	{
		$connect=$this->connect();
		$sql="update tbl_magazine set title=:title , details=:details  where id=:id";
		$res=$connect->prepare($sql);
		$res->bindParam(":id",$id);
		$res->bindParam(":title",$title);
		$res->bindParam(":details",$details);
		$res->execute();
		return $res;
	}
	public function pupdate($id,$picture)
	{
		$connect=$this->connect();
		$sql="update tbl_magazine set picture=:picture  where id=:id";
		$res=$connect->prepare($sql);
		$res->bindParam(":id",$id);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function selectAll()
	{
		$connection=$this->connect();
		$sql="select * from tbl_magazine order by id desc";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectmagazine($id)
	{
		$connection=$this->connect();
		$sql="select * from tbl_magazine where id=:id";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function delete($id)
	{
		$connection=$this->connect();
		$sql="delete from tbl_magazine where id=:id";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
?>