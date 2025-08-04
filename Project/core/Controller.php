<?php

namespace app\core;

abstract class Controller{
    public Router  $router;

    public function __construct(){
        $this->router = new Router();
        $this->checkRoles();
    }

    public function view($view , $layout, $params){
        return $this->router->view($view, $layout, $params);
    }

    abstract public function authorize();

    public function checkRoles(){
        $roles = $this->authorize();
        if($roles === []) return;
//        echo "<pre>";
//        var_dump($roles);
//        echo "</pre>";
//        exit;

        $access = false;
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);
        $userRoles = $this->getRoles();
        if ($email !== false ) {

            foreach ($roles as $role) {

                foreach ($userRoles as $userRole){
                    if ($role === $userRole){
                        $access = true;
                    }
                }
            }

            if (!$access) {
                header("location:" . "/accessDenied"); //---> redirekcija

            }
            return;
        }
        header("location:"."/login");
    }

    public function getRoles(){
//        if(Application::$app->session->get(Application::$app->session->ROLE_SESSION) != false){
//            return Application::$app->session->get(Application::$app->session->ROLE_SESSION);
//        }
        $connection = new DbConnection();
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);
        $resultFromDb = $connection->conn()->query("
            select r.name from users u 
            inner join user_roles ur on u.id_user = ur.id_user
            inner join roles r on ur.id_role  = r.id_role
            where u.email = '$email' and r.active = true;
        ");
        $resultArray = [];
        while($result = $resultFromDb->fetch_assoc()){
            $resultArray[] =  $result["name"];
        }

       // Application::$app->session->set(Application::$app->session->ROLE_SESSION, $resultArray);

        return $resultArray;
    }

}