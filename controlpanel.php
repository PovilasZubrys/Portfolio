<?php
session_start();

include 'includes/autoloader.inc.php';
include 'includes/controlpanel/userId.inc.php';
include 'includes/controlpanel/updateProfilePic.inc.php';
include 'includes/controlpanel/updateDescription.inc.php';
include 'includes/controlpanel/userRegistration.inc.php';
include 'includes/controlpanel/changePassword.inc.php';
include 'includes/controlpanel/readUserDb.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/button.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/controlpanel.css">
    <title>Control panel</title>
</head>

<body>
    <header>
        <nav class="menu">
            <a onclick="preview()">Preview</a>
            <a onclick="newUser()">New User</a>
            <a onclick="description()">Description</a>
            <a onclick="profilePicture()">Profile picture</a>
            <a onclick="updatePassword()">Password</a>
        </nav>    
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
                <div class="col-12 block" id="content">
                    <h2>Preview of website</h2>
                    <iframe src="index.php" width="100%" height="500px" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </main>
    <script src="./js/controlpanel/menu.js"></script>
</body>
</html>