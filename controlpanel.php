<?php
session_start();

include 'includes/autoloader.inc.php';

$userId = $_SESSION['id'];

if (!isset($userId)) {
    header("Location: https://$_SERVER[HTTP_HOST]");
    exit;
}

// Update profile picture
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['image'])) {
        $image = new Image;
        $image->uploadImage($_FILES['image']);
    }
}

// Description update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['description'])) {

        $update = new Update;
        $update->updateDescription($_POST['description']);

        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
        exit;
    }
}

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

// Change password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['newPassword1'] === $_POST['newPassword1']) {
        $newPassword1 = $_POST['newPassword1'];
        $newPassword2 = $_POST['newPassword2'];

        $updatePass = new Update;
        $updatePass->updatePassword($newPassword1, $newPassword2, $userId);
    }
}

// Read database
$read = new Read;
$data = $read->readUsers();
foreach($data as $key) {
    if ($key['id'] === $userId) {
        $userName = $key['name'];
        $userSurname = $key['surname'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/button.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/controlpanel.css">
    <title>Control panel</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Admin Control Panel</h1>
                    <p>Hey there, <?= $userName ?>!</p>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 block">
                <!-- Update profile picture -->
                    <h2>New profile picture</h2>
                    <form method="POST" enctype="multipart/form-data" action="../php/upload.php">

                        <label>Choose new profile picture:</label>
                        <input type="file" name="image">
                        <button type="submit" class="submit-button">Upload!</button>

                    </form>
                </div>
                <!-- Update description -->
                <div class="col-12 block">
                    <h2>Update description: </h2>
                    <form method="POST" enctype="multipart/form-data" action="">
        
                        <label>Description: </label>
                        <textarea class="description" name="description"></textarea>
        
                        <button type="submit" class="submit-button">Update!</button>
                    </form>
                </div>
                <!-- Update password -->
                <div class="col-12 block">
                    <h2>Change password: </h2>
                    <form method="POST" enctype="multipart/form-data" action="">
        
                        <label>Change your password: </label>

                        <input name="newPassword1" placeholder="new password" type="text">
                        <input name="newPassword2" placeholder="repeat new password" type="text">

                        <button type="submit" class="submit-button">Update!</button>
                    </form>
                </div>
                <!-- Create new user -->
                <div class="col-12 block">
                    <h2>New user:</h2>
                    <form action="" method="POST">

                        <label>Username:</label>
                        <input type="text" name="username">
                        
                        <label>Name:</label>
                        <input type="text" name="name">

                        <label>Surname:</label>
                        <input type="text" name="surname">

                        <label>Email:</label>
                        <input type="text"  name="email">

                        <label>Password:</label>
                        <input type="password" name="password1">

                        <label>Repeat password:</label>
                        <input type="password" name="password2">

                        <button class="submit-button">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>