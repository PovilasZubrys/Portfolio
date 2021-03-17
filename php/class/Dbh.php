<?php 

class Dbh {

    private $db_server = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_database = "portfolio";
    
    protected function connect() {
        $dsn = "mysql:host=$this->db_server; dbname=$this->db_database";
        
        $pdo = new PDO($dsn, $this->db_username, $this->db_password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}