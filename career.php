<?php
include_once 'config.php';
include_once 'bus_logic.php';
session_start();

if (isset($_POST["submit"])) {

    $obj = new clsworkers();
    $obj->name = $_POST["name"];
    $obj->gender = $_POST["gender"];
    $obj->dob = $_POST["dob"];
    $obj->mob = $_POST["mobile"];
    $obj->bank = $_POST["bank"];
    $obj->mail = $_POST["email"];
    $obj->pwd = $_POST["password"];
    $obj->ctry = $_POST["country"];
    $obj->state = $_POST["state"];
    $obj->distt = $_POST["city"];
    $obj->field_cod = $_POST["field"];
    $obj->quali = $_POST["quali"];
    $obj->expert = $_POST["expert"];
    $obj->exp = $_POST["exp"];
    $obj->pic = $_FILES["pic"]["name"];
    $obj->sts = "u";
    $res = $obj->build_career();
    if ($_FILES["pic"]["name"] != "") {
        move_uploaded_file($_FILES["pic"]["tmp_name"], "images/" . $_FILES["pic"]["name"]);
    }


    if ($res == TRUE) {
        echo "<script> alert('Data upload successfully...');</script>";
    } else {
        echo "<script> alert('Entered username $obj->mail or bank account already exist...'); </script>";
    }
}
?>
<!DOCTYPE HTML>
<html>

    <head>
        <title>Build your career</title>
        <meta name="description" content="here you can easily build your career and find workers and also find jobs">
        <meta name="keywords" content="eazywages career, career,online jobs, jobs, workers">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scall=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="jquery-3.2.1.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <style>
            .jumbotron#form{background-image: url(Images/old-blue-bus-2-1451006-1598x1065.jpg);
                            height: px;  
            }
            label{ color: ghostwhite; }
            #career-form{width: 90%;margin-left: 54px; padding: 20px;}
            label{color: black;}



            #btn1{padding: 30px; width: 100%; }
            #btn1:hover{padding: 30px; background-color: #28a4c9;}

            #gender{font-size: 16px;padding: 6px;}
            #form1{margin: 2px;}
        </style>



    </head>

    <body>
        <nav class="navbar navbar-inverse   navbar-fixed-top">
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
                        <li class="active"><a href="home_page.php"  style="font-size: 15px;"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>

                        <li>
                            <a href="career.php"   style="font-size: 15px;"><span class="glyphicon glyphicon-globe"></span> Carrer</a>
                        </li> 
                        <li>
                            <a href="home_page.php#find"  style="font-size: 15px;"><span class="glyphicon glyphicon-search"></span> Find Workers</a>
                        </li>
                        <li><a href="#about"  style="font-size: 15px;"><span class="glyphicon glyphicon-book"></span> About</a></li>
                        <li><a href="#services"  style="font-size: 15px;"><span class="glyphicon glyphicon-list"></span> Services</a></li>
                        <li><a href="#cont"  style="font-size: 15px;"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>


                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php" style="font-size: 15px;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php" style="font-size: 15px; background-color: red;"><span class="glyphicon glyphicon-pencil"></span> Comment</a></li>
                        <li><a href="user.php" style="font-size: 15px;">
                                <?php
                                if (isset($_SESSION["un"]) && isset($_SESSION["upwd"])) {
                                    $eml = $_SESSION["un"];
                                    $con = new clscon();
                                    $link = $con->dbconnect();
                                    $qry = "CALL user_data_fetch('$eml')";
                                    $res = mysqli_query($link, $qry);
                                    while ($r = mysqli_fetch_row($res)) {

                                        echo '<span class="glyphicon glyphicon-user"></span>Hello ' . $r[1];
                                    }
                                }
                                ?>
                            </a>
                        </li>
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
                                <img src="images/celebration.png" style="width: 75px; ">
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
                <b style=" font-size: 50px; color: #900000; ">Build Your Career</b>
                <hr >
            </div>
        </div>


        <br><br><br><br> <br><br><br><br> <br><br><br><br> <br><br><br><br> <br>

        <div class="row " id="career-form">
            <form  name="career" action="career.php" method="POST" enctype="multipart/form-data">


                <div class="col-md-6" style="border: 1px solid ;border-color: menu"id="form1">
                    <fieldset>
                        <legend><h2>Personal Details</h2></legend>
                        <label for="name"  style="font-size: 15px;">Full Name</label>
                        <input type="text" required id="name"  style="font-size: 15px;" class="form-control" name="name" placeholder="Full Name">
                        <br>
                        <label for="gender"  style="font-size: 15px;">Gender</label><br>

                        <input type="radio"  style="font-size: 15px;"name="gender"  required value="male" id="gender" /><b>Male</b>&nbsp;
                        <input type="radio"   style="font-size: 15px;"name="gender" required value="female" id="gender"/><b>Female</b>&nbsp;
                        <br><bR>
                        <label for="dob"  style="font-size: 15px;">D.O.B.</label>
                        <input type="date"  style="font-size: 15px;" required id="dob" name="dob" placeholder="D.O.B." class="form-control">
                        <br>
                        <label for="mobile"  style="font-size: 15px;">Mobile No.</label>
                        <input type="number"  style="font-size: 15px;" required id="mobile" name="mobile" placeholder="Mobile No." class="form-control">
                        <br>

                        <label for="bank"  style="font-size: 15px;">Bank Account No. </label>
                        <input type="number"  style="font-size: 15px;" required id="bank" name="bank" placeholder="Bank Account No." class="form-control">
                        <br>

                        <label for="email"  style="font-size: 15px;">Email ID / Username</label>
                        <input type="email"  style="font-size: 15px;" required id="email" name="email" placeholder="Email ID / Username" class="form-control">
                        <br>                       
                        <label for="pwd"  style="font-size: 15px;">Password</label>
                        <input type="password"  style="font-size: 15px;"required id="pwd" name="password" placeholder="Password" class="form-control"
                               title="Remember your password"  data-content="A password should contains atleast 6 character and it should also include wild card character(@,#,$,_)"
                               data-trigger="hover" >
                        <br>


                        <?php
                        $con = new clscon();
                        $link = $con->dbconnect();
                        $qry = "CALL fetch_country()";
                        $res = mysqli_query($link, $qry);
                        ?>
                        <label for="country">Choose Country</label>
                        <select id="country" class="form-control" name="country">
                            <option value="" class="form-control" selected="selected" disabled="disabled">--Select Country--</option>
                            <?php
                            if ($res > 0) {
                                while ($row = mysqli_fetch_row($res)) {
                                    echo '<option  class=form-control value="' . $row[0] . '">' . $row[2] . '</option>';
                                }
                            } else {
                                echo '<option  class=form-control value="">Country not available</option>';
                            }
                            ?>
                        </select>
                        <label for="state">Choose State</label>
                        <select id="state"  class="form-control" name="state">
                            <option value="" class="form-control" selected="selected" disabled="disabled" >--Select country first--</option>
                        </select>
                        <label for="city">Choose city</label>
                        <select id="city"  class="form-control" name="city">
                            <option value=""  class="form-control" selected="selected" disabled="disabled">--Select state first--</option>
                        </select>



                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#country').on('change', function () {
                                    var countryID = $(this).val();
                                    if (countryID) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'ajaxData.php',
                                            data: 'country_id=' + countryID,
                                            success: function (html) {
                                                $('#state').html(html);
                                                $('#city').html('<option value="">Select state first</option>');
                                            }
                                        });
                                    } else {
                                        $('#state').html('<option value="">Select country first</option>');
                                        $('#city').html('<option value="">Select state first</option>');
                                    }
                                });

                                $('#state').on('change', function () {
                                    var stateID = $(this).val();
                                    if (stateID) {
                                        $.ajax({
                                            type: 'POST',
                                            url: 'ajaxData.php',
                                            data: 'state_id=' + stateID,
                                            success: function (html) {
                                                $('#city').html(html);
                                            }
                                        });
                                    } else {
                                        $('#city').html('<option value="">Select state first</option>');
                                    }
                                });
                            });
                        </script>


                        <?php
                        $con = new clscon();
                        $link = $con->dbconnect();
                        $qry = "CALL fetch_category()";
                        $res = mysqli_query($link, $qry);
                        ?>

                        <br>
                        <span class="glyphicon glyphicon-arrow-right btn-lg" style="float:right;"></span>
                        <br><Br>
                    </fieldset>
                </div>
                <div class="col-md-5"style="border:solid 1px;border-color: menu;" id="form1">
                    <fieldset>
                        <legend><h2>Expertise/ Qualifications</h2></legend>
                        <label for="field">Choose your work field</label>
                        <select id=field class="form-control" name="field">
                            <option value="" selected="selected" disabled="disabled">-- Select field --</option>


                            <?php
                            if ($res > 0) {
                                while ($row = mysqli_fetch_row($res)) {
                                    echo '<option  class=form-control value="' . $row[0] . '">' . $row[1] . '</option>';
                                }
                            } else {
                                echo '<option  class=form-control value="">Fields not available</option>';
                            }
                            ?>
                        </select>


                        <fieldset>

                            <legend>Highest Education</legend>

                            <select class="form-control dropdown" id="education" name="quali">

                                <option value="" selected="selected" disabled="disabled">-- select one --</option>

                                <option value="No formal education">No formal education</option>

                                <option value="Primary education">Primary education</option>

                                <option value="Secondary education">Secondary education or high school</option>

                                <option value="GED">GED</option>

                                <option value="Vocational qualification">Vocational qualification</option>

                                <option value="Bachelor's degree">Bachelor's degree</option>

                                <option value="Master's degree">Master's degree</option>

                                <option value="Doctorate or higher">Doctorate or higher</option>

                            </select>

                        </fieldset>
                        <br>    
                        <label for="exp"  style="font-size: 15px;">Expertise / Knowledge</label>
                        <textarea name="expert" id="expert" rows="3" cols="3" placeholder="Write your expertise and your knowledge" class="form-control"></textarea>
                        <br>    
                        <label for="exp"  style="font-size: 15px;">Experience(in months)</label>
                        <input type="number"  style="font-size: 15px;" required id="exp" name="exp" placeholder="Experience in months" class="form-control">
                        <br>                
                        <label for="pic"  style="font-size: 15px;">Choose your Photo</label>
                        <input type="file"  style="font-size: 15px;" required id="pic" name="pic" class="form-control">
                        <br>                

                        <br>
                    </fieldset>

                    <div class="full-r">

                        <input type="submit" style="font-size: 20px;" name="submit" onclick="return data_check(); return false;" value="Build Your Career">
                    </div>
                </div>


                <br><Br><Br>
            </form>

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
                                        <div class="nwe-one" style=" font-family:  serif; color: dimgrey ; font-size: 15px;">
                                            <a href="http://www.instagram.com/aman_thakur_rana"> AMAN KUMAR THAKUR</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="items">
                                    <div class="item-border">
                                        <div class="nwe-one"  style="font-family:  serif; color: dimgrey ; font-size: 15px;">
                                            <a href="http://www.instagram.com/kartik_sohal">  KARTIK SOHAL</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="items" style=" float:  ;  font-family:  serif; color: dimgray; font-size: 15px;">
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
                <div class="bottom">
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
                <script src="assets/js/jquery-2.1.4.js" type="text/javascript"></script> 
                <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
                <script>
                           $(document).ready(function () {
                               $("#name").tooltip({title: "Enter your full name", animation: true, placement: "top"});
                               $("#gender").tooltip({title: "Choose your gender", animation: true, placement: "top"});
                               $("#dob").tooltip({title: "DOB", animation: true, placement: "top"});
                               $("#mobile").tooltip({title: "Enter your mobile number", animation: true, placement: "top"});
                               $("#bank").tooltip({title: "Enter your bank account number", animation: true, placement: "top"});
                               $("#email").tooltip({title: "Enter your email/gmail address and remember it to login", animation: true, placement: "top"});
                               $("#pwd").tooltip({title: "Please remember the password to login", animation: true, placement: "top"});

                               $("#pwd").popover();
                               $("#expert").tooltip({title: "Your expertise and knowledge", animation: true, placement: "top"});
                               $("#exp").tooltip({title: "Enter your experience in your specified field", animation: true, placement: "top"});
                               $("#pic").tooltip({title: "Choose your photo", animation: true, placement: "top"});
                               $("#field").tooltip({title: "Choose your work field", animation: true, placement: "top"});
                           });

                           function data_check() {
                               var mob = document.getElementById("mobile").value;
                               var acc = document.getElementById("bank").value;
                               var pwd = document.getElementById("pwd").value;

                               if (mob.length < 10)
                               {
                                   alert("Please enter a valid mobile number");
                                   return false;
                               }
                               if (mob.length > 10)
                               {
                                   alert("Please enter a valid mobile number");
                                   return false;
                               }


                               if (acc.length < 12)
                               {
                                   alert("Please enter a valid bank account number");
                                   return false;
                               }
                               if (acc.length > 12)
                               {
                                   alert("Please enter a valid bank account number");
                                   return false;
                               }
                               if (pwd.length < 6)
                               {
                                   alert("Your password must have atleast 6 character");
                                   return false;
                               }
                           }
                </script>   
                </body>
                </html>
