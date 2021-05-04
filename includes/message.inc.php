<?php

// Checking if success message is set.
if (isset($_SESSION['message']['success'])) {
    $messageSuccess = $_SESSION['message']['success'];
}

// Checking if error message is set.
if (isset($_SESSION['message']['error'])) {
    $messageError = $_SESSION['message']['error'];
}