<?php

class clscon {

    private $link;

    public function dbconnect() {
        $host = "localhost";
        $username = "root";
        $pwd = "";
        $this->link = mysqli_connect($host, $username, $pwd, "eazy_wages");
        return $this->link;
    }

    public function dbclose() {
        mysqli_close($this->link);
    }

}
