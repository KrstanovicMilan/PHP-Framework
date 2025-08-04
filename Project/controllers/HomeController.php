<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class HomeController extends Controller {
    public function index(){
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("home", "kosturlog", null);
        }
        return $this->view("home", "kostur", null);
    }

    public function authorize(){
        return[ ];
    }
}