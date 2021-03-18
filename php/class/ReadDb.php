<?php
include('Dbh.php');

class Read extends Dbh {

    public function readDb() {
        $sql = 'SELECT description, profile_picture 
                FROM about';

        $stmt = $this->connect()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        return $data;
    }

    public function readUsers() {
        $sql = 'SELECT id, name, surname 
                FROM user';

        $stmt = $this->connect()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();

    return $users;
}
}