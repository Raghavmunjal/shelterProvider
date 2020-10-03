<?php

    include_once "mysql-connection.php";
    $user=$_GET["uid"];
    $pwd=$_GET["pwd"];
    $mobile=$_GET["mob"];
    $seltype=$_GET["type"];
    //$dos=$_GET["date"];
    $query="insert into users value('$user','$pwd','$mobile',current_date(),'$seltype')";
        
       $table=mysqli_query($con,$query);
    $msg=mysqli_error($con);

		if($msg=="")
				echo "Sign up Successfully";
		else
			echo "Sign up Failed";
?>