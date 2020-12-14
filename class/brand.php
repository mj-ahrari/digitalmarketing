<?php
include_once('connect.php');
class brand extends connect
{
	public function select()
	{
		$connection=$this->connect();
		$sql="select * from `tbl_brand`;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function select2($cid)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_brand` where cid=:cid;";
		$res=$connection->prepare($sql);
		$res->bindParam(":cid",$cid);
		$res->execute();
		return $res;
	}
	public function selectOne($id)
	{
		$connection=$this->connect();
		$sql="select * from `tbl_brand` where id=:id;";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id);
		$res->execute();
		return $res;
	}
	public function insert($title,$picture,$category)
	{
		$connection=$this->connect();
		$sql="insert into `tbl_brand`(id,title,picture,cid)values('NULL',:title,:picture,:category);";
		$res=$connection->prepare($sql);
		$res->bindParam(":title",$title);
		$res->bindParam(":picture",$picture);
		$res->bindParam(":category",$category);
		$res->execute();
		return $res;
	}
	public function delete($id)
	{
		$connection=$this->connect();
		$sql="delete from `tbl_brand` where id=:id;";
		$res=$connection->prepare($sql);
		$res->bindParam(":id",$id);
		$res->execute();
		return $res;
	}
}
?>