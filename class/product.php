<?php
include_once('connect.php');
class product extends connect
{
	public function insert($title,$details,$price,$garanti,$category,$brand,$special,$wonderfull,$picture,$keyword)
	{
		$connect=$this->connect();
		$sql="INSERT INTO `tbl_product` (`id`, `title`, `brand`, `category`, `price`, `picture`, `garanti`, `details`, `cid`, `specialflag`, `bid`, `wonderfull`, `keywords`) VALUES (NULL, :title,:brand,:category,:price,:picture,:garanti,:details,:cid,:specialflag,:bid,:wonderfull,:keyword);";
		$res=$connect->prepare($sql);
		$res->bindParam(":title",$title);
		$res->bindParam(":brand",$brand);
		$res->bindParam(":category",$category);
		$res->bindParam(":price",$price);
		$res->bindParam(":picture",$picture);
		$res->bindParam(":garanti",$garanti);
		$res->bindParam(":details",$details);
		$res->bindParam(":cid",$category);
		$res->bindParam(":specialflag",$special);
		$res->bindParam(":bid",$brand);
		$res->bindParam(":wonderfull",$wonderfull);
		$res->bindParam(":keyword",$keyword);
		$res->execute();
		return $res;
	}
	public function update($id,$title,$details,$price,$garanti,$category,$brand,$keyword)
	{
		$connect=$this->connect();
		$sql="UPDATE `tbl_product` set `title`=:title , `brand`=:brand , `category`=:category , `price`=:price , `garanti`=:garanti , `details`=:details , `cid`=:cid , `bid`=:bid , `keywords`=:keyword where `id`=:id";
		$res=$connect->prepare($sql);
		$res->bindParam(":id",$id);
		$res->bindParam(":title",$title);
		$res->bindParam(":brand",$brand);
		$res->bindParam(":category",$category);
		$res->bindParam(":price",$price);
		$res->bindParam(":garanti",$garanti);
		$res->bindParam(":details",$details);
		$res->bindParam(":cid",$category);
		$res->bindParam(":bid",$brand);
		$res->bindParam(":keyword",$keyword);
		$res->execute();
		return $res;
	}
	public function pupdate($id,$picture)
	{
		$connect=$this->connect();
		$sql="UPDATE `tbl_product` set `picture`=:picture where `id`=:id";
		$res=$connect->prepare($sql);
		$res->bindParam(":id",$id);
		$res->bindParam(":picture",$picture);
		$res->execute();
		return $res;
	}
	public function selectAll()
	{
		$connection=$this->connect();
		$sql="select * from tbl_product order by id desc";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectporforush()
	{
		$connection=$this->connect();
		$sql="SELECT * FROM `tbl_product` order by forushqty desc LIMIT 0,8";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
        
        public function updateforush($pid)
	{
		$connection=$this->connect();
		$sql="update tbl_product set forushqty=forushqty+1 where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid);
		$res->execute();
		return $res;
	}
	public function selectAll12($cid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where cid=:cid";
		$res=$connection->prepare($sql);
		$res->bindParam(":cid",$cid);
		$res->execute();
		return $res;
	}
	public function selectProduct($pid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function search($str)
	{
		$connection = $this->connect();
		$sql="select * from tbl_product where title like :title";
		$res = $connection->prepare($sql);
		$res->bindValue(":title",'%'.$str.'%');
		$res->execute();
		return $res;
	}
	public function selectcategory($cid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where cid=:cid";
		$res=$connection->prepare($sql);
		$res->bindParam(":cid",$cid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function selectbrand($bid)
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where bid=:bid";
		$res=$connection->prepare($sql);
		$res->bindParam(":bid",$bid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
	public function selectspecial()
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where specialflag=1";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectwonder()
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where wonderfull=1 order by id desc limit 10;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function selectwonderlast()
	{
		$connection=$this->connect();
		$sql="select * from tbl_product where wonderfull=1 order by id desc limit 1;";
		$res=$connection->prepare($sql);
		$res->execute();
		return $res;
	}
	public function delete($pid)
	{
		$connection=$this->connect();
		$sql="delete from tbl_product where id=:pid";
		$res=$connection->prepare($sql);
		$res->bindParam(":pid",$pid,PDO::PARAM_INT);
		$res->execute();
		return $res;
	}
}
?>