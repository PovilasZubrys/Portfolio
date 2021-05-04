<?php

// Change password
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['newPassword1'] === $_POST['newPassword1']) {
        $newPassword1 = $_POST['newPassword1'];
        $newPassword2 = $_POST['newPassword2'];

        $updatePass = new Update;
        $updatePass->updatePassword($newPassword1, $newPassword2, $userId);
    }
}