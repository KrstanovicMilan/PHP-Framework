<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;


class RentModel extends DbModel {
    public  $model;
    public  $id_car;
    public  $id_user;
    public  $datum_preuzimanja;
    public  $datum_vracanja;
    public  $broj_vozacke;
    public  $na_ime;
    public  $iznos;

    public function rentiraj(){
        $tableName = $this->tableName();
        $attributes = $this->attribute();

        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);
        //var_dump($email);
        $select1 = 'SELECT id_user FROM users WHERE email LIKE ("'.$email.'")';
        $result1 = $this->db->conn()->query($select1);
        $array1 = $result1->fetch_assoc();
        //var_dump($array1);
        //exit;
        foreach ($array1 as $key => $value){
            if($key == "id_user"){
                $this->id_user = $value;
            }
        }


        $select2 = 'SELECT id_car FROM cars WHERE model LIKE ("'.$this->model.'") ';
        $result2 = $this->db->conn()->query($select2);
        $array2 = $result2->fetch_assoc();//------------------------ uradi proveru pre nego sto dodje do forech-a
        foreach ($array2 as $key => $value){
            if($key == "id_car"){
                $this->id_car = $value;
            }
        }

        $select3 = 'SELECT cena * DATEDIFF("'. $this->datum_vracanja .'","'. $this->datum_preuzimanja.'") as iznos 
        FROM cars c 
        WHERE c.id_car = '. $this->id_car;
        $result3 = $this->db->conn()->query($select3);
        $array3 = $result3->fetch_assoc();
//        var_dump($array3);
//        exit;
        foreach ($array3 as $key => $value){
            $this->iznos = (int)$value;

        }


        $sqlString = 'INSERT INTO  '.$tableName.' (' . implode(',', $attributes) . ') VALUES("'.$this->id_car.'","'.$this->id_user.'","'.$this->datum_preuzimanja.'","'.$this->datum_vracanja.'","'.$this->broj_vozacke.'","'.$this->na_ime.'",'.$this->iznos.' ) ';
//        var_dump($sqlString);
//        exit;
        $this->db->conn()->query($sqlString);



    }

    public function modeli(){
        $select1 = 'SELECT  model FROM cars ';
        $result1 = $this->db->conn()->query($select1);
        foreach ($result1 as $key => $value){
            foreach ($value as $key => $values){
                $array1[] = $values;
            }
        }

//        echo"<pre>";
//           var_dump($array1);
//        echo"</pre>";
//
//        exit;

        return $array1;
    }
    public function ispisInfo() {
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);


        $select1 = 'SELECT  DISTINCT fname,lname,email,broj_vozacke,na_ime,datum_uzimanja,datum_vracanja,model,
                 (cena  * DATEDIFF(datum_vracanja,datum_uzimanja)) as rezultat 
        FROM rentcar r LEFT OUTER JOIN users k
        on r.id_users= k.id_user
        LEFT OUTER JOIN cars a
        on r.id_cars = a.id_car
        
        			
        where email = "'.$email.'" and id_cars ="'.$this->id_car.'"  AND r.id_rentcar = (
    SELECT MAX(id_rentcar) FROM rentcar)';

        $result1 = $this->db->conn()->query($select1);
        $array1 = $result1->fetch_assoc();

        return $array1;
    }

    public function rents($dateFrom, $dateTo){
        $db = $this->db->conn();
        $dateFrom = $dateFrom == "" ? 0 : $dateFrom ;
        $dateTo = $dateTo == "" ? 0 : $dateTo ;
        $sqlString = "SELECT datum_uzimanja, sum(iznos) as iznos FROM rentcar WHERE datum_uzimanja BETWEEN '$dateFrom' and '$dateTo' group by datum_uzimanja";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }

    public function cars(){
        $db = $this->db->conn();

        $sqlString = "SELECT model, sum(iznos) as iznos FROM rentcar r LEFT OUTER JOIN cars c on r.id_cars = c.id_car
     group by model";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }

    public function rez(){
        $db = $this->db->conn();

        $sqlString = "SELECT datum_uzimanja, count(datum_uzimanja) as iznos FROM rentcar r 
                        group by datum_uzimanja";

        $dataResult = $db->query($sqlString) or die();

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }


    public function tableName()
    {
        return "rentcar";
    }

    public function rules(): array
    {
        return [
            'model' => [self::RULE_REQUIRED ],
            'datum_preuzimanja' => [self::RULE_REQUIRED],
            'datum_vracanja' => [self::RULE_REQUIRED],
            'na_ime' => [self::RULE_REQUIRED],
            'broj_vozacke' => [self::RULE_REQUIRED]
        ];
    }


    public function attribute(): array
    {
        return [
            "id_cars",
            "id_users",
            "datum_uzimanja",
            "datum_vracanja",
            "broj_vozacke",
            "na_ime",
            "iznos"
        ];
    }

}