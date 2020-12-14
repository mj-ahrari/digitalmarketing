<?php
include_once('connect.php');
class modares extends connect
{
	public function insert($name,$bio,$picture)
	{
		$connect=$this->connect();
		$sql="INSERT INTO `tbl_modares` (`id`, `name`, `bio`, `picture`) VALUES (NULL, :name,:bio,:picture)";
		$res=$connect->prepare($sql);
		$res->bindParam(":name",$name);
		$res->bindParam(":bio",$bio);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function selectAll()
	{
		$connection=$this->connect();
		$sql="select * from tbl_modares order by id desc";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
        
	public function selectmodares($pid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_modares where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	
	public function delete($pid)
	{
		$connection=$this->connect();
		$sql="delete from tbl_modares where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
?>