<?php

include('../php/class/Dbh.php');
include('../php/class/Login.php');
include('../php/class/Validate.php');

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Styles -->
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/message.css">
    <link rel="stylesheet" href="../css/contact.css">

    <!-- favicon -->
    <link rel="icon" type="image/png" href="./img/favicon.svg" />
    <title>Control panel login</title>
</head>
<body>
    <main>
        <!-- Messages -->
        <?php if (isset($messageSuccess)): ?>
            <div class="messageSuccess">
                <?= $messageSuccess ?>
                <?php unset($_SESSION['message']); ?>
            </div>
        <?php elseif(isset($messageError)): ?>
            <div class="messageError">
                <?php unset($_SESSION['message']); ?>
                <?= $messageError ?>
            </div>
        <?php endif ?>        
        <div class="container">
            <div class="row">
                <div class="col-12 form">
                    <h1>Admin Panel login</h1>
                    <div class="col-12" id="notice"></div>
                    <form name="login" method="POST" onsubmit="return loginValidate()">
    
                        <label>Email:</label>
                        <input type="text" name="email" placeholder="Your Email here" required>
    
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" required>
                        <button class="submit-button">Log In</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="../js/validateLogin.js"></script>
</body>
</html>