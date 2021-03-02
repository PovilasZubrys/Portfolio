<?php
session_start();
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
};
unset($_SESSION['message']);

if(!isset($_SESSION['id'])){
    die(header("location: ../index.php"));
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
        
    </header>
    <main>
        <div class="container">
            <div class="row">
                <?php if (isset($message)): ?>
                    <div class="message col-12">
                        <?= $message ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
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
                    <form method="POST" enctype="multipart/form-data" action="../php/description.php">
        
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
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>