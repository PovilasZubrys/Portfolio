<?php
session_start();

class Login extends Dbh {

    public function login($username, $password) {

        $sql = "SELECT id, username, password
        FROM user";

        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $tables = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(password_verify($password, $tables[0]['password']) && $username === $tables[0]['username']) {

            $_SESSION['id'] = $tables[0]['id'];
            header('Location: http://localhost/portfolio/pages/controlpanel.php');
        }
    }
}