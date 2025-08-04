<?php

namespace app\core;

abstract class DbModel extends Model {
    public DbConnection $db;

    public function __construct(){
        $this->db = new DbConnection();
    }

    abstract  public function tableName();
    abstract public function attribute() : array;

    public function create(){
        $tableName = $this->tableName();
        $attributes = $this->attribute();
        $values = array_map(fn($attr) => ":$attr" , $attributes);


        $sqlString = "INSERT INTO $tableName (" . implode(',', $attributes) . ") VALUES (" . implode(',', $values) . ")";

        foreach ($attributes as $attribute) {


            $sqlString = str_replace(":$attribute",  '"' . $this->{$attribute} . '"', $sqlString);
        }

        $this->db->conn()->query($sqlString);
    }


    public function one($where){
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE $where limit 1;";
        $dbResult = $this->db->conn()->query($sqlString);

        return $dbResult->fetch_assoc();
    }

    public function delete($where){
        $tableName = $this->tableName();

        $sqlString = "DELETE FROM $tableName WHERE $where";
        $this->db->conn()->query($sqlString);


        //return true;
    }

    public function all()
    {
        $tableName = $this->tableName();

        $sqlString = "SELECT * FROM $tableName;";
        $dataResult = $this->db->conn()->query($sqlString);

        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        return $resultArray;
    }

    public function rules(): array
    {
        return [];
    }
}