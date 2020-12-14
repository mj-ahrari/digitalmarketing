<?php
class connect
{
	private $servername;
	private $dbname;
	private $username;
	private $password;
	private $dsn;
	
	public function __construct()
	{
		/*$this->dbname='omorfiam_db1';
		$this->password='1991354mjA';
		$this->servername='localhost';
		$this->username='omorfiam_db1';*/
		$this->dbname='omorfiam_db';
		$this->password='';
		$this->servername='localhost';
		$this->username='root';
		$this->dsn="mysql:host=$this->servername;dbname=$this->dbname";
	}
	public function connect()
	{
		$connection=new PDO($this->dsn,$this->username,$this->password);
		$connection->exec("set names utf8");
		return $connection;
	}
}
?>