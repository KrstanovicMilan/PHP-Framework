<?php

namespace app\core;

use mysqli;

class DbConnection{
    public function conn() : mysqli{
        $mysql = new mysqli("localhost","root","" , "rent_a_car","3307") or die(mysqli_error($mysql));
        return $mysql;
    }
}