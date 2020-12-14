<?php
include_once('connect.php');
class slider extends connect
{
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from `tbl_slider`;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function delete($id)
	{
		$connection=$this->connect();
		$sql="delete from `tbl_slider` where id=:id;";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id);
		$res->execute();
		return $res;
	}
	public function insert($title,$alt,$pic)
	{
		$connection=$this->connect();
		$sql="insert into tbl_slider(id, title, alt, picture)values(NULL, :title, :alt, :picture); ";
		$res=$connection->prepare($sql);
		$res->bindParam(":title",$title);
		$res->bindParam(":alt",$title);
		$res->bindParam(":picture",$pic);
		$res->execute();
		return $res;
	}
	public function selectOne($id)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_slider` where id=:id;";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id);
		$res->execute();
		return $res;
	}
}
?>