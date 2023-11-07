<?php
    class Database{
        private $server_name = "localhost";
        private $username = "root";
        private $password = "root";
        private $db_name = "the_company";

        // protected object can be inherited in child classes
        protected $conn;

        // public function can be inherited in child classes
        public function __construct(){
            // connect to the database
            $this->conn = new mysqli($this->server_name,$this->username,$this->password,$this->db_name);

            if($this->conn->connect_error){
                die("Cannot connect to $this->db_name: ".$this->conn->connect_error);
            }
        }
    }
?>