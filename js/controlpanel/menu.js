function newUser() {
    document.getElementById('content').innerHTML =
        `<h2>New user:</h2>
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
                    </form>`;
}

function description() {
    document.getElementById('content').innerHTML =
        `<h2>Update description: </h2>
                    <form method="POST" enctype="multipart/form-data" action="">

                        <label>Description: </label>
                        <textarea class="description" name="description"></textarea>

                        <button type="submit" class="submit-button">Update!</button>
                    </form>`;
}

function profilePicture() {
    document.getElementById('content').innerHTML =
        `<h2>New profile picture</h2>
                    <form method="POST" enctype="multipart/form-data" action="../php/upload.php">

                        <label>Choose new profile picture:</label>
                        <input type="file" name="image">
                        <button type="submit" class="submit-button">Upload!</button>

                    </form>`;
}

function updatePassword() {
    document.getElementById('content').innerHTML =
        `<h2>Change password: </h2>
                    <form method="POST" enctype="multipart/form-data" action="">

                        <label>Change your password: </label>

                        <input name="newPassword1" placeholder="new password" type="text">
                        <input name="newPassword2" placeholder="repeat new password" type="text">

                        <button type="submit" class="submit-button">Update!</button>
                    </form>`;
}

function preview() {
    document.getElementById('content').innerHTML =
        `<h2>Preview of website</h2>
                    <iframe src="index.php" width="100%" height="500px" style="border: none;"></iframe>`;
}