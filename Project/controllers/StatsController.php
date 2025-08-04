<?php

namespace app\controllers;

use app\core\Controller;
use app\models\RentModel;

class StatsController extends Controller{
    public function index(){
        $this->view("admin", "dashboard",null);

    }

    public function rents(){
        $dateFrom = $this->router->request->one("dateFrom");
        $dateTo = $this->router->request->one("dateTo");
        $rentModel = new RentModel();
        $rentModel->rents($dateFrom,$dateTo);
        $dbData = $rentModel->rents($dateFrom,$dateTo);

        echo json_encode($dbData);
    }
    public function cars(){

        $rentModel = new RentModel();
        $rentModel->cars();
        $dbData = $rentModel->cars();

        echo json_encode($dbData);
    }
    public function rez(){

        $rentModel = new RentModel();
        $rentModel->rez();
        $dbData = $rentModel->rez();

        echo json_encode($dbData);
    }

    public function authorize(){
        return ["SuperAdmin"];
    }
}