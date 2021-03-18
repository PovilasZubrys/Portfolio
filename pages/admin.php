<?php
include('../php/class/Dbh.php');
include('../php/class/Login.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['email'] && $_POST['password']) {

        $password = $_POST['password'];
        $email = $_POST['email'];
        $connect = new Login;
        $connect->loginCP($email, $password);
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
    <title>Control panel login</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 form">
                <h1>Admin Panel login</h1>
                <form action="" method="POST">

                    <label>Email:</label>
                    <input type="text" name="email" placeholder="Your Email here">

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password">
                    <button class="submit-button">Log In</button>
                    
                </form>
            </div>
        </div>
    </div>
</body>
</html>