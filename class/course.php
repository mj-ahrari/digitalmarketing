<?php
include_once('connect.php');
class course extends connect
{
	public function insert($name,$picture)
	{
		$connect=$this->connect();
		$sql="INSERT INTO `tbl_course` (`id`, `pic`, `name`) VALUES (NULL, :pic,:name)";
		$res=$connect->prepare($sql);
		$res->bindParam(":name",$name);
		$res->bindParam(":pic",$picture);
		$res->execute();
		return $res;
	}
	public function selectAll()
	{
		$connection=$this->connect();
		$sql="select * from tbl_course order by id desc";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
        
	public function selectcourse($pid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_course where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	
	public function delete($pid)
	{
		$connection=$this->connect();
		$sql="delete from tbl_course where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
?>