<?php
session_start();
require_once("../includes/functions.php");
if(!isset($_SESSION["u_id"]))
{
	redto("../login.php");
}
else
{

	if (isset($_POST['addBund']))
	{
		$connection=connectDb();
		$file = $_FILES['b_tickList']['tmp_name']; 
		$handle = fopen($file,"r"); 
		$ticket=array();
		while ($data = fgetcsv($handle,1000,",","'")) 
		{ 
			$ticket=$data;
		}
		$ticknum=sizeof($ticket);
		$u_id=$_SESSION["u_id"];
		$b_comName=mysqli_real_escape_string($connection, $_POST['b_comName']);
		for ($count=0; $count < $ticknum; $count++) 
		{ 
			$b_tickNum=$ticket[$count];
			$date=date("Y-m-d");
			$query="insert into lottery.bundle(u_id,b_tickNum,b_comName,b_date) values ('$u_id','$b_tickNum','$b_comName','$date')";
			$result=runQuery($connection,$query);
			if(!$result)
			{
				$_SESSION["addBund"]="Problem adding tickets";
				redto("addBund.php");
			}
		}
		$_SESSION["addBund"]="Bundle added Successfully";

		mysqli_close($connection);
		redto("addBund.php");
	}
}
?>