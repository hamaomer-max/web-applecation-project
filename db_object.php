<?php

class db_object{
    protected static $table_name = "user";
    public $id;


    public static function get_all($condition){
        if ($condition === 0) {
            return static::query_proces("SELECT * FROM ". static::$table_name ." ");
        }else {
            return static::query_proces("SELECT * FROM ". static::$table_name ." WHERE $condition ");
        }
    }

    public static function get_by_id($userid) {
        $result = static::query_proces("SELECT * FROM " . static::$table_name . " WHERE `id` = '$userid' LIMIT 1");
        return !empty($result) ? array_shift($result) : false;
    }


    public static function query_proces($sql){
        global $database;
        $result = $database->query($sql);
        $all_data_in_db = array();
        while ($row = mysqli_fetch_array($result)) {
            $all_data_in_db[] = static::instant($row);
        }
        return $all_data_in_db;
    }

    
    public static function instant($columns) {
        $userClass = new static;
        foreach ($columns as $property => $value) {
            if ($userClass->has_propery($property)) {
                $userClass->$property = $value;
            }
        }
        return $userClass;
    }

    public function propertis(){
        $prop = array();  
        global $database;
        foreach (static::$columns as $column) {
            if (property_exists($this , $column)) {
                $prop[$column] = "'".$database->secure($this->$column) ."'";
            }
        }
        return $prop;
    }

    private function has_propery($property){
        $class_property = get_object_vars($this);
        return array_key_exists($property , $class_property);
    }

    
    public function create(){
        $prop = $this->propertis();
        global $database;
        $excute =$database->query("INSERT INTO " . static::$table_name . " (" . implode(",", array_keys($prop)) . ") VALUES (" . implode("," , array_values($prop)) . ")");
        
        if ($excute) {
            return True;
        }else {
            return false;
        }
    }
    
    public function update(){
        $prop =  $this->propertis();
        $property_update = array();
        global $database;
        
        // Create SET clause with placeholders for values in the query
        foreach ($prop as $key => $value) {
            $property_update[] = " `{$key}` = {$value}";
        }

        $id = $database->secure($this->id);
        $excute =$database->query("UPDATE " . static::$table_name . " SET " . implode(", " , $property_update) . " WHERE `id` = '$id'");
        if ($excute) {
            return true;
        }else {
            return false;
        }
    }
    

    public function delete($condition){
        global $database;
        $excute = $database->query("DELETE FROM ". static::$table_name ." WHERE $condition");
        if ($excute) {
            return true;
        }else {
            return false;
        }
    }
}






?>