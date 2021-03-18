<?php
session_start();

class Login extends Dbh {

    public function loginCP($email, $password) {

        $sql = "SELECT id, email, password
        FROM user";

        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $tables = $statement->fetchAll(PDO::FETCH_ASSOC);

        if(password_verify($password, $tables[0]['password']) && $email === $tables[0]['email']) {

            $_SESSION['id'] = $tables[0]['id'];
            header('Location: https://povilaszubrys.lt/pages/controlpanel.php');
        }
    }
}