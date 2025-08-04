<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\RentModel;

class RentController extends Controller{

    public function rent(){
        $rent = new RentModel();
        $modeli = $rent->modeli();
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("rentform", "authlog", $modeli);
        }
        return $this->view("rentform", "auth", $modeli);
    }

    public function rentProcess(){
        $rent = new RentModel();
        $rent->mapData($this->router->request->all());


        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            $rent->rentiraj();
            $ispis = $rent->ispisInfo();

            return $this->view("ispisInfo", "authlog", $ispis); //
        }
        return $this->view("notLogin", "auth", $rent);
        // header("location:" . "/login");
    }

    public function authorize(){
        return[ ];
    }
}