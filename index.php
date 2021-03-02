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
    <script src="https://kit.fontawesome.com/4acf51a376.js" crossorigin="anonymous"></script>
    <title>Povilas Zubrys</title>
</head>
<body>
    <header>
        <nav class="menu">
            <a href="#">Home</a>
            <a href="#">About me</a>
            <a href="#">Projects</a>
            <a href="#">Links</a>
        </nav>
    </header>
    <main>
        <!-- About -->
        <div class="container hidden about">
            <div class="row">
                <div class="col-12 title">
                    <h1>About</h1>
                </div>
                <div class="col-12 headline">
                    <h1>First, let me introduce myself!</h1>
                </div>
                <div class="col-4">
                    <div class="image">
                        <img id="profile" src="img/profile.jpg" alt="profile">
                    </div>
                </div>
                <div class="col-8">
                    <div class="description">
                        <p>
                            mano kietas aprašymas 
                        </p>
                    </div>
                </div>
                <div class="socials col-4">
                    <a href="https://www.instagram.com/povilaszubrys/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://github.com/PovilasZubrys" target="_blank"><i class="fab fa-github-square"></i></a>
                    <a href="https://www.linkedin.com/in/povilas-zubrys-3315161b9/" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <!-- Projects -->
        <div class="container hidden projects">
            <div class="row">
                <div class="col-12 title">
                    <h1>My Projects</h1>
                </div>
                <div class="col-12 headline">
                    <h1>My project gallery</h1>
                </div>
                <div class="col-12">
                    <img src="./img/empty.gif" alt="">
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
        <div class="container hidden contact-form">
            <div class="row">
                <div class="col-12 title">
                    <h1>Contact me</h1>
                </div>
                <div class="col-12 headline">
                    <h1>Contact me through email</h1>
                </div>
                <div class="col-12 form">
                    <form action="">
                        <label for="">Email</label>
                        <input placeholder="Email" type="text">
                        <label for="">Name</label>
                        <input placeholder="Name" type="text">
                        <label for="">Message</label>
                        <textarea placeholder="Message" name="" id="" cols="30" rows="10"></textarea>
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
                <div class="col-6 links">
                    <div class="col-12 headline">
                        <h2>Links</h2>
                    </div>
                </div>
                <div class="col-6 socials">
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
</html>