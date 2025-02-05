<?php

    class Database {

        private $dbhost = "localhost";
        private $dbname = "eduwebbackend";
        private $dbuser = "root";
        private $dbpass = "";
        
        public $conn;

        public function connect(){

            try{

                $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
    
                $this->conn = new PDO($dsn , $this->dbuser , $this->dbpass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                // echo "success";
            }catch(Exception $e){
                echo $e;
            }

            return $this->conn;


        }
    }


?>