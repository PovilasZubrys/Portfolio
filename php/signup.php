<?php
$db_server = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "portfolio";
 
$username=$_POST['username'];
$password=$_POST['password'];
 
$pdo = new PDO("mysql:host=$db_server;dbname=$db_database", $db_username, $db_password);

$encrypted_password = password_hash($password, PASSWORD_DEFAULT);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO user (username, password)
VALUES ('$username', '$encrypted_password')";
 
$conn->exec($sql);
echo "<script>alert('Account successfully added!'); window.location='../pages/controlpanel.php'</script>";
?>