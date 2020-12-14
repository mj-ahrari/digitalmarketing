<?php
include_once('connect.php');
class basket extends connect
{
	public function insert($email,$pid)
	{
		$connection=$this->connect();
		$sql="insert into tbl_basket(useremail,productid,count)values(:uid,:pid,1);";
		$res=$connection->prepare($sql);
		$res->bindParam(":uid",$email);
		$res->bindParam(":pid",$pid);
		$res->execute();
		return $res;
	}
	public function searchuser($email)
	{
		$connection=$this->connect();
		$sql="select * from tbl_basket where useremail=:email";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email);
		$res->execute();
		return $res;
	}

	public function update($user,$pid,$count)
	{
		$connection=$this->connect();
		$sql="update tbl_basket set count=:count where useremail=:usereamil and productid=:productid";
		$res=$connection->prepare($sql);
		$res->bindParam(":count",$count,PDO::PARAM_INT);
		$res->bindParam(":usereamil",$user,PDO::PARAM_STR);
		$res->bindParam(":productid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function delete($email)
	{
		$connection=$this->connect();
		$sql="delete from tbl_basket where useremail=:email";
		$res=$connection->prepare($sql);
		$res->bindParam(":email",$email);
		$res->execute();
	}
	public function hasproduct($user,$pid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_basket where useremail=:usereamil and productid=:productid";
		$res=$connection->prepare($sql);
		$res->bindParam(":usereamil",$user,PDO::PARAM_STR);
		$res->bindParam(":productid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function updatecount($user,$pid)
	{
		$connection=$this->connect();
		$sql="update tbl_basket set count=count+1 where useremail=:usereamil and productid=:productid";
		$res=$connection->prepare($sql);
		$res->bindParam(":usereamil",$user,PDO::PARAM_STR);
		$res->bindParam(":productid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function updatezero($user,$pid)
	{
		$connection=$this->connect();
		$sql="update tbl_basket set count=1 where useremail=:usereamil and productid=:productid";
		$res=$connection->prepare($sql);
		$res->bindParam(":usereamil",$user,PDO::PARAM_STR);
		$res->bindParam(":productid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	
}
?>