<?php

class Database {

private $host = "localhost";
private $username = "root";
private $password = "";
private $db_name = "coffee_pos"; 

public function connect (){
    $conn = new mysqli(
        $this->host,
        $this->username,
        $this->password,
        $this->db_name
    );

    if($conn->connect_error) {
        die("Connection failed" .$conn->connect_error);
    }

    return $conn;
}
}

?>