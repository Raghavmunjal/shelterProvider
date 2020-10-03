<?php
include_once "mysql-connection.php";
$userid=$_GET["userid"];
$query="select * from pharmacy where userid='$userid'";
$table=mysqli_query($con,$query);
$ary=array();

while($record=mysqli_fetch_array($table))
{
	$ary[]=$record;
}

echo json_encode($ary);


?>