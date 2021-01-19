<?php 
    class DB{
        private $db_servername = "localhost";
        private $db_username = "root";
        private $db_password = "";
        private $db_name = "baza";

        public function getDBConn(){
            return mysqli_connect($this->db_servername, $this->db_username, $this->db_password, $this->db_name);
        }
    }
