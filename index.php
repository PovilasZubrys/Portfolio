<?php
session_start();
include('php/class/ReadDb.php');
include('php/class/Mail.php');
include('php/class/Validate.php');

if (isset($_SESSION['message']['success'])) {
    $messageSuccess = $_SESSION['message']['success'];
}
if (isset($_SESSION['message']['error'])) {
    $messageError = $_SESSION['message']['error'];
}

$read = new Read;
$data = $read->readDb();

$description = $data[0]['description'];
$profilePicture = $data[0]['profile_picture'];

if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
}
// MAIL STUFF
// if the url field is empty
if(isset($_POST['url']) && $_POST['url'] == '') {
    $sendersName = $_POST['name'];
    $sendersEmail = $_POST['email'];
    $sendersMessage = $_POST['message'];
    
    $validate = new Validate;
    $result = $validate->validateContact($sendersName, $sendersEmail, $sendersMessage);

    if ($result === true) {
        $send = new Mail;
        $send->sendMail($sendersName, $sendersEmail, $sendersMessage);
    } else {
        $messageError = 'Oops, something went wrong. :(';
    }
} // otherwise, let the spammer think that they got their message through

_d($messageError);
_d($messageSuccess);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/layout.css">
    <link rel="stylesheet" href="./css/about.css">
    <link rel="stylesheet" href="./css/myprojects.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="./css/contact.css">
    <link rel="stylesheet" href="./css/button.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/message.css">

    <!-- APP.js -->
    <script type="module" src="./js/app.js" defer></script>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="./img/favicon.svg" />
    <script src="https://kit.fontawesome.com/4acf51a376.js" crossorigin="anonymous"></script>
    <title>Povilas Zubrys</title>
</head>
<body>
    <header>
        <nav class="menu">
            <a href="">Home</a>
            <a href="#about">About me</a>
            <a href="#projects">Projects</a>
            <a href="#contact">Contact</a>
            <?php if (isset($messageSuccess)): ?>
                <div class="messageSuccess">
                    <?= $messageSuccess ?>
                    <?php unset($messageSuccess); ?>
                </div>
            <?php elseif(isset($messageError)): ?>
                <div class="messageError">
                    <?= $messageError ?>
                    <?php unset($messageError); ?>
                </div>
            <?php endif ?>
        </nav>
    </header>
    <main>


        <!-- About -->
        <div class="container hidden about" id="about">
            <div class="row">
                <div class="col-12 title">
                    <h1>About</h1>
                </div>
                <div class="col-12 headline">
                    <h1>First, let me introduce myself!</h1>
                </div>
                <div class="col-4 col-md-12 imgContainer">
                    <div class="image">
                        <img id="profile" src="img/profile/<?= $profilePicture ?>" alt="profile">
                    </div>
                </div>
                <div class="col-8 col-md-12">
                    <div class="description">
                        <p>
                            <?= $description ?>
                        </p>
                    </div>
                </div>
                <div class="socials col-4 col-md-12">
                    <a href="https://www.instagram.com/povilaszubrys/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://github.com/PovilasZubrys" target="_blank"><i class="fab fa-github-square"></i></a>
                    <a href="https://www.linkedin.com/in/povilas-zubrys-3315161b9/" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>                
            </div>
        </div>
        <!-- Projects -->
        <div class="container hidden projects" id="projects">
            <div class="row">
                <div class="col-12 title">
                    <h1>My Projects</h1>
                </div>
                <div class="col-12 headline">
                    <h1>My project gallery</h1>
                </div>
                <div class="col-12">
                    <img src="./img/error/notfound.gif" alt="">
                </div>
                <p class="col-12 title">
                    Oh no! It's so empty in here!
                </p>
                <p class="col-12 subtitle">
                    But do not worry my friend! I am working on populating this empty void of space!
                </p>
            </div>
        </div>
        <!-- Contact form -->
        <div class="container hidden contact-form" id="contact">
            <div class="row">
                <div class="col-12 title">
                    <h1>Contact me</h1>
                </div>
                <div class="col-12 headline">
                    <h1>Contact me through email</h1>
                </div>
                <div class="col-12" id="notice">
                </div>
                <div class="col-12 form">
                    <form name="contact" method="POST" onsubmit="return formValidate()">

                        <label>Email</label>
                        <input placeholder="Email" id="email" name="email" type="text">
                        <label>Name</label>
                        <input placeholder="Name" name="name" name="name" type="text">
                        <label>Message</label>
                        <textarea placeholder="Message" name="message" name="message" cols="30" rows="10"></textarea>
                        <p class="antispam">Leave this empty: <input type="text" name="url" /></p>

                        <button class="submit-button">Send!</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- footer -->
        <div class="container footer">
            <div class="row">
                <div class="col-6 col-md-12 links">
                    <div class="col-12 headline">
                        <h2>Links</h2>
                    </div>
                    <a href="">Home</a>
                    <a href="#about">About me</a>
                    <a href="#projects">Projects</a>
                    <a href="#contact">Contact</a>
                </div>
                <div class="col-6 col-md-12 socials">
                    <div class="col-12 headline">
                        <h2>Socials</h2>
                    </div>
                    <a href="https://github.com/PovilasZubrys" target="_blank"><i class="fab fa-github-square"></i>Github profile</a>
                    <a href="https://www.linkedin.com/in/povilas-zubrys-3315161b9/" target="_blank"><i class="fab fa-linkedin"></i>Linked In</a>
                    <a href="https://www.instagram.com/povilaszubrys/" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
                </div>
                <hr class="col-12 line">
            </div>
        </div>
    </footer>
</body>
<script src="./js/box.js"></script>
<script src="./js/easteregg.js"></script>
<!-- <script src="./js/validate.js"></script> -->
</html>