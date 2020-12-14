<?php
include_once('connect.php');
class khabarname extends connect
{
	public function insert($email)
	{
		$connection=$this->connect();
		$sql="INSERT INTO `tbl_khabarname` (`id`, `email`) VALUES (NULL,:email);";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email);
		$res->execute();
		return $res;
	}
}
?>