


<!-- Working perfectly-->

<?php
include_once '../bus_logic.php';
include_once '../config.php';
if (isset($_POST["upload"])) {
    $upl = new clsadmin();
    $upl->state_cod = $_POST["state"];
    $upl->distt = $_POST["distt"];
    $res = $upl->distt();
    // echo "$upl->state";
    //echo "$upl->state_cod";
    if ($res == TRUE) {
        echo "<script> alert('Data Upload Successfully... ')</script>";
    } else {
        echo "<script>alert('Entered Distt. is already exist...')</script>";
    }
}

if (isset($_REQUEST["delid"])) {
    $del = new clsadmin();
    $del->distt_cod = $_REQUEST["delid"];
    $res = $del->delete_distt();
    if ($res == TRUE) {
        echo "<script>alert ('Distt. Delete Successfully...')</script>";
    } else {
        echo "<script>alert ('Not Delete Successfully...')</script>";
    }
}

if (isset($_POST["update"])) {

    $upd = new clsadmin();
    $upd->cod = $_POST["dcod"];
    $upd->state_cod = $_POST["state"];
    $upd->distt = $_POST["distt"];
    $res = $upd->update_distt();
    if ($res == TRUE) {
        echo"<script>alert('Data update successfully....');</script>";
    } else {
        echo"<script>alert ('Data not update successfully....');</script>";
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>BusDekho</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scall=1">
        <link rel="stylesheet" type="text/css" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <script src="../jquery-3.2.1.min.js"></script>
        <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script>

        </script>

        <style>
            table{border:2px solid;}
            tr{border: 1px solid; }
            td{border: 1px solid;padding: 10px;}
            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top ">
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
                            <a href="upload_state.php"   style="font-size: 15px;"> Upload State</a>
                        </li> 
                        <li>
                            <a href="upload_distt.php"  style="font-size: 15px;">Upload Distt.</a>
                        </li>
                        <li>
                            <a href="upload_tehsil.php"  style="font-size: 15px;">Upload Country</a>
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
                <h3>Upload Distt.</h3>
                <div class="breadcrum"><a href="../home_page.php"><b>Home</b></a> / <a href="signup.php"><b>Sign Up</b></a></div>
            </div>
        </div>
        <div class="content-part">
            <div class="container">
                <div class="login-form">
                    <form  name="distt" action="upload_distt.php" method="POST">
                        <h1>Upload Distt.</h1>
                        <hr>
                        <label for="distt">Enter distt. name</label>
                        <input type="text" id="distt" required name="distt" class="form-control">

                        <label for="state">Choose state name of inputed distt.</label>
                        <select name="state" id="state" class="form-control" >
                            <?php
                            $con = new clscon();
                            $link = $con->dbconnect();
                            $qry = "CALL fetch_state()";
                            $res = mysqli_query($link, $qry);
                            while ($r = mysqli_fetch_row($res)) {
                                echo "<option value=" . $r[0] . ">$r[1]</option> ";
                            }
                            ?>
                        </select>
                        <br><Br>
                        <button  type="submit" name="upload" class="btn btn-primary"> Upload</button>


                    </form>
                </div>
            </div>

            <div class="container">
                <form name="table" action="upload_distt.php" method="POST">
                    <center>
                        <table>
                            <caption><h1>Uploaded Distt.</h1></caption>
                            <thead>
                            <th>Distt. Code</th>
                            <th>Distt. Name</th>
                            <th>State Name</th>
                            <th>Edit</th>
                            </thead>
                            <tbody>
                                <?php
                                if (!isset($_REQUEST["eid"])) {
                                    $con = new clscon();
                                    $link = $con->dbconnect();

                                    $qry = "CALL fetch_distt()";
                                    $res = mysqli_query($link, $qry);
                                    $i = 0;
                                    while ($r = mysqli_fetch_row($res)) {
                                        if ($i < 11) {
                                            $cod = $r[0];
                                            $distt = $r[1];
                                            $state = $r[4];
                                            echo "<tr><td>$cod</td><td>$distt</td><td>$state</td><td><a href='upload_distt.php?eid=$r[0]'>Edit</a> | <a href='upload_distt.php?delid=$r[0]'>Delete</a> </td></tr>";
                                        }
                                        $i++;
                                    }
                                } else {
                                    if (isset($_REQUEST["eid"])) {
                                        $con = new clscon();
                                        $cod = $_REQUEST["eid"];
                                        $link = $con->dbconnect();
                                        $qry = "CALL edit_distt($cod)";
                                        $res = mysqli_query($link, $qry);
                                        while ($r = mysqli_fetch_row($res)) {
                                           // $distt_name = $r[3];
                                            echo "<tr>";
                                            echo "<td><input readonly type='text' name='dcod' value='$r[0]'> </td>";
                                            echo '<td><input type="text" name="distt" value="'.$r[1].'"></td>';
                                            echo "<td>";
                                            echo" <select name='state' class='form-control'>";
                                            $con = new clscon();
                                            $link = $con->dbconnect();
                                            $qry = "CALL fetch_state() ";
                                            $res = mysqli_query($link, $qry);
                                            while ($r = mysqli_fetch_row($res)) {
                                                echo "<option value=$r[0]>$r[1]</option>";
                                            }
                                            echo "</select>";
                                            echo "</td>";
                                          //  echo "<td><input type='text'  name='distt' value='$distt_name'></td>";
                                            echo "<td><input type='submit' name='update' value='Update'> </td>";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </center>
                </form>
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
                <script src="../assets/js/jquery-2.1.4.js" type="text/javascript"></script> 
                <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

                </body>
                </html>
