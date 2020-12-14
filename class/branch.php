<?php
include_once('connect.php');
class branch extends connect
{
	public function insert($title,$details,$tel,$fax,$email,$pic)
	{
		$connect=$this->connect();
		$sql="INSERT INTO `tbl_branch` (`id`, `title`, `details`, `tel`, `fax`, `email`, `pic`) VALUES (NULL, :title,:details,:tel,:fax,:email,:pic);";
		$res=$connect->prepare($sql);
		$res->bindParam(":title",$title);
		$res->bindParam(":details",$details);
		$res->bindParam(":tel",$tel);
		$res->bindParam(":fax",$fax);
		$res->bindParam(":email",$email);
		$res->bindParam(":pic",$pic);
		$res->execute();
		return $res;
	}
	public function updatepic($pic)
	{
		$connect=$this->connect();
		$sql="update `tbl_branchsetting` set pic=:pic where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":pic",$pic);
		$res->execute();
		return $res;
	}
	public function updatedet($det)
	{
		$connect=$this->connect();
		$sql="update `tbl_branchsetting` set details=:det where id=1";
		$res=$connect->prepare($sql);
		$res->bindParam(":det",$det);
		$res->execute();
		return $res;
	}
	public function selectAll()
	{
		$connection=$this->connect();
		$sql="select * from tbl_branch order by id desc limit 0,2";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectAll2()
	{
		$connection=$this->connect();
		$sql="select * from tbl_branchsetting";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectsetting()
	{
		$connection=$this->connect();
		$sql="select * from tbl_branchsetting";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectbranch($id)
	{
		$connection=$this->connect();
		$sql="select * from tbl_branch where id=:id";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function delete($id)
	{
		$connection=$this->connect();
		$sql="delete from tbl_branch where id=:id";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
?>