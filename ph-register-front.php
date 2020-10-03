<?php
session_start();
if(isset($_SESSION["active_user"])==false)
{
    header("location:index-front.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Pharmacy Console</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-1.8.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <style type="text/css">
        .bgg {
            background-color: whitesmoke;
        }

        input[type=file] {
            display: none;
        }

        .ok {
            border: 1px solid green;
        }

        .notok {
            border: 1px solid red;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            left: 0;
            visibility: hidden;
            transition: 0.1s;
            margin-left: -250px;
            margin-top: -56px;
        }

        .shownav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            left: 0;
            background-color: rgb(250, 250, 250);
            transition: 0.5s;
            margin-top: -56px;
            /transform: rotate(360deg);
            /
        }

    </style>

    <script>
        function showpreview(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#prev').attr('src', ev.target.result).css("border-radius", "50%");
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

        function openNav() {
            document.getElementById("mySidenav").classList.remove("sidenav");
            document.getElementById("mySidenav").classList.add("shownav");
        }

        function closeNav() {
            document.getElementById("mySidenav").classList.remove("shownav");
            document.getElementById("mySidenav").classList.add("sidenav");
        }

    </script>
    <script>
        function showcertificate(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#showc').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }
        }

    </script>
    <script>
        $(document).ready(function() {
            $("#home").click(function() {
                location.replace("index-front.html");
            })
           /* var f1 = 0;

            function ajaxmob(getmob) {
                var url = "ph-register-ajax.php?data=" + getmob + "&what=mob";
                $.get(url, function(response) {

                    if (response == "Not Taken") {
                        f1 = 1;
                        $("#mob").addClass("ok").removeClass("notok");
                        $("#errmob").html(response);
                    } else if (response == "Taken" && $("#mobjasus").val() == getmob) {
                        f1 = 1;
                        $("#mob").addClass("ok").removeClass("notok");
                        $("#errmob").html("");
                    } else {
                        f1 = 0;
                        $("#mob").addClass("notok").removeClass("ok");
                        $("#errmob").html(response);
                    }

                });
            }
            var g1 = 1;

            function ajaxmail(getemail) {
                var url = "ph-register-ajax.php?data=" + getemail + "&what=email";
                $.get(url, function(response) {


                    if (response == "Not Available" && $("#emailjasuss").val() != getemail) {
                        g1 = 0;
                        $("#email").addClass("notok").removeClass("ok");
                        $("#erremail").html(response);
                    } else if (response == "Not Available" && $("#emailjasuss").val() == getemail) {
                        g1 = 1;
                        $("#email").addClass("ok").removeClass("notok");
                        $("#erremail").html("");
                    } else {
                        g1 = 1;
                        $("#email").addClass("ok").removeClass("notok");
                        $("#erremail").html(response);
                    }

                });
            }*/


            $("#search").click(function() {

                $("#email").removeClass("notok").removeClass("ok");
                $("#name").removeClass("notok").removeClass("ok");
                $("#mob").removeClass("notok").removeClass("ok");
                $("#firmname").removeClass("notok").removeClass("ok");
                $("#lnum").removeClass("notok").removeClass("ok");
                $("#icode").removeClass("notok").removeClass("ok");
                $("#cnum").removeClass("notok").removeClass("ok");
                $("#address").removeClass("notok").removeClass("ok");
                $("#state").removeClass("notok").removeClass("ok");
                $("#city").removeClass("notok").removeClass("ok");
                $("#cname").removeClass("notok").removeClass("ok");
                $("#website").removeClass("notok").removeClass("ok");

                $("#errweb").html("");
                $("#erremail").html("");
                $("#errmob").html("");
                $("#errfname").html("");
                $("#errlnum").html("");
                $("#errcnum").html("");
                $("#erricode").html("");
                $("#errname").html("");
                $("#errcity").html("");
                $("#erradd").html("");
                $("#errcname").html("");
            

                var userid = $("#uid").val();

                //json Array as response jsonAryResponse 
                $.getJSON("ph-register-json.php?userid=" + userid, function(jsonAryResponse) {
                    //alert(jsonAryResponse.length);
                    if (jsonAryResponse.length == 0) {
                        alert("First Fill Your Data !");
                    } else {
                        f1=1;
                        $("#mob").attr("readonly", false);
                        alert(JSON.stringify(jsonAryResponse));
                        $("#email").val(jsonAryResponse[0].email);
                        $("#emailjasuss").val(jsonAryResponse[0].email);
                        $("#name").val(jsonAryResponse[0].name);
                        $("#jasus").val(jsonAryResponse[0].qrpic);
                        $("#jasuss").val(jsonAryResponse[0].lpic);
                        $("#prev").prop("src", "uploads/" + jsonAryResponse[0].qrpic);
                        $("#showc").prop("src", "uploads/" + jsonAryResponse[0].lpic);
                        $("#website").val(jsonAryResponse[0].website);
                        $("#mob").val(jsonAryResponse[0].mobile);
                        $("#mobjasus").val(jsonAryResponse[0].mobile);
                        $("#lnum").val(jsonAryResponse[0].license);
                        $("#cnum").val(jsonAryResponse[0].cardno);
                        $("#cname").val(jsonAryResponse[0].cardname);
                        $("#firmname").val(jsonAryResponse[0].firm);
                        $("#icode").val(jsonAryResponse[0].ifsc);
                        $("#address").val(jsonAryResponse[0].address);
                        $("#state").val(jsonAryResponse[0].state);
                        $("#city").val(jsonAryResponse[0].city);
                        $("#info").val(jsonAryResponse[0].info);
                       // g1 = 1;
                       // f1 = 1;
                    }
                })
            });
            var d = 0;
            $("#address").blur(function() {
                var getadd = $(this).val();
                var addtest = /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/;
                var result = addtest.test(getadd);
                if (getadd == "") {
                    $("#erradd").html("Please fill your address");
                    $(this).addClass("notok").removeClass("ok");
                    d = 0;
                } else if (result == false) {
                    $("#erradd").html("Invalid address");
                    $(this).addClass("notok").removeClass("ok");
                    d = 0;
                } else {
                    $(this).addClass("ok").removeClass("notok");
                    $("#erradd").html("");
                    d = 1;

                }

            });
            var i = 0;
            $("#city").blur(function() {
                var getcity = $(this).val();
                var citytest = /^[a-zA-z] ?([a-zA-z]|[a-zA-z] )*[a-zA-z]$/;
                var result = citytest.test(getcity);
                if (getcity == "") {
                    $("#errcity").html("Please fill your city");
                    $(this).addClass("notok").removeClass("ok");
                    i = 0;
                } else if (result == false) {
                    $("#errcity").html("Invalid City");
                    $(this).addClass("notok").removeClass("ok");
                    i = 0;
                } else {
                    $("#errcity").html("");
                    $(this).addClass("ok").removeClass("notok");
                    i = 1;

                }

            });
            var k = 0;
            $("#state").blur(function() {
                var getstate = $(this).val();
                if (getstate != null) {
                    $(this).addClass("ok").removeClass("notok");
                    k = 1;
                } else {
                    k = 0;
                    $(this).addClass("notok").removeClass("ok");
                }
            });
            var h = 0;
            $("#firmname").blur(function() {
                var getfname = $(this).val();
                var nametest = /^[a-zA-Z ]*$/;
                var result = nametest.test(getfname);
                if (getfname == "") {
                    $("#errfname").html("Please fill your Firm name");
                    $(this).addClass("notok").removeClass("ok");
                    h = 0;
                } else if (result == false) {
                    $("#errfname").html("Invalid Name of Firm ");
                    $(this).addClass("notok").removeClass("ok");
                    h = 0;
                } else {
                    $("#errfname").html("");
                    $(this).addClass("ok").removeClass("notok");
                    h = 1;

                }

            });
            /*var a = 1;
            $("#cname").blur(function() {
                var getcname = $(this).val();
                var nametest = /^[a-zA-Z ]*$/;
                var result = nametest.test(getcname);
                if (result == false && getcname != "") {
                    $("#errcname").html("Invalid Name of Account holder");
                    $(this).addClass("notok").removeClass("ok");
                    a = 0;
                } else {
                    $("#errcname").html("");
                    $(this).addClass("ok").removeClass("notok");
                    a = 1;

                }

            });

            var b = 1;
            $("#icode").blur(function() {
                var getifsc = $(this).val();
                if (getifsc.length < 11 && getifsc != "") {
                    $("#erricode").html("Please fill correct ifsc code");
                    $(this).addClass("notok").removeClass("ok");
                    b = 0;
                } else if (isNaN(getifsc) == true && getifsc != "") {
                    $("#erricode").html("Please fill numeric value");
                    $(this).addClass("notok").removeClass("ok");
                    b = 0;
                } else {
                    $("#erricode").html("");
                    $(this).addClass("ok").removeClass("notok");
                    b = 1;

                }

            });
            var c = 1;
            $("#cnum").blur(function() {
                var getacc = $(this).val();
                if (getacc.length < 9 && getacc != "" && getacc.length >= 18) {
                    $("#errcnum").html("Please fill correct account number");
                    $(this).addClass("notok").removeClass("ok");
                    c = 0;
                } else if (isNaN(getacc) == true && getacc != "") {
                    $("#errcnum").html("Please fill numeric value");
                    $(this).addClass("notok").removeClass("ok");
                    c = 0;
                } else {
                    $("#errcnum").html("");
                    $(this).addClass("ok").removeClass("notok");
                    c = 1;

                }

            });*/
            var f = 0;

            $("#mob").blur(function() {
                var getmob = $(this).val();
                var mobtest = /^[0-9]{3,4}/;
                var result = mobtest.test(getmob);
                if (getmob == "") {
                    $("#errmob").html("Please fill your mobile number");
                    $(this).addClass("notok").removeClass("ok");
                    f = 0;
                } else if (result == false) {
                    $("#errmob").html("Invalid mobile number");
                    $(this).addClass("notok").removeClass("ok");
                    f = 0;
                } else {

                    $("#errmob").html("");
                    f = 1;

                }
                /*if (f == 1) {
                    ajaxmob(getmob);
                }*/



            });
           /* var g = 1;

            $("#email").blur(function() {
                var getmail = $(this).val();
                var mailtest = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var result = mailtest.test(getmail);
                if (result == false && getmail != "") {
                    $("#erremail").html("Invalid Email id");
                    $(this).addClass("notok").removeClass("ok");
                    g = 0;
                } else {
                    $("#erremail").html("");
                    g = 1;
                    $(this).addClass("ok").removeClass("notok");
                }
                if (result == true && getmail != "" && g == 1) {
                    ajaxmail(getmail);
                }
            });
            var l = 1;
            $("#website").blur(function() {
                var getweb = $(this).val();
                var webtest = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
                var result = webtest.test(getweb);
                if (result == false && getweb != "") {
                    $("#errweb").html("Invalid website");
                    $(this).addClass("notok").removeClass("ok");
                    l = 0;
                } else if (getweb == "") {
                    $(this).addClass("ok").removeClass("notok");
                    $("#errweb").html("");
                    l = 1;

                } else {
                    $(this).addClass("ok").removeClass("notok");
                    $("#errweb").html("");
                    l = 1;
                }


            });*/

            var e = 0;
            $("#name").blur(function() {
                var getname = $(this).val();
                var nametest = /^[a-zA-Z ]*$/;
                var result = nametest.test(getname);
                if (getname == "") {
                    $("#errname").html("Please fill your name");
                    $(this).addClass("notok").removeClass("ok");
                    e = 0;
                } else if (result == false) {
                    $("#errname").html("Invalid Name");
                    $(this).addClass("notok").removeClass("ok");
                    e = 0;
                } else {
                    $(this).addClass("ok").removeClass("notok");
                    $("#errname").html("");
                    e = 1;

                }

            });
            var j = 0;
            $("#lnum").blur(function() {
                var getlic = $(this).val();

                if (getlic == "") {
                    $("#errlnum").html("Please fill your license number");
                    $(this).addClass("notok").removeClass("ok");
                    j = 0;
                } else if (getlic.length < 16) {
                    $("#errlnum").html("Invalid License number");
                    $(this).addClass("notok").removeClass("ok");
                    j = 0;
                } else if (isNaN(getlic)) {
                    $("#errlnum").html("Please fill numeric value");
                    $(this).addClass("notok").removeClass("ok");
                    j = 0;
                } else {
                    $(this).addClass("ok").removeClass("notok");
                    $("#errlnum").html("");
                    j = 1;

                }

            });

            $("#save").click(function(ev) {
                f=1;
                
                var getppic = $("#qrpic").val();
                var getcpic = $("#lpic").val();
                 
                 if (f == 1  && d == 1 && e == 1  && h == 1 && i == 1 && j == 1 && k == 1 && getcpic != "") {
                    alert("Thanks For Submitting Your Details");
                }
                else if (e == 0) {
                    alert("please check your name");
                    $("#name").focus();
                    ev.preventDefault();
                }
                else if (f == 0) {
                    $("#mob").focus();
                    ev.preventDefault();
                } else if (d == 0) {
                    alert("please check your address");
                    $("#address").focus();
                    ev.preventDefault();
                }  else if (h == 0) {
                    alert("please check your Firm name");
                    $("#firmname").focus();
                    ev.preventDefault();
                } else if (i == 0) {
                    alert("please check your city");
                    $("#city").focus();
                    ev.preventDefault();
                } else if (j == 0) {
                    alert("please check your license number");
                    $("#lnum").focus();
                    ev.preventDefault();
                } else if (k == 0) {
                    alert("please check your state");
                    $("#state").focus();
                    ev.preventDefault();
                } else if (getcpic == "") {
                    alert("Please upload your license");
                    ev.preventDefault();
                } 
            })
            $("#logout").click(function(ev) {
                var log = confirm("Are You Sure?");
                if (log == false) {
                    ev.preventDefault();
                }

            })

            $("#update").click(function(ev) {

                var a = 0;
                var b = 0;
                var c = 0;
                var d = 0;
                var e = 0;
                var f = 0;
                var g = 0;
                var h = 0;
                var k = 0;
                var i = 0;
                var j = 0;
                var l = 0;

                //alert(f1);
                //alert(g1);

                var getname = $("#name").val();
                var nametest = /^[a-zA-Z ]*$/;
                var result = nametest.test(getname);
                if (getname == "") {
                    a = 0;
                } else if (result == false) {
                    a = 0;
                } else {
                    a = 1;
                }
                var getcontact = $("#mob").val();
                var contacttest = /^[0-9]{3,4}/;
                var conres = contacttest.test(getcontact);
                if (getcontact == "") {
                    c = 0;
                } else if (conres == false) {
                    c = 0;
                } else {
                    c = 1;
                }
               /* if (c == 1) {
                    ajaxmob(getcontact);
                }*/
                var getemailid = $("#email").val();
                var emailtest = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
                var emres = emailtest.test(getemailid);
                if (emres == false && getemailid != "") {
                    b = 0;
                } else {
                    b = 1;
                }
                /*if (emres == true && getemailid != "") {
                    ajaxmail(getemailid);
                }*/
                var getcity = $("#city").val();
                var citytest = /^[a-zA-z] ?([a-zA-z]|[a-zA-z] )*[a-zA-z]$/;
                var resultt = citytest.test(getcity);
                if (getcity == "") {
                    i = 0;
                } else if (resultt == false) {
                    i = 0;
                } else {
                    i = 1;
                }
                var getfirm = $("#firmname").val();
                var firmtest = /^[a-zA-Z ]*$/;
                var res = firmtest.test(getfirm);
                if (getfirm == "") {
                    h = 0;
                } else if (res == false) {
                    h = 0;
                } else {
                    h = 1;
                }
                var getifsc = $("#icode").val();
                if (getifsc.length < 11 && getifsc != "") {
                    g = 0;
                } else if (isNaN(getifsc) == true && getifsc != "") {
                    g = 0;
                } else {
                    g = 1;
                }
                var getlic = $("#lnum").val();

                if (getlic == "") {
                    j = 0;
                } else if (getlic.length < 16) {
                    j = 0;
                } else if (isNaN(getlic)) {
                    j = 0;
                } else {
                    j = 1;
                }
                var getweb = $("#website").val();
                var webtest = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
                var resweb = webtest.test(getweb);
                if (resweb == false && getweb != "") {
                    l = 0;
                } else if (getweb == "") {
                    l = 1;
                } else {
                    l = 1;
                }

                var getadd = $("#address").val();
                var addtest = /^[a-zA-Z0-9-\/] ?([a-zA-Z0-9-\/]|[a-zA-Z0-9-\/] )*[a-zA-Z0-9-\/]$/;
                var resu = addtest.test(getadd);
                if (getadd == "") {
                    d = 0;
                } else if (resu == false) {
                    d = 0;
                } else {
                    d = 1;
                }

                var getstate = $("#state").val();
                if (getstate != null) {
                    e = 1;
                } else {
                    e = 0;
                }

                var getacc = $("#cnum").val();
                if (getacc.length < 9 && getacc != "" && getacc.length >= 18) {
                    k = 0;
                } else if (isNaN(getacc) == true && getacc != "") {
                    k = 0;
                } else {
                    k = 1;
                }
                var getcname = $("#cname").val();
                var ctest = /^[a-zA-Z ]*$/;
                var cres = ctest.test(getcname);
                if (cres == false && getcname != "") {
                    f = 0;
                } else {
                    f = 1;
                }
                var getppic = $("#jasus").val();
                var getcpic = $("#jasuss").val();
                if (c == 0) {
                    alert("please check your mobile");
                    $("#mob").focus();
                    ev.preventDefault();
                }else if (b == 0) {
                    alert("please check your email");
                    $("#email").focus();
                    ev.preventDefault();
                }  else if (a == 1 && d == 1 && e == 1 && f == 1 && g == 1 && h == 1 && i == 1 && j == 1 && k == 1 && getcpic != "" && getppic != "" && b == 1 && c == 1) {
                    alert(" Updated ");
                } else if (a == 0) {
                    alert("please check your name");
                    $("#name").focus();
                    ev.preventDefault();
                } else if (d == 0) {
                    alert("please check your address");
                    $("#address").focus();
                    ev.preventDefault();
                } else if (e == 0) {
                    alert("please check your state");
                    $("#state").focus();
                    ev.preventDefault();
                } else if (f == 0) {
                    alert("please check your Account Holder name");
                    $("#cname").focus();
                    ev.preventDefault();
                } else if (g == 0) {
                    alert("please check your ifsc code");
                    $("#icode").focus();
                    ev.preventDefault();
                } else if (h == 0) {
                    alert("please check your Firm name");
                    $("#firmname").focus();
                    ev.preventDefault();
                } else if (i == 0) {
                    alert("please check your city");
                    $("#city").focus();
                    ev.preventDefault();
                } else if (j == 0) {
                    alert("please check your license number");
                    $("#lnum").focus();
                    ev.preventDefault();
                } else if (k == 0) {
                    alert("please check your card number");
                    $("#cnum").focus();
                    ev.preventDefault();
                } else if (getcpic == "") {
                    alert("Please upload your medical license");
                    ev.preventDefault();
                } else if (getppic == "") {
                    alert("Please upload your Qr code");
                    ev.preventDefault();
                } else if (l == 0) {
                    alert("please check your website");
                    $("#website").focus();
                    ev.preventDefault();
                }
                
                

            })





        });

    </script>
</head>

<body class="bgg">

    <!--- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color:#4183f2;color: whitesmoke;">
        <buttton>
            <i class="fas fa-bars" style="float:left;margin-top: 19px;margin-left: 20px;cursor: pointer;" onclick="openNav();">
            </i>
            </button>
            <!-- <a class="navbar-brand" href="#">
            <img src="picss/profile.png" style="width:60px; height:60px;cursor: pointer; border-radius:50%" class="d-inline-block" onclick="openNav();">
        </a>-->

            <a class="navbar-brand" href="#" style="float:left; margin-left:20px;margin-top:5px ; color: whitesmoke;">
                <?php echo "Hii ".$_SESSION['active_user'] ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav" style="float: left;">

            </div>
    </nav>
    <div id="mySidenav" class="sidenav">

        <a class="closebtn" onclick="closeNav()" style="font-size: 40px;cursor: pointer;margin-left: 220px;margin-top: 350px;">&times;</a>
        <h3 style="color:#4183f2;cursor: pointer; margin-top: -45px;margin-left: 20px;">Pets Care</h3>
        <div class="container">
            <div class="row">
                &nbsp;
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6 offset-3">
                    <i class="fa fa-home" id="home" aria-hidden="true" style="color:#4183f2;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</i>

                </div>
            </div>
            <hr>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6 offset-3">
                    <i class="fa fa-question-circle" aria-hidden="true" style="color:#615b5b;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Help</i>

                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6 offset-3">
                    <i class="fa fa-info-circle" aria-hidden="true" style="color:#615b5b;cursor: pointer; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;About</i>

                </div>
            </div>

            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6 offset-3">
                    <i class="fa fa-commenting" aria-hidden="true" style="color:#8c8282;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Feedback</i>
                </div>
            </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-sm-6 offset-3">
                    <a href="logout.php">
                        <i class="fa fa-user" aria-hidden="true" id="logout" style="color:#8c8282;cursor: pointer;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--form-->

    <form action="ph-register-process.php" method="post" enctype="multipart/form-data" style="margin-top: 120px;">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <fieldset class="border border-dark p-4">
                        <legend class="w-auto">Personal Details</legend>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-1">
                                <input type="hidden" id="jasus" name="jasus">
                                <input type="hidden" id="jasuss" name="jasuss">
                                <input type="hidden" id="mobjasus" name="mobjasus">
                                <input type="hidden" id="emailjasuss" name="emailjasuss">
                                <input type="text" name="uid" class="form-control" id="uid" value="<?php echo $_SESSION['active_user'] ?>" readonly>
                            </div>
                            &nbsp;
                            <div class="col-sm-5">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                <small id="errname" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-1">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email ID(optional)">
                                <small id="erremail" class="form-text text-muted"></small>
                            </div>
                            &nbsp;
                            <div class="col-sm-5">
                                <input type="tel" name="mob" class="form-control" id="mob" value="<?php echo $_SESSION['active_mob'] ?>" readonly>
                                <small id="errmob" class="form-text text-muted"></small>
                            </div>
                        </div>
                        <div class="row">
                            &nbsp;
                        </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-1">
                                <input type="url" name="website" class="form-control" id="website" placeholder="Website(if any)">
                                <small id="errweb" class="form-text text-muted"></small>
                            </div>
                            &nbsp;
                            <div class="col-sm-5">
                                <input type="text" name="lnum" class="form-control" id="lnum" placeholder="License Number" required>
                                <small id="errlnum" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <fieldset class="border border-dark p-4">
                        <legend class="w-auto">Account Details</legend>
                        <div class="row">
                            <div class="col-sm-10 offset-1">
                                <input type="text" name="cnum" class="form-control" id="cnum" placeholder="Account Number(Optional)">
                                <small id="errcnum" class="form-text text-muted"></small>
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-sm-10 offset-1">
                                <input type="text" name="cname" class="form-control" id="cname" placeholder="Account Holder Name(Optional)">
                                <small id="errcname" class="form-text text-muted"></small>
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-sm-10 offset-sm-1">
                                <input type="text" name="icode" class="form-control" id="icode" placeholder="IFSC code(Optional)">
                                <small id="erricode" class="form-text text-muted"></small>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="col-sm-6">
                    <fieldset class="border border-dark p-4">
                        <legend class="w-auto">Contact</legend>
                        <div class="row">
                            <div class="col-sm-10 offset-1">
                                <input type="text" name="firmname" class="form-control" id="firmname" placeholder="Firm Name" required>
                                <small id="errfname" class="form-text text-muted"></small>
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-sm-10 offset-1">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Shop Address" required>
                                <small id="erradd" class="form-text text-muted"></small>
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-sm-5 offset-1">
                                <select name="state" id="state" class="custom-select" required>
                                    <option value="" disabled selected>Select State</option>
                                    <option value="AndamanAndNicobarIslands">Andaman and Nicobar Islands</option>
                                    <option value="AndhraPradesh">Andhra Pradesh</option>
                                    <option value="ArunachalPradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="DadraAndNagarHaveliAndDamanAndDiu">Dadra and Nagar Haveli and Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="HimachalPardesh">Himachal Pradesh</option>
                                    <option value="JammuandKashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Ladakh">Ladakh</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="MadhyaPradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Odisha">Odisha</option>
                                    <option value="Puducherry">Puducherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="TamilNadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="UttarPradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="WestBengal">West Bengal</option>
                                </select>
                            </div>
                            &nbsp;
                            <div class="col-sm-5">
                                <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
                                <small id="errcity" class="form-text text-muted"></small>
                            </div>
                        </div>
                    </fieldset>
                </div>

            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                &nbsp;
            </div>
            &nbsp;
            <div class="row" style="margin-left: 20px;">
                <div class="col-sm-3">

                    <div class="card border-dark" style="width: 18rem;height:19rem;">
                        <img src="picss/qrr.jpg" id="prev" class="card-img-top" style="height:150px; width:150px; margin-left:70px; margin-top:30px; margin-bottom:30px;border:1px solid lightgray" required>

                        <div class="card-body">
                            <label>
                                <input type="file" accept="image/*" onchange="showpreview(this);" name="qrpic" id="qrpic" multiple class="form-control">
                                <span class="btn btn-primary btn-md btn-block" id="profile" style="margin-left:35px; margin-top: 2px;">Upload QR Code</span>
                            </label>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="col-sm-3 offset-sm-1">
                    <div class="card border-dark" style="width: 18rem;height:19rem;">
                        <img src="picss/license1.jpg" id="showc" class="card-img-top" style="height:140px; width:140px; margin-left:75px; margin-top:40px; margin-bottom:30px;border:1px solid lightgray" required>

                        <div class="card-body">
                            <label>
                                <input type="file" accept="image/*" onchange="showcertificate(this);" name="lpic" id="lpic" multiple class="form-control">
                                <span class="btn btn-primary btn-md btn-block" id="certi" style="margin-left:40px">Upload License</span>
                            </label>
                        </div>
                    </div>
                </div>
                &nbsp;
                <div class="col-sm-3 offset-sm-1">
                    <div class="card border-dark" style="width: 18rem; height:19rem;">
                        <div class="card-header">
                            Add Some More Details
                        </div>
                        <div class="card-body" style="margin-top:10px;">
                            <textarea rows="8" name="info" id="info" cols="32">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                <div class="col-sm-2 offset-sm-3">
                    <input type="submit" value="Save" name="btn" class="btn btn-md btn-block btn-outline-primary" id="save">
                </div>
                &nbsp;
                <div class="col-sm-2">
                    <input type="button" value="Search" name="search" id="search" class="btn btn-md btn-block btn-outline-primary">
                </div>
                &nbsp;
                <div class="col-sm-2">
                    <input type="submit" value="Update" name="btn" id="update" class="btn btn-md btn-block btn-outline-primary">
                </div>
            </div>
            <div class="row">
                &nbsp;
            </div>
            <div class="row">
                &nbsp;
            </div>
        </div>
    </form>


</body>

</html>
