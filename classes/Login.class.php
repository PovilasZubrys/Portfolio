<?php
session_start();

class Login extends Dbh {

    // Login to control panel
    public function loginCP($email, $password) {

        // Selecting which fields to check
        $sql = "SELECT id, email, password
        FROM user";

        // Fetcing information from database
        $statement = $this->connect()->prepare($sql);
        $statement->execute();
        $tables = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Verifying password from databes.
        if(password_verify($password, $tables[0]['password']) && $email === $tables[0]['email']) {

            $_SESSION['id'] = $tables[0]['id'];
            header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
            exit;
        }
    }
}