<?php

namespace app\models;

use app\core\DbModel;


class ContactModel extends DbModel{
    public string $ime;
    public string $email;
    public string $naslov;
    public string $poruka;



    public function tableName()
    {
        return "contact";
    }
    public function rules(): array
    {
        return [
            'ime' => [self::RULE_REQUIRED ],
            'email' => [self::RULE_REQUIRED],
            'poruka' => [self::RULE_REQUIRED]
        ];
    }

    public function attribute(): array
    {
        return [
            "ime",
            "email",
            "naslov",
            "poruka"
        ];
    }
}