<?php

namespace app\controllers;

use app\core\Controller;
use app\core\DbConnection;
use app\models\RentModel;
use mysqli;

class AdministrationController extends Controller {


    public function users(){
        $this->view("users","dashboard", null);
    }

    public function getAllUsers(){
        $mysql = new DbConnection();

        $dbResult = $mysql->conn()->query("select * from users;") or die("ERROR");
        $resultArray = [];
        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);
        //return $resultArray;
        //$this->view("users","dashboard");
    }

    public function authorize(){
        return ["Admin","SuperAdmin"];
    }


}