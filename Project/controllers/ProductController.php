<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\ProductModel;

class ProductController extends Controller{
    public function create(){
        return $this->view("createProduct" , "dashboard",null);
    }

    public function createProductProcess(){
        $model = new ProductModel();
        $model->mapData($this->router->request->all());

        $model->validate();

        if($model->errors){
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Kreiranje proizvoda nije uspesno proslo");
            return $this->view("createProduct","dashboard", $model);
        }

        $model->create();
        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Kreiranje proizvoda je uspesno proslo");

        return $this->view("createProduct", "dashboard" , $model);

    }



    public function authorize(){
        return ["Admin","SuperAdmin"];
    }

}