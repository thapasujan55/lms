<?php
require 'includes/login-check.php';
//include 'log.php';
if(mysql_num_rows(mysql_query("select * from constants"))>0)
{
	if(mysql_query("truncate constants"))
	{
	
		$_SESSION['flush'] = 'true';
		$action = "Flush_Dpt";
		$item = $_SESSION['email'];
		$desc = "Deleted All Departments";
		logSystem($action,$item,$desc);
		logAdmin($action,$item,$desc);
		logStaff($action,$item,$desc);
		$_SESSION['msg'] = "All Departments Deleted Successfully";
		echo "<script> window.location =\"".site_url."/admin/index.php?page=core-manager\"; </script>";	
	}
}else
{
	$_SESSION['msg'] = "There are Currently No Departments !";	
	 echo "<script> window.location =\"".site_url."/admin/index.php?page=core-manager\"; </script>";	
}
?>
