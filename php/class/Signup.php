<?php 

class Signup extends Dbh {

    // Registering new user
    public function signupNew($username, $name, $surname, $email, $password1) {
        
        // Encrypting password.
        $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
        
        // Adding information to database
        $sql = "INSERT INTO user (username, password, name, surname, email)
        VALUES ('$username', '$encrypted_password', '$name', '$surname', '$email')";

        // Executing connection
        $this->connect()->exec($sql);

        // Routing to GET method.
        header('Location: https://povilaszubrys.lt/pages/controlpanel.php');
    }
}