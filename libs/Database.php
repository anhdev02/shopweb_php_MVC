<?php
    class Database{
        function __construct(){
            //tao ket noi
            $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $this->conn->set_charset("utf8");
            if($this->conn->connect_error){
                die("Connection failed: ".$this->conn->connect_error);
            }
            echo "Connectiong successfully";
        }
        
    }
?>