<?php

namespace app\models;

use app\core\DbModel;

class ProductModel extends DbModel{
    public string $model;
    public string $gorivo;
    public string $menjac;
    public string $brojSedista;
    public string $klima;
    public string $kubikaza;
    public string $cena;
    public string $slika;


    public function rules(): array
    {
        return ['model' => [self::RULE_REQUIRED ],
                'gorivo' => [self::RULE_REQUIRED],
                'menjac' => [self::RULE_REQUIRED ],
                'brojSedista' => [self::RULE_REQUIRED],
                'klima' => [self::RULE_REQUIRED ],
                'kubikaza' => [self::RULE_REQUIRED],
                'cena' => [self::RULE_REQUIRED ],
                'slika' => [self::RULE_REQUIRED]
        ];
    }

    public function tableName()
    {
        return "cars";
    }

    public function attribute(): array
    {
        return [
            "model",
            "gorivo",
            "menjac",
            "brojSedista",
            "klima",
            "kubikaza",
            "cena",
            "slika"
        ];
    }

}