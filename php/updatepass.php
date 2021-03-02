<?php
session_start();
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "portfolio";

$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$id = $_SESSION['id'];

if ($password1 == $password2) {
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);
    
    $encrypted_password = password_hash($password1, PASSWORD_DEFAULT);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "UPDATE `user` SET `password` = :password WHERE id = :id";

    $statement = $pdo->prepare($sql);

    //Bind our value to the parameter :id.
    $statement->bindValue(':id', $id);

    //Bind our :model parameter.
    $statement->bindValue(':password', $encrypted_password);

    //Execute our UPDATE statement.
    $statement->execute();

    header('Location: http://localhost/portfolio/pages/controlpanel.php');
}