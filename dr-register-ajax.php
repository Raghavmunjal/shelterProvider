<?php

    include_once "mysql-connection.php";
    $dataa=$_GET["data"];
    $what=$_GET["what"];
    //$mobb=$_GET["mob"];
    if($what=="email"){
       $query="select * from doctors where email='$dataa'";
        
       $table=mysqli_query($con,$query);
       $count=mysqli_num_rows($table);
       //userid primary toh only 0 or 1 records o agr nhi hai 1 agr hai table m
       if($count==0){
        echo "Available";
       }
       else{
        echo "Not Available";
       }
    }
    else if($what=="mob"){
    $query="select * from doctors where mobile='$dataa'";
        
       $tablee=mysqli_query($con,$query);
       $countt=mysqli_num_rows($tablee);
       //userid primary toh only 0 or 1 records o agr nhi hai 1 agr hai table m
       if($countt==0){
        echo "Not Taken";
       }
       else{
        echo "Taken";
       }
    }
    

    


   ?>
