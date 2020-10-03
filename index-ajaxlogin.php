<?php
    session_start(); // it will create session array if does not created already exist
    include_once "mysql-connection.php";
    $user=$_GET["userr"];
    $pwd=$_GET["pwdd"];
    $query="select * from users where userid='$user' AND pwd='$pwd'";
    $table=mysqli_query($con,$query);
    if(mysqli_num_rows($table)==0)
    {
        echo "Please enter correct userid and password";
       
    }    
    else{
     
    $_SESSION["active_user"]=$user;
    while($row = mysqli_fetch_array($table))
    {
        echo $row['type']; 
         $_SESSION["active_mob"]=$row['mobile'];
        //echo {$row[3]};  
    }

    }

?>
