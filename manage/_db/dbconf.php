<?php
    class DBconnect{

    public $hostname;
    public $user;
    public $password;
    public $database;
    public $prefix;
    public $conn;

    public function __construct(){
        $this->hostname = "localhost";
        $this->user = "root";
        $this->password = "root";
        $this->database = "realtimecvs";
        $this->prefix = "rtc_";
        $this->conn();
    }
    public function conn(){
        $this->conn = new mysqli($this->hostname,$this->user,$this->password,$this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }
    public function escape_string($value){
        return $this->conn->real_escape_string($value);
    }

    public function convertdate($daydate){
        $formatdate = date_format(date_create($daydate),"D d M, Y H:i:s");
        echo $formatdate;
    }
}