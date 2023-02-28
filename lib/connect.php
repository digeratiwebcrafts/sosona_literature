<?php
include_once('config.php');
class Db
{	function __construct()
	{
	$mysqli = new mysqli(DBHOST,DBUSER,DBPASSWORD,DBNAME) or die("Could not Connect The Server:  Errors:".$mysqli->connect_error);
	$this->con = $mysqli;
	$mysqli->query("Set time_zone = 'Asia/Kolkata' ");
	}
	function execute_query($sql)
	{
	$con = $this->con;
	$result=$con->query($sql) or die($con->connect_error);
	return $result;
	}
    function fetch_data($result)
	{
	$rs=$result->fetch_array(MYSQLI_BOTH);
	return $rs;
	}
	function get_num_rows($result)
	{
	$num_rows=$result->num_rows;
	return $num_rows;
	}
	function get_insert_id()
	{
	$con = $this->con;
	$insert_id=$con->insert_id;
	return $insert_id;
	} 
	function get_affected_rows()
	{
		$con = $this->con;
		$affected_rows=$con->affected_rows;
		return $affected_rows;
	}
	public function validUser()
	{
		if(!isset($_SESSION['loggedin']) && !isset($_SESSION['loggedin']))
		{
              header('Location: login.php');
    		  exit;
		}	
	}
   
}
?>