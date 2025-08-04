<?php

namespace app\models;

use app\core\DbModel;

class LoginModel extends  DbModel{
    public string $email;
    public string $password;


    public function login(){
        $result = $this->one("email = '$this->email'");

        if($result != null){
            if(password_verify($this->password , $result["password"])){
                return true;
            }
        }

        return false;
    }

    public function tableName()
    {
        return "users";
    }
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED ],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function attribute(): array
    {
        return [
            "email",
            "password"
        ];
    }
}