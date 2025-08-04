<?php

namespace app\models;

use app\core\DbModel;

class RegistrationModel extends DbModel {
    public  $id_user;
    public string $fname;
    public string $lname;
    public string $username;
    public String $email;
    public String $password;
    public string $phone;
    public string $gender;

    public function rules(): array
    {
        return ['email' => [self::RULE_REQUIRED ],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function registration(){
        $this->password = password_hash($this->password , PASSWORD_DEFAULT);

        $this->create();

    }

    public function tableName()
    {
        return "users";
    }

    public function attribute(): array
    {
        return [
            "fname",
            "lname",
            "username",
            "email",
            "password",
            "phone",
            "gender"
        ];
    }
}