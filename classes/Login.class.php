<?php
session_start();

class Login extends Dbh 
{
    public function login($email, $password) 
    {
        $sql = "SELECT id, email, password
        FROM user";

        $tables = $this->get($sql);

        if(password_verify($password, $tables[0]['password']) && $email === $tables[0]['email']) {

            $_SESSION['id'] = $tables[0]['id'];
            header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
            exit;
        }
    }
}