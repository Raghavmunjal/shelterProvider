<?php
include_once "mysql-connection.php";
$userid=$_GET["username"];
$query="select * from shelter where userid='$userid'";
$table=mysqli_query($con,$query);
$ary=array();

while($record=mysqli_fetch_array($table))
{
	$ary[]=$record;
}

echo json_encode($ary);


?>