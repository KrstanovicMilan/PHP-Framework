<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\LoginModel;
use app\models\RegistrationModel;


class UserController extends Controller{
    public function login(){
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("gallery", "kosturlog", null);
        }

        return $this->view("login", "auth", null);
    }

    public function loginProcess(){
        $login = new LoginModel();
        $login->mapData($this->router->request->all());
        $login->validate();
        if ($login->errors) {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Logovanje nije uspesno proslo");
            return $this->view("login", "auth", $login);
            //header("location:" . "/login");
        }
//        echo "<pre>";
//        var_dump($login);
//        echo "</pre>";
//        exit;
        if ($login->login()) {
            Application::$app->session->set(Application::$app->session->USER_SESSION, $login->email);
//            echo "<pre>";
//            var_dump(Application::$app->session->get(Application::$app->session->USER_SESSION));
//            echo "</pre>";
//            exit;
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Logovanje je uspesno proslo");
            return $this->view("gallery", "kosturlog", $login);
            //header("location:" . "/gallery");

        }

        return $this->view("login", "auth", $login);
        //header("location:" . "/login");
    }

    public function accessDenied(){
        return $this->view("accessDenied" , "authLog" , null);
    }


    public function logout()
    {
        Application::$app->session->remove(Application::$app->session->USER_SESSION);
        Application::$app->session->remove(Application::$app->session->ROLE_SESSION);
        header("location:" . "/login");
    }


    public function registration()
    {
        return $this->view("registration", "auth", null);
    }

    public function registrationProcess()
    {
        $registration = new RegistrationModel();
        $registration->mapData($this->router->request->all());

        $registration->validate();
//        echo "<pre>";  //var dump kao podsetnik sta je  u $registration
//        var_dump($registration);
//        echo "</pre>";
//        exit;
        if ($registration->errors) {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Registracija nije uspesno prosla");
            return $this->view("registration", "auth", $registration);
        }
        $registration->registration();

        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Registracija je uspesno prosla");

        return $this->view("registration", "auth", null);
    }

    public function deleteUser(){
        $user = new RegistrationModel();

        $user->mapData($this->router->request->all());
//        echo"<pre>";
//        var_dump($user->id_user);
//        echo"</pre>";
//        exit;
        $user->delete("id_user = $user->id_user");
    }

    public function authorize(){
        return[];
    }
}