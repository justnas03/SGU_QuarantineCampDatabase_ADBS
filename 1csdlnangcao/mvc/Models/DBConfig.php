<?php
    class Database{
        private $hostname = 'localhost';
        private $username = 'root';
        private $password = '';
        private $dbname = 'testdb';
        private $conn = null;
        private $result = null;

        //fuction connect to database
        public function connect(){
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            if(!$this->conn){
                echo "Failed to connect database";
                exit();
            }
            else{
                mysqli_set_charset($this->conn, "utf8");
            }
            return $this->conn;
        }
        //function execute sql
        public function execute($sql){
            $this->result = $this->conn->query($sql);
            return $this->result;
        }
        //function get data from database
        public function getData(){
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else{
                $data = 0;
            }
            return $data;
        }
        public function getNumRows() {
            if ($this->result) {
                return mysqli_num_rows($this->result);
            } else {
                return 0;
            }
        }
    }
?>