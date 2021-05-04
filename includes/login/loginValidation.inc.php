<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['email'] && $_POST['password']) {

        $password = $_POST['password'];
        $email = $_POST['email'];

        $validate = new Validate;
        $result = $validate->validateLogin($email);

        if ($result === true) {
            $connect = new Login;
            $connect->loginCP($email, $password);
        } else {
            $messageError = 'Oops, something went wrong. :(';
        }
        
    }
}