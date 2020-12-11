<?php
//Include the database configuration file
include './config.php';

if(!empty($_POST["country_id"])){
    //Fetch all state data
    $con=new clscon();
    $link=$con->dbconnect();
    
    $qry ="SELECT * FROM states WHERE country_id = ".$_POST['country_id']." ORDER BY name ASC";
    $res= mysqli_query($link, $qry);
    
    //State option list
    if($res > 0){
        echo '<option class=form-control value="">Select state</option>';
        while($row = mysqli_fetch_row($res)){ 
            echo '<option class=form-control value="'.$row['0'].'">'.$row[1].'</option>';
        }
    }else{
        echo '<option class=form-control value="">State not available</option>';
    }
}elseif(!empty($_POST["state_id"])){
    $con=new clscon();
    $link=$con->dbconnect();
    //Fetch all city data
    $qry ="SELECT * FROM cities WHERE state_id = ".$_POST['state_id']." ORDER BY name ASC";
    $res= mysqli_query($link, $qry);
 
    //City option list
    if($res > 0){
        echo '<option value="" class=form-control selected="selected" disabled="disabled">--Select city--</option>';
        while($row = mysqli_fetch_row($res)){ 
            echo '<option class=form-control value="'.$row['0'].'">'.$row[1].'</option>';
        }
    }else{
        echo '<option value="" class=form-control>City not available</option>';
    }
}
?>