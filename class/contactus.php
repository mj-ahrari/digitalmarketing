<?php
include_once('connect.php');
class contactus extends connect
{
	public function insert($name,$email,$web,$text)
	{
		$connect=$this->connect();
		$sql="INSERT INTO `tbl_contactus` (`name`, `email`, `websit`, `message`) VALUES (:name,:email,:web,:text);";
		$res=$connect->prepare($sql);
		$res->bindParam(":name",$name);
		$res->bindParam(":email",$email);
		$res->bindParam(":web",$web);
		$res->bindParam(":text",$text);
		$res->execute();
		return $res;
	}
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from tbl_contactus order by id desc";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}   
	public function delet($id)
	{
		$connection=$this->connect();
		$sql="delete from tbl_contactus where id=:id";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
?>