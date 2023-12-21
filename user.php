<?php

class User extends db_object{
    protected static $columns = array('username' , 'password' , 'email' , 'rule');
    public $id;
    public $rule;
    public $username;
    public $password;
    public $email;


    public static function verify($username , $password){
        $all_user_data = self::query_proces("SELECT * FROM ". self::$table_name ." WHERE `username` = '$username' AND `password` = '$password'");
        return !empty($all_user_data) ? array_shift($all_user_data) : false;
    }

}

$user = new User();

?>