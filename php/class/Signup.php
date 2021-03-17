<?php 

class Signup extends Dbh {

    public function signup($username, $password) {
        
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO user (username, password)
        VALUES ('$username', '$encrypted_password')";

        $this->connect()->exec($sql);
        header('Location: http://localhost/portfolio/pages/controlpanel.php');
    }
}