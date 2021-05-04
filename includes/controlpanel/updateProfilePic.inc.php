<?php

// Update profile picture
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['image'])) {
        $image = new Image;
        $image->uploadImage($_FILES['image']);
    }
}