<?php


class connection{

    public $db;

    public function __construct(){
        $this->connection_database();
    }

    public function connection_database(){
        $this->db=new mysqli("localhost","root","","veichle");

        if ($this->db->connect_errno) {
            die ("you are not connected".$this->db->connect_error);
         }
    }

    public function query($sql){
        $result = $this->db->query($sql);
        if (!$result) {
            exit($this->db->error);
        }

        return $result;
    } 

    public function secure($data){
        $data = $this->db->real_escape_string(htmlspecialchars($data));
        return $data;
    }
}

$database = new connection();



?>