<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\ContactModel;

class ContactController extends Controller{
    public function contact(){
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("contact", "authlog", null);
        }
        return $this->view("contact", "auth", null);
    }

    public function contactProcess(){
        $contact = new ContactModel();
        $contact->mapData($this->router->request->all());
        $contact->validate();
        if ($contact->errors) {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Kontakt poruka nije uspesno prosla");
            if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
                return $this->view("contact", "authlog", $contact);
            }
            return $this->view("contact", "auth", $contact);
            //header("location:" . "/login");
        }
        $contact->create();
        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Kontakt poruka je uspesno prosla");
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false) {
            return $this->view("contact", "authlog", null); //
        }
        return $this->view("contact", "auth", $contact);
        //header("location:" . "/login");
    }

    public function authorize(){
        return[];
    }
}