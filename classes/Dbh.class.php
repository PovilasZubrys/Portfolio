<?php 

class Dbh {

    private $db_server = "localhost";
    private $db_username = "u708906375_u708906375";
    private $db_password = "wK3xyqHq8N&#";
    private $db_database = "u708906375_portfolio";
    
    protected function connect() {
        $dsn = "mysql:host=$this->db_server; dbname=$this->db_database";
        
        $pdo = new PDO($dsn, $this->db_username, $this->db_password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }
}