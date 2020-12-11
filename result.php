<?php
include_once './config.php';
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>

        <title>EazyWages workers</title>
        <meta name="description" content="Eazy Wages workers">
        <meta name="keywords" content="EazyWages, EAZYWAGES, eazywages, easywages,easy wages, eazy wages, workers, labour, doctor, carpenter, online job,"

              <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scall=1">
        <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="jquery-3.2.1.min.js"></script>
        <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <style>
            .jumbotron#form{background-image :  url(Images/old-blue-bus-2-1451006-1598x1065.jpg);
                            height :  px;  
            }
            label{ color :  ghostwhite; }
            #workers11{background-color :  ghostwhite;}

            #field{display :  inline-block; }
            #workers{text-decoration :  none;display :  block; padding :  50px; margin :  5px; font-size :  20px; color :  black;}
            #workers : hover{background-color :  white;}


        </style>
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
                    <a class="navbar-brand" href="#" style="font-size :  15px;"><strong style="color : #900000;">E</strong>azy<b style="color : #900000;">W</b>ages</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="home_page.php"  style="font-size :  15px;">
                                <span class="glyphicon glyphicon-home">&nbsp;</span>Home</a></li>

                        <li>
                            <a href="career.php"   style="font-size :  15px;">
                                <span class="glyphicon glyphicon-globe"></span> Career</a>
                        </li> 
                        <li>
                            <a href="home_page.php#find"  style="font-size :  15px;"><span class="glyphicon glyphicon-search"></span>
                                Find Workers</a>
                        </li>

                        <li><a href="#about"  style="font-size :  15px;"><span class="glyphicon glyphicon-book"></span> About</a></li>
                        <li><a href="#services"  style="font-size :  15px;"><span class="glyphicon glyphicon-list"></span> Services</a></li>
                        <li><a href="#cont"  style="font-size :  15px;"><span class="glyphicon glyphicon-phone-alt"></span> Contact Us</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.php" style="font-size :  15px;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="signup.php" style="font-size :  15px; background-color: red;"><span class="glyphicon glyphicon-pencil"></span>  Comment</a></li>
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
            <div class="container" style="height :  30px;">
                <div class="row">
                    <div class="col-sm-12">
                        <!--       LOGO    -->
                        <div class="logo">
                            <h1 style="font-size :  50px;">
                                <img src="images/celebration.png" style="width :  75px; ">
                                <u><b style=" color :  #900000;">E</b>az</u>y<b style="color : #900000;">W</b>ages
                            </h1>
                            <p style="font-size :  25px; font-family :  cursive;">We'll take more care of you.......</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="headings">
            <div class="container">
                <b style=" font-size: 50px; color: #900000; "> <?php
                    //heading field
                    if (isset($_SESSION["category"])) {
                        $con = new clscon();
                        $link = $con->dbconnect();
                        $field = $_SESSION["category"];
                        $qry = "select fname from category where fcode=$field";
                        $res = mysqli_query($link, $qry);
                        while ($r = mysqli_fetch_row($res)) {
                            $_SESSION["cat"]=$r[0];
                            echo "<h1>$r[0]s</h1>";
                        }
                    }
                    ?></b>
                <hr >
            </div>
        </div>

        <br><br><br><br><br><br><br><br> <br><br><br><br> 
        <div class="container">



            <br><br>
            <!-- FURTHER DESIGNING STARTS HERE   -->
<?php
if (isset($_POST["btnsb"])) {
    $con = new clscon();
    //echo '<table><tr>';
    $id = $_SESSION["category"];
    $cnt = $_POST["cntry"];
    $stid = $_POST["state"];
    $citid = $_POST["city"];
    $link = $con->dbconnect();
    $qry = "call fetch_workers($id,$cnt,$stid,$citid)";
    $res = mysqli_query($link, $qry);
    if (mysqli_fetch_row($res) >= 1) {
        while ($r = mysqli_fetch_row($res)) {
            // echo '<td>'.$r[0].'</td>';
            echo "<div class='row alert alert-info'>";
            echo "<div class='col-md-3'>";
            echo '<br><img src=images/' . $r[13] . ' width=90% height=auto alt=noimage>';
            echo "</div>";
            echo "<div class='col-md-7 alert alert-success'>";
            echo "<fieldset>";
            echo "<legend>Personal Details</legend>";
            echo '<h3> Name        :  '.$_SESSION["cat"] .' ' . $r[1] . '</h3>';
            echo "<section>";
            echo '<h4>Gender      :  ' . $r[2] . '</h4>';
            echo '<h4>D.O.B       :  ' . $r[3] . '</h4>';

            echo '<h4>Mobile No.  :  ' . $r[4] . '</h4>';
            echo '<h4>Account No. :  ' . $r[5] . '</h4>';
            echo '<h4>Mail        :  ' . $r[6] . '</h4>';
            echo "</fieldset>";
            echo "<br>";
            echo "<fieldset>";
            echo "<legend>Address details</legend>";
            echo '<h4>Country        :  ' . $r[8] . '</h4>';
            echo '<h4>State        :  ' . $r[9] . '</h4>';
            echo '<h4>City        :  ' . $r[10] . '</h4>';
            echo "</fieldset>";
            echo "<br>";
            echo "<fieldset>";
            echo "<legend>Expertise/ Knowledge</legend>";
            echo '<h4>Highest Education        :  ' . $r[15] . '</h4>';
            echo '<h4>Expertise / Knowledge        :  ' . $r[16] . '</h4>';
            echo '<h4>Experience   :  ' . $r[12] . ' months</h4>';
            echo"</fieldset>";
            echo "</div>";
        }
    } else {
        echo ' <div class="jumbotron " style = "padding:20px; margin-left: 100px;margin-bottom:0px;margin-right: 100px;width: 1100px;height: auto;border: 1px solid menu; border-radius: 5px; ;">';
        echo "<h2><strong style=color:red;>Oops..........  </strong>Workers not available here....!</h2>";
        echo "</div>";
    }
}
?>

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
    </body>
</html>
