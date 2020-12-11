<?php

include_once 'config.php';

class user {

    public $signusername, $signpwd, $name, $uname, $pwd, $mobile, $reg_date, $sts, $car_mail;

    public function user_signup() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL add_comments('$this->name','$this->uname','$this->mobile','$this->reg_date','$this->sts')";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            $con->dbclose();
            return TRUE;
        } else {
            $con->dbclose();
            return FALSE;
        }
    }

    public function admin_signup() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL signupinsertqry('$this->name','$this->uname','$this->pwd','$this->mobile','$this->reg_date','$this->sts')";
        $res = mysqli_query($link, $qry);
        if ($res == 1) {
            $con->dbclose();
            return TRUE;
        } else {
            $con->dbclose();
            return FALSE;
        }
    }

    public function login_check() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL check_login('$this->signusername','$this->signpwd',@cod,@rol)";
        $res = mysqli_query($link, $qry);
        $res1 = mysqli_query($link, "select @cod,@rol");

        $r = mysqli_fetch_row($res1);
        $con->dbclose();
        if ($r[0] == -1 || $r[0] == -2) {

            return FALSE;
            $con->dbclose();
        } else {
            $_SESSION["ucod"] = $r[0];
            $_SESSION["sts"] = $r[1];
            return TRUE;
            $con->dbclose();
        }
    }

}

class clsadmin {

    public $state, $state_cod, $distt_cod, $country, $distt, $cod, $catname, $catimg, $cat, $cat_pic, $phcode;

    public function upload_category() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL upload_category('$this->catname','$this->catimg')";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function del_cat() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL del_cat($this->cod)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function update_cat() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL update_cat('$this->cat','$this->cat_pic',$this->cod)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function state() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL upload_state('$this->state','$this->cod')";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function del_state() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL delete_state($this->state_cod) ";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function update_state() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL update_state($this->state_cod,'$this->state',$this->cod)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function distt() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL upload_distt($this->state_cod,'$this->distt')";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function update_distt() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL  update_distt ($this->cod,$this->state_cod,'$this->distt')";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function delete_distt() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL delete_distt($this->distt_cod)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function country() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL upload_country('none','$this->country',$this->phcode)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            $con->dbclose();
            return TRUE;
        } else {
            $con->dbclose();
            return FALSE;
        }
    }

    public function update_country() {
        $con = new clscon();
        $link = $con->dbconnect();

        $qry = "CALL  update_country ($this->cod,'$this->country',$this->phcode)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

    public function delete_country() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL del_country($this->cod)";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
            $con->dbclose();
        } else {
            return FALSE;
            $con->dbclose();
        }
    }

}

class clsworkers {

    public $name, $gender, $dob, $mob, $bank, $mail, $pwd, $ctry, $state, $distt, $field_cod,$quali,$expert, $exp, $pic,$cod,$sts;

    public function build_career() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL build_career ('$this->name','$this->gender','$this->dob','$this->mob','$this->bank','$this->mail','$this->pwd',$this->ctry,$this->state,$this->distt,$this->field_cod,'$this->quali','$this->expert',$this->exp,'$this->pic','$this->sts')";
        $res = mysqli_query($link, $qry);
        if (mysqli_affected_rows($link) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update_user_data() {
        $con = new clscon();
        $link = $con->dbconnect();
        $qry = "CALL user_data_update('$this->name','$this->gender','$this->dob',$this->mob,'$this->bank','$this->mail',$this->field_cod,'$this->exp','$this->pic',$this->cod)";
        $res= mysqli_query($link, $qry);
        if(mysqli_affected_rows($link)==1){
            return TRUE;
        } else {
            return FALSE;    
        }
        }

}
