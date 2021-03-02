<?php
session_start();

$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "portfolio";

$username=$_POST['username'];
$password=$_POST['password'];

$pdo = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT id, username, password
        FROM user";

$statement = $pdo->prepare($sql);
$statement->execute();
$tables = $statement->fetchAll(PDO::FETCH_ASSOC);

if(password_verify($password, $tables[0]['password']) && $username === $tables[0]['username']) {
    
    $_SESSION['id'] = $tables[0]['id'];
    header('Location: http://localhost/portfolio/pages/controlpanel.php');
}
?>