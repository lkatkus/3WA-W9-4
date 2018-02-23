<?php

    class Database{

        private $host; /* HOST ADDRESS */
        private $dbname; /* DATABASE NAME */
        private $username; /* DATABASE USERNAME */
        private $password; /* DATABASE USERNAME PASSWORD */

        public function __construct(){
            // IF OTHER CLASS IS EXTENDING CLASS WITH SENSITIVE DATA THEN ALL PRIVATE VARS SHOULD BE SET INT CONSTRUCTOR
            $this -> host = 'localhost';
            $this -> dbname = 'guestbook';
            $this -> username = 'root';
            $this -> password = 'root';
        }

        public function connect(){
            $pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $pdo->exec('SET NAMES UTF8');
            return $pdo;
        }

    }

?>
