<?php

    include_once "mysql-connection.php";
    $dataa=$_GET["data"];
    $what=$_GET["what"];
    //$mobb=$_GET["mob"];
    if($what=="email"){
       $query="select * from shelter where emailid='$dataa'";
        
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
    $query="select * from shelter where mobile='$dataa' OR addmob='$dataa'";
        
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
    else if($what=="addmob"){
    $query="select * from shelter where addmob='$dataa' OR mobile='$dataa'";
        
       $tabl=mysqli_query($con,$query);
       $coun=mysqli_num_rows($tabl);
       //userid primary toh only 0 or 1 records o agr nhi hai 1 agr hai table m
       if($coun==0){
        echo "You can take it";
       }
       else{
        echo "Already Exists";
       }
    }
    

    


   ?>
