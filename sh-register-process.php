<?php
   include_once "mysql-connection.php";

   $btn=$_POST["btn"];
    if($btn=="Save")
        dosave($con);
    
    else
        if($btn=="Update")
            doupdate($con);

   function dosave($con){
       
       $userid=$_POST["uid"];
       $name=$_POST["name"];
       $email=$_POST["email"];
       $anum=$_POST["aadharnum"];
       $addmob=$_POST["addmob"];
       $mob=$_POST["mob"];
       $pet=$_POST["selpet"];
       $days=$_POST["days"];
       $add=$_POST["address"];
       $city=$_POST["city"];
       $state=$_POST["state"];
       $landmark=$_POST["landmark"];
       $info=$_POST["info"];
       $pname=$_FILES["ppic"]["name"];
       $tmppname=$_FILES["ppic"]["tmp_name"];
       $cname=$_FILES["cpic"]["name"];
       $tmpcname=$_FILES["cpic"]["tmp_name"];
       move_uploaded_file($tmppname,"uploads/".$pname);
       move_uploaded_file($tmpcname,"uploads/".$cname);
       $query="insert into shelter values('$userid','$name','$mob','$email','$addmob','$anum','$pet','$days','$add','$state','$city','$landmark','$pname', '$cname','$info')";
       
       mysqli_query($con,$query);
       $msg=mysqli_error($con);

		if($msg=="")
				echo "Record Inserted Successfullyyyyy";
		else
			echo $msg;
   }
    function doupdate($con){
       $userid=$_POST["uid"];
       $name=$_POST["name"];
       $email=$_POST["email"];
       $anum=$_POST["aadharnum"];
       $addmob=$_POST["addmob"];
       $mob=$_POST["mob"];
       $pet=$_POST["selpet"];
       $days=$_POST["days"];
       $add=$_POST["address"];
       $city=$_POST["city"];
       $state=$_POST["state"];
       $landmark=$_POST["landmark"];
       $info=$_POST["info"];
       
       $pname=$_FILES["ppic"]["name"];
       
       $cname=$_FILES["cpic"]["name"];
       
       $jasus=$_POST["jasus"];
       $jasuss=$_POST["jasuss"];
    if($pname=="")
	   {
		$fileName=$jasus;//user did not change the pic
	   }
	   else
	   {
		$fileName=$pname;//user changed the the pic
        $tmppname=$_FILES["ppic"]["tmp_name"];
        move_uploaded_file($tmppname,"uploads/".$pname);
	   }
        
    if($cname=="")
	   {
		$filee=$jasuss;//user did not change the pic
	   }
	   else
	   {
		$filee=$cname;//user changed the the pic 
        $tmpcname=$_FILES["cpic"]["tmp_name"];
        move_uploaded_file($tmpcname,"uploads/".$cname);
	   }    
        $query="update  shelter set name='$name',emailid='$email',addmob='$addmob',aadharnum='$anum',selpet='$pet',days='$days',landmark='$landmark',address='$add',state='$state',city='$city',shpic='$fileName', aapic='$filee',info='$info',mobile='$mob' where userid='$userid'";
        mysqli_query($con,$query);
       $msg=mysqli_error($con);
        $queryy="update  users set mobile='$mob' where userid='$userid'";
         mysqli_query($con,$queryy);
		if($msg=="")
				echo "Record Updated Successfullyyyyy";
		else
			echo $msg;
        
    }









?>
