<?php

    class Dbh{
       private $serverName;
       private $username;
       private $password;
       private $db;

    protected function connect(){
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db = "bookclub";
        $conn = new mysqli($this->serverName,$this->username,$this->password,$this->db);
        return $conn;
    }
}

?>