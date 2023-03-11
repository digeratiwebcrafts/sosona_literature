<?php
//Calling all the lib functions and features
//This is the Php Controller Page it will contain all the php related main functions 
include("lib/start.php");
include("lib/config.php");
include("lib/connect.php");
include("class/functions.php"); 
$functions = new functions();
$functions->validUser();
$command = isset($_POST['command'])?$_POST['command']:'';
$flag = isset($_REQUEST['flag'])?$_REQUEST['flag']:'';
$consigneeId = isset($_REQUEST['consigneeId'])?$_REQUEST['consigneeId']:'';
$currtime = date("Y-m-d h:i:s");
$pageTitle = 'Accounts';


if($command == '1')
{
	
	$filter_name =$_POST['filter_name']? $_POST['filter_name'] : '';
	
	
	
	if(!empty($filter_name))
	{
		if($filter_name == 'All')
		{
			$_SESSION['filter_name']= '';
		}
		else
		{
			$_SESSION['filter_name']=$filter_name;
		}
			
	}
	else
	{
		$_SESSION['filter_name']= '';
	}
}

if($flag == 'reset')
{
	unset($_SESSION['filter_name']);
	header("location:accounts.php");
	exit;
}
$filterType = $_SESSION['filter_name'];

if(!empty($consigneeId))
{
$consigneeLists = $functions->consigneeLists($consigneeId,'','N');	
}
else
{
$consigneeLists = $functions->consigneeLists($filterType,'','N');	
}

$allConsigneeLists = $functions->consigneeLists('','','N');	
/// Includes the html Body
include_once('templates/accountsBody.php');
?>
