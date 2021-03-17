<?php
session_start();
include('../php/class/Dbh.php');
include('../php/class/UpdateDb.php');
include('../php/class/Signup.php');

// DESCRIPTION UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['description'])) {

        $update = new Update;
        $update->updateDescription($_POST['description']);

        header('Location: http://localhost/portfolio/pages/controlpanel.php');
    }
}
// NEW USER REGISTRATION
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] && $_POST['password']) {
        
        $password = $_POST['password'];
        $username = $_POST['username'];
        $connect = new Signup;
        $connect->signup($username, $password);
        header('Location: http://localhost/portfolio/pages/controlpanel.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/layout.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/controlpanel.css">
    <title>Control panel</title>
</head>

<body>
    <header>
        <div>
            Admin Control Panel
        </div>    
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 block">
                    <h2>New profile picture</h2>
                    <form method="POST" enctype="multipart/form-data" action="../php/upload.php">

                        <label>Choose new profile picture:</label>
                        <input type="file" name="image">
                        <button type="submit" class="submit-button">Upload!</button>

                    </form>
                </div>
                <div class="col-12 block">
                    <h2>Update description: </h2>
                    <form method="POST" enctype="multipart/form-data" action="">
        
                        <label>Description: </label>
                        <textarea class="description" name="description"></textarea>
        
                        <button type="submit" class="submit-button">Update!</button>
                    </form>
                </div>
                <div class="col-12 block">
                    <h2>Change admin password: </h2>
                    <form method="POST" enctype="multipart/form-data" action="../php/updatepass.php">
        
                        <label>Change password: </label>

                        <input name="password1" placeholder="new password" type="text">
                        <input name="password2" placeholder="repeat new password" type="text">

                        <button type="submit" class="submit-button">Update!</button>
                    </form>
                </div>
                <div class="col-12 block">
                    <h2>New user:</h2>
                    <form action="" method="POST">
                        <input type="text" name="username">
            
                        <input type="password" name="password">
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