<?php
include('Dbh.php');

class Read extends Dbh {

    // Reading information from database (Description, profile picture etc.)
    public function readDb() {
        $sql = 'SELECT description, profile_picture 
                FROM about';

        $stmt = $this->connect()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

        return $data;
    }

    // Reading database for users.
    public function readUsers() {
        
        // Selecting which entries to read
        $sql = 'SELECT id, name, surname 
                FROM user';

        // Requesting info from database
        $stmt = $this->connect()->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();

    return $users;
}
}