<?php
include_once "connect.php";
class functions extends connect
{
	public function get_value($value)
	{
		$x=intval($value);
		return $x;
	}
	public function post_value($value)
	{
		$x=addslashes($value);
		$x1=htmlspecialchars($x);
		return $x1;
	}
	public function passhash($value)
	{
		$x="!@q1w2e3".md5($value)."!@q1w2e3";
		return $x;
	}
	public function forgetpass()
	{
		$alphabet="qwertyuiopasdfghjklzxcvbnm0123456789!@#$%^&*";
		$pass=array();
		$alphabetlen=strlen($alphabet)-1;
		for($i=0; $i<8; $i++)
		{
			$n = rand(0,$alphabetlen);
			$pass[]=$alphabet[$n];
		}
		return implode($pass);
	}
}
?>