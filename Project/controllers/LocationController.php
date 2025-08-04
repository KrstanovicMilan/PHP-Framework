<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class LocationController extends Controller{
    public function lokacija(){
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("lokacija", "kosturlog", null);
        }
        return $this->view("lokacija", "kostur", null);
    }

    public function authorize(){
        return[];
    }
}