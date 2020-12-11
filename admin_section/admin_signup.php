<?php
include_once '../bus_logic.php';
session_start();

if (isset($_POST["signup"])) {
    $sign = new user();
    $sign->name = $_POST["name"];
    $sign->uname = $_POST["email"];
    $sign->pwd = $_POST["pwd"];
    $sign->mobile = $_POST["phone"];
    $sign->reg_date = date('y- m - d');
    $sign->sts = 'A';
    $res = $sign->user_signup();
    if ($res == TRUE) {
        $_SESSION["res"] = "res";
        header("location:login.php");
    } else {
        echo "<script>alert('Username or mobile no. already exist...')</script>";
    }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>EazyWages</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scall=1">
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="../jquery-3.2.1.min.js"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script>

            function check_sign()
            {
                var pwd = document.getElementById("pwd").value;
                var rpwd = document.getElementById("rpwd").value;
                var phone = document.getElementById("phone").value;
                /* alert(pwd);
                 alert(rpwd);
                 alert(phone);*/
                if (pwd.length >= 1)
                {
                    if (pwd.length <= 7)
                    {
                        alert("Password should be atleast 8 character");
                        return false;
                    }
                }
                if (pwd != rpwd)
                {
                    alert("Entered password doesn't match");
                    return false;
                }
                if (phone.length > 1)
                {
                    if (phone.length < 10 || phone.length > 10)
                    {
                        alert("Please enter a valid number");
                        return false;
                    }
                }

            }
        </script>
    </head>

    <body>
        <nav class="navbar navbar-inverse  navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>    
                        <span class="icon-bar"></span>    
                    </button>
                    <a class="navbar-brand" href="#" style="font-size: 15px;"><strong style="color:#900000;">E</strong>azy<b style="color:#900000;">W</b>ages</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="../home_page.php"  style="font-size: 15px;"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>
                        <li><a href="admin_upload_data.php"  style="font-size: 15px;"> Upload Category</a></li>
                        <li>
                            <a href="upload_state.php"   style="font-size: 15px;">Upload Distt.</a>
                        </li> 
                        <li>
                            <a href="upload_tehsil.php"  style="font-size: 15px;">Upload country</a>
                        </li>
                        <li><a href="#about"  style="font-size: 15px;"><span class="glyphicon glyphicon-book"></span> About</a></li>
                        <li><a href="#services"  style="font-size: 15px;"><span class="glyphicon glyphicon-list"></span> Services</a></li>
                        <li><a href="#cont"  style="font-size: 15px;"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../login.php" style="font-size: 15px;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    </ul>

                </div>
            </div>
        </nav>
        <header>
            <div class="container" style="height: 30px;">
                <div class="row">
                    <div class="col-sm-4">
                        <!--       LOGO    -->
                        <div class="logo">
                            <h1 style="font-size: 50px;">
                                <img src="../images/celebration.png" style="width: 75px; ">
                                <u><b style=" color:#900000;">E</b>az</u>y<b style="color:#900000;">W</b>ages
                            </h1>
                            <p style="font-size: 25px; font-family: cursive;">We'll take more care of you.......</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="headings">
            <div class="container">
                <h3  style=" font-size: 20px; color: #900000;">Admin Sign Up</h3>
                <div class="breadcrum"><a href="../home_page.php" style="font-size: 20px;"><b>Home</b></a> / <a href="../signup.php" style="font-size: 20px;"><b>Sign Up</b></a></div>
            </div>
        </div>
        <div class="content-part">
            <div class="container">
                <div class="login-form">
                    <form class="loginform" name="signup" action="admin_signup.php" method="POST">
                        <div class="full-r">
                            <center><b style=" font-size: 35px; color: #900000; ">Admin SignUp</b></center><hr>
                            <label for="name" style="font-size: 20px;">Name</label>
                            <input type="text" style="font-size: 20px;" id="name" required name="name" placeholder="Name">
                        </div>
                        <div class="full-r">
                            <label for="email"  style="font-size: 20px;">Email-ID / Username</label>
                            <input type="email" style="font-size: 20px;" id="email" required name="email" placeholder="e-mail">
                        </div>
                        <div class="full-r">
                            <label for="pwd" style="font-size: 20px;">Password</label>
                            <input type="password"  style="font-size: 20px;" id="pwd" required name="pwd" placeholder="Password">
                        </div>
                        <div class="full-r">
                            <label for="rpwd" style="font-size: 20px;">Confirm password</label>
                            <input type="password"  style="font-size: 20px;"id="rpwd" name="rpwd" required placeholder="Confirm Password">
                        </div>
                        <div class="full-r">
                            <label for="phone" style="font-size: 20px;">Phone</label>
                            <input type="number"  style="font-size: 20px;"id="phone" name="phone" required placeholder="+(999) 858 96">
                        </div>
                        <div class="full-r">

                            <input onclick="return check_sign()" style="font-size: 20px;" type="submit" name="signup" value="Sign Up">
                        </div>

                    </form>
                </div>
            </div>
            <div class="content-part">
                <div class="container">
                    <div class="about-data">
                        <div class="heading-text">
                            <h2>About EazyWages</h2>
                        </div>
                        <p>Lorem Ipsum is simply gourav text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>



                <div class="content-part">
                    <div class="container">

                        <div class="about-data">
                            <div class="heading-text">
                                <h2 id="about"><b style="font-size:50px; color:#900000;">About Us</b></h2>
                            </div>
                            <p style=" font-family: cursive; color: #ac2925;">Through this website you can search the location of any employee.
                                The user have to enter location and employee type click on search button.
                                The user can choose any nearest employee .</p>
                        </div>

                    </div>


                    <div class="content-part">

                        <div class="services-section">
                            <div class="container">
                                <h2 id="services"><b style="font-size:40px; color:#900000; font-family:  monospace;">SERVICES</b> <span></span></h2>
                                <div class="services-list">
                                    <ul>
                                        <li><i class="fa fa-check"></i>Through this website you can search any field of registered employee.</li>
                                        <li><i class=" fa fa-check"></i>Through this website you can choose nearest employee.</li>
                                        <li><i class=" fa fa-check"></i>It also helps to you create your own <a href="career.php">career</a>.</li>
                                        <li><i class=" fa fa-check"></i>Through this website you can also check the experience of employee.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="partners">
                            <div class="container">
                                <h2><b style="font-size:40px;  font-family:  monospace; font-size: 35px;">Our Partners </b>
                                    <span></span></h2>


                                <div class="logos" style=" float:  right;">
                                    <div class="items">
                                        <div class="item-border">
                                            <div class="nwe-one" style=" font-family:  serif; color: dimgrey ; font-size: 20px;">
                                                <a href="http://www.instagram.com/aman_thakur_rana"> AMAN KUMAR THAKUR</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items">
                                        <div class="item-border">
                                            <div class="nwe-one"  style="font-family:  serif; color: dimgrey ; font-size: 20px;">
                                                <a href="http://www.instagram.com/kartik_sohal">  KARTIK SOHAL</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="items" style=" float:  ;  font-family:  serif; color: dimgray; font-size: 20px;">
                                        <div class="item-border">
                                            <div class="nwe-one">
                                                <a href="http://www.instagram.com/gourav_thakur"> GOURAV THAKUR</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <footer class="footer">
                        <div class="footer-widgets">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="widget widget-text">
                                            <h4 class="widget-title" id="cont">Contact Us</h4>
                                            <div class="textwidget">
                                                <p>You can contact us at Distt. Una, Teh. Haroli Pincode 174503 of Himachal Pradesh</p>
                                            </div>
                                            <!-- /.textwidget -->
                                            <ul class="unstyled">
                                                <li class="mail"><a href="http://www.instagram.com/aman_thakur_rana">amanthakuronly4u@gmail.com</a></li>
                                                <li class="phone"><a href="#">+91 98169-58928</a></li>
                                            </ul>
                                        </div>
                                        <!-- /.widget --> 
                                    </div>
                                    <!-- /.col-md-3 -->

                                    <div class="col-md-3">
                                        <div class="widget widget-categories">
                                            <h4 class="widget-title" style=" color: red;">EazyWages</h4>
                                            <ul class="unstyled">

                                                <li><a href="#about">About EazyWages</a></li>
                                                <li><a href="#services">Our Services</a></li>
                                                <li><a href="#contact">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.col-md-3 -->

                                    <div class="col-md-3">
                                        <div class="widget widget-instagram">
                                            <h4 class="widget-title">instagram</h4>
                                            <div class="wrap-img">
                                                <div class="box-img"><a href="http://www.instagram.com/aman_thakur_rana"><img  src="assets/images/i1.jpg"alt="images"></a></div>
                                                <div class="box-img"><a href="http://www.instagram.com/kartik_sohal"> <img src="assets/images/i2.jpg" alt="images"></a></div>
                                                <div class="box-img"><a href="http://www.instagram.com/gourav_thakur"><img src="assets/images/i3.jpg" alt="images"></a></div>

                                            </div>
                                        </div>
                                        <!-- /.widget --> 
                                    </div>
                                    <!-- /.col-md-4 --> 
                                </div>
                                <!-- /.row --> 
                            </div>
                            <!-- /.container --> 
                        </div>
                        <!-- /.footer-widgets --> 
                    </footer>

                    <!-- Bottom -->
                    
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <ul class="text-center" style="color: ghostwhite;">copyright <span class="glyphicon glyphicon-copyright-mark"></span> EazyWages 2018  </ul>
                                    </div>
                                </div>
                                <!-- /.col-md-12 --> 
                            </div>
                            <!-- /.row --> 
                        </div>
                        <!-- /.container --> 
                    </div>

                    <script src="../assets/js/jquery-2.1.4.js" type="text/javascript"></script> 
                    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

                    </body>
                    </html>
