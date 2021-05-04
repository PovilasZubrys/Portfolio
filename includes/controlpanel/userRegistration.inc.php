<?php

// New User Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] && $_POST['password1'] && $_POST['password2'] && $_POST['name'] && $_POST['surname'] && $_POST['email']) {
        
        $username = $_POST['username'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if ($password1 === $password2) {

            $connect = new Signup;
            $connect->signupNew($username, $name, $surname, $email, $password1);

            header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
            exit;
        }
    }
}