<?php
include('../php/class/Dbh.php');
include('../php/class/Signup.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] && $_POST['password']) {
        
        $password = $_POST['password'];
        $username = $_POST['username'];
        $connect = new Signup;
        $connect->signup($username, $password);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Control panel registration</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 form">
                <h1>Admin Panel registration</h1>
                <form action="" method="POST">
                    <input type="text" name="username">
        
                    <input type="password" name="password">
                    <button class="submit-button">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>