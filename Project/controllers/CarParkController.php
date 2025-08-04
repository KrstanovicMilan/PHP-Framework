<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\DbConnection;

class CarParkController extends Controller{
    public function carpark(){
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("carpark", "kosturlog", null);
        }
        return $this->view("carpark", "kostur", null);
    }


    public function getAllProducts(){
        $mysql = new DbConnection();

        $dbResult = $mysql->conn()->query("select * from cars;") or die("ERROR");
        $resultArray = [];
        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }
        echo json_encode($resultArray);
        //return $resultArray;
        //$this->view("users","dashboard");
    }



    public function authorize(){
        return[];
    }
}