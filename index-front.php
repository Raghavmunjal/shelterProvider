<html>

<head>

    <title>Index</title>

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

        .ok {
            border: 1px solid green;
        }

        .notok {
            border: 1px solid red;
        }

        .fontuser {
            position: relative;
        }

        .fontuser i {
            position: absolute;
            left: 440px;
            top: 13px;
            color: black;
        }

        .fontuserr {
            position: relative;
        }

        .fontuserr i {
            position: absolute;
            left: 440px;
            top: 11px;
            color: black;
        }

        .clr {
            color: whitesmoke;
        }

        .clr:hover {
            text-decoration: underline;
            font-weight: 900;
        }

        .clrr {
            color: red;
        }

        .frgt {
            cursor: pointer;
            margin-left: 5px;
            color: gray;
        }

        .frgt:hover {
            color: #4183f2;
            text-decoration: underline;
            font-weight: 500;
        }

        .id {
            padding-left: 30px;
        }

    </style>

    <script>
        $(document).ready(function() {
            $("#eye").mousedown(function() {
                $("#pwd").attr("type", "text");
                $("#eye").addClass("fa-eye-slash").removeClass("fa-eye");
            })
            $("#eye").mouseup(function() {
                $("#pwd").attr("type", "password");
                $("#eye").addClass("fa-eye").removeClass("fa-eye-slash");
            })
            $("#eyee").mousedown(function() {
                $("#pwdlog").attr("type", "text");
                $("#eyee").addClass("fa-eye-slash").removeClass("fa-eye");
            })
            $("#eyee").mouseup(function() {
                $("#pwdlog").attr("type", "password");
                $("#eyee").addClass("fa-eye").removeClass("fa-eye-slash");
            })
            var a = 0;
            var a1 = 0;
            $("#uid").blur(function() {
                var getuid = $(this).val();
                var uidtest = /^[a-zA-Z_]*$/;
                var uidres = uidtest.test(getuid);
                if (getuid == "") {
                    a = 0;
                    $("#uid").removeClass("ok").addClass("notok");
                    $("#erruid").html("Please fill");
                } else if (uidres == false) {
                    a = 0;
                    $("#uid").removeClass("ok").addClass("notok");
                    $("#erruid").html("Invalid code");
                } else {
                    a = 1;
                    $("#uid").removeClass("notok").addClass("ok");
                    $("#erruid").html("");
                }
                if (a == 1) {
                    var url = "index-ajax.php?user=" + getuid + "&what=uid"; //query string
                    $.get(url, function(response) {
                        $("#erruid").html(response);
                        if (response == "Not Available") {
                            a1 = 0;
                            $("#uid").removeClass("ok").addClass("notok");
                        } else {
                            a1 = 1;
                            $("#uid").removeClass("notok").addClass("ok");
                        }
                    });

                }
            })
            var b = 0;
            //var b1 = 0;
            $("#mob").blur(function() {
                var getmob = $(this).val();
                var mobtest = /^[0-9]{3,4}/;
                var mobres = mobtest.test(getmob);
                if (getmob == "") {
                    b = 0;
                    $("#mob").removeClass("ok").addClass("notok");
                    $("#errmob").html("Please fill");
                } else if (mobres == false) {
                    b = 0;
                    $("#mob").removeClass("ok").addClass("notok");
                    $("#errmob").html("Please fill correct value");
                } else {
                    b = 1;
                    $("#mob").removeClass("notok").addClass("ok");
                    $("#errmob").html("");
                }
                /* if (b == 1) {
                     var url = "index-ajax.php?user=" + getmob + "&what=mob";
                     $.get(url, function(response) {
                         $("#errmob").html(response);
                         if (response == "Taken") {
                             $("#mob").removeClass("ok").addClass("notok");
                             b1 = 0;
                         } else {
                             b1 = 1;
                             $("#mob").removeClass("notok").addClass("ok");
                         }
                     });

                 }*/
            });

            var c = 0;
            $("#pwd").blur(function() {
                var getpwd = $(this).val();
                var pwdtest = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
                if (getpwd == "") {
                    c = 0;
                    $(this).addClass("notok").removeClass("ok");
                    $("#errpwd").html("Please fill your password");
                } else if (pwdtest.test(getpwd) == false) {
                    c = 0;
                    $(this).addClass("notok").removeClass("ok");
                    $("#errpwd").html("Please fill correct password");
                } else {
                    c = 1;
                    $("#errpwd").html("");
                    $(this).addClass("ok").removeClass("notok");
                }
            });

            /* $("#pwd").click(function() {
                 alert("password must contain 8 or more than 8 one uppercase one lowercase one special character");
             });*/

            $("#pwd").keypress(function() {
                $("#eye").show();
            });


            var d = 0;
            $("#type").blur(function() {
                var gettype = $(this).val();
                if (gettype != null) {
                    $(this).addClass("ok").removeClass("notok");
                    d = 1;
                } else {
                    d = 0;
                    $(this).addClass("notok").removeClass("ok");
                }
            });

            $("#sign").click(function(ev) {
                //var today = new Date();
                //var getday = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

                if (a == 0 || a1 == 0) {
                    alert("please check your userid");
                    $("#uid").focus();
                    ev.preventDefault();
                } else if (b == 0) {
                    alert("please check your mobile number");
                    $("#mob").focus();
                    ev.preventDefault();
                } else if (c == 0) {
                    alert("please check your passsword");
                    $("#pwd").focus();
                    ev.preventDefault();
                } else if (d == 0) {
                    alert("please select ");
                    $("#type").focus();
                    ev.preventDefault();
                } else if (a == 1 && a1 == 1 && b == 1 && c == 1 && d == 1) {

                    var queryString = $("#signupFrm").serialize();
                    alert(queryString);

                    var url = "index-ajaxinsert.php?" + queryString;

                    $.get(url, function(response) {
                        $("#errsign").html(response);
                    })
                }
            });

            $("#pwdlog").keypress(function() {
                $("#eyee").show();
            });

            $("#login").click(function() {
                var getuidlog = $("#uidlog").val();
                var getpwdlog = $("#pwdlog").val();
                var urllog = "index-ajaxlogin.php?userr=" + getuidlog + "&pwdd=" + getpwdlog;
                $.get(urllog, function(responselog) {

                    if (responselog == "Doctor") {
                        location.href = "dr-register-front.php";
                    } else if (responselog == "Shelter Provider") {
                        location.href = "sh-register-front.php";
                    } else if (responselog == "Citizen") {
                        location.href = "dr-register-front.php";
                    } else if (responselog == "Pharmacy") {
                        location.href = "ph-register-front.php";
                    } else {
                        $("#errlogin").html(responselog);
                        $("#errlogin").css('color', 'red');
                        $("#errlogin").css('font-size', '16px');
                    }

                })
            });
        })

    </script>
</head>

<body class="bgg">

    <!--- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-light fixed-top" style="background-color:#4183f2;color:whitesmoke;">

        <a class="navbar-brand" href="#">
            <img src="picss/profile.png" style="width:60px; height:60px;cursor: pointer; border-radius:50%" class="d-inline-block">
        </a>

        <a class="navbar-brand" href="#" style="float:left; margin-top:5px ; color: whitesmoke;">Pet's Care</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#signup"><i class="fa fa-user-plus" aria-hidden="true" style="color:whitesmoke;"></i>&nbsp;<b class="clr">Sign Up</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginn"><i class="fa fa-key" aria-hidden="true" style="color:whitesmoke;"></i>&nbsp;<b class="clr">Login</b></a>
                </li>
            </ul>
        </div>
    </nav>

    <!---Modal-->
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: ghostwhite">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#4183f2">Signup here!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" class="bgg">
                    <form id="signupFrm">
                        <div class="form-group">

                            <center>
                                <img src="picss/pets1.jpg" style="border-radius: 50% ;width:160px;height:160px;">
                            </center>
                        </div>

                        <div class="form-group">


                            <input type="text" class="form-control" id="uid" name="uid" placeholder="User id">
                            <small id="erruid" class="form-text text-muted"></small>

                        </div>
                        <div class="form-group">
                            <div class="fontuser">
                                <input type="password" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Password must contain 8 or more than 8 one uppercase one lowercase one special character" id="pwd" name="pwd" placeholder="Password">
                                <i id="eye" class="fa fa-eye" aria-hidden="true" style="display: none;"></i>
                            </div>
                            <small id="errpwd" class="form-text text-muted"></small>

                        </div>
                        <div class="form-group">

                            <input type="tel" class="form-control" id="mob" name="mob" placeholder="Mobile Number">
                            <small id="errmob" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">

                            <select name="type" id="type" class="custom-select" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Shelter Provider">Shelter Provider</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Citizen">Citizen</option>
                        </div>

                        <input type="button" value="Sign up" id="sign" class="btn btn-primary" style="margin-top: 20px; margin-left: 190px;">
                        <small id="errsign" class="form-text text-muted"></small>

                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
    <!----Modalsss 2 --->
    <div class="modal fade" id="loginn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: ghostwhite">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:#4183f2">Login!! </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" class="bgg">
                    <form>
                        <div class="form-group">
                            <center>
                                <img src="picss/pets1.jpg" style="border-radius: 50% ;width:160px;height:160px;">
                            </center>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="uidlog" name="uidlog" placeholder="User id">
                            <small id="erruidlog" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <div class="fontuserr">
                                <input type="password" class="form-control" id="pwdlog" name="pwdlog" placeholder="Password">
                                <i id="eyee" class="fa fa-eye" aria-hidden="true" style="display: none;"></i>
                            </div>
                            <small id="errpwdlog" class="form-text text-muted"></small>
                        </div>
                        <input type="button" value="Login" id="login" class="btn btn-primary" style="margin-top: 10px; margin-left: 190px; margin-bottom: 20px;width:80px;">
                        <center><small id="errlogin" class="form-text"></small></center>
                        <br>
                        <div class="form-group">
                            <p class="frgt">Forgot Password?</p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-----carousel----------
    <div class="container">
        <div id="carouselExampleCaptions" class="carousel slide" data-interval="3000" data-ride="carousel" style="margin-top:120px;width:1000px;margin-left:45px;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="picss/shelter1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="picss/shelter2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="picss/shelter1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>--->
    <!----CARDS-------
     <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-4">
                <div class="card border-primary" style="width:80%">
                    <img src="picss/fish.jpg" class="card-img-top" alt="..." style="border-radius:50%;width:30%;margin-left:100px;margin-top:20px;">
                    <div class="card-body">
                        <center>
                            <h5 class="card-title"><b>Buy a pet</b></h5>
                        </center>
                        <p class="card-text"><i>Fantastic Beaches,Carnival,Water Sports,Cathedral,Wildlife,Waterfalls,Cashew Nuts.</i></p>
                        <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#booknow-modal">Book Now</a>
                    </div>
                </div>
            </div>


        </div>


    </div>--->


</body>

</html>
