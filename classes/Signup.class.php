<?php 

class Signup extends Dbh 
{
    public function register($username, $name, $surname, $email, $password1)
    {    
        $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO user (username, password, name, surname, email)
        VALUES ('$username', '$encrypted_password', '$name', '$surname', '$email')";

        $this->connect()->set($sql);

        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
        exit;
    }
}