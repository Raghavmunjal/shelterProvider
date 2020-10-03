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
       $mobile=$_POST["mob"];
       $license=$_POST["lnum"];
       $website=$_POST["website"];
       $cardno=$_POST["cnum"];
       $ifsc=$_POST["icode"];
       $cardname=$_POST["cname"];
       $add=$_POST["address"];
       $city=$_POST["city"];
       $state=$_POST["state"];
       $firm=$_POST["firmname"];
       $info=$_POST["info"];
       $qr=$_FILES["qrpic"]["name"];
       $qrname=$qr."-".$userid;
       $tmppname=$_FILES["qrpic"]["tmp_name"];
       $lic=$_FILES["lpic"]["name"];
       $lname=$lic."-".$userid;
       $tmpcname=$_FILES["lpic"]["tmp_name"];
       move_uploaded_file($tmppname,"uploads/".$qrname);
       move_uploaded_file($tmpcname,"uploads/".$lname);
       $query="insert into pharmacy values('$userid','$name','$mobile','$license','$email','$website','$cardno','$ifsc','$cardname','$firm','$add','$city','$qrname', '$lname','$info','$state')";
       
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
       $mobile=$_POST["mob"];
       $license=$_POST["lnum"];
       $website=$_POST["website"];
       $cardno=$_POST["cnum"];
       $ifsc=$_POST["icode"];
       $cardname=$_POST["cname"];
       $add=$_POST["address"];
       $city=$_POST["city"];
       $state=$_POST["state"];
       $firm=$_POST["firmname"];
       $info=$_POST["info"];
       $qr=$_FILES["qrpic"]["name"];
       $qrname=$qr."-".$userid;
       $tmppname=$_FILES["qrpic"]["tmp_name"];
       $lic=$_FILES["lpic"]["name"];
       $lname=$lic."-".$userid;
       $tmpcname=$_FILES["lpic"]["tmp_name"];
       
       $cname=$_FILES["lpic"]["name"];
       
       $jasus=$_POST["jasus"];
       $jasuss=$_POST["jasuss"];
    if($qr=="")
	   {
		$fileName=$jasus;//user did not change the pic
	   }
	   else
	   {
		$fileName=$qrname;//user changed the the pic
        $tmppname=$_FILES["qrpic"]["tmp_name"];
        move_uploaded_file($tmppname,"uploads/".$qrname);
	   }
        
    if($lic=="")
	   {
		$filee=$jasuss;//user did not change the pic
	   }
	   else
	   {
		$filee=$lname;//user changed the the pic 
        $tmpcname=$_FILES["lpic"]["tmp_name"];
        move_uploaded_file($tmpcname,"uploads/".$lname);
	   }    
        $query="update  pharmacy set name='$name',email='$email',website='$website',cardno='$cardno',cardname='$cardname',ifsc='$ifsc',license='$license',firm='$firm',address='$add',state='$state',city='$city',qrpic='$fileName', lpic='$filee',info='$info',mobile='$mobile' where userid='$userid'";
        mysqli_query($con,$query);
       $msg=mysqli_error($con);
        
        
        $queryy="update  users set mobile='$mobile' where userid='$userid'";
         mysqli_query($con,$queryy);
		if($msg=="")
				echo "Record Updated Successfullyyyyy";
		else
			echo $msg;
        
    }


?>






