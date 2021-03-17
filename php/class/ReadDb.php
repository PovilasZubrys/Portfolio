<?php
include('Dbh.php');

class Read extends Dbh {

    public function read() {
        $sql = 'SELECT description, profile_picture 
                FROM about';

        $stmt = $this->connect()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        return $data;
    }
}