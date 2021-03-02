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
                <form action="../php/signup.php" method="POST">
                    <input type="text" name="username">
        
                    <input type="password" name="password">
                    <button class="submit-button">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>