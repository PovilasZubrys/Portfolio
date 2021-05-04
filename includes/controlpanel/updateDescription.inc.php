<?php

// Description update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['description'])) {

        $update = new Update;
        $update->updateDescription($_POST['description']);

        header("Location: https://$_SERVER[HTTP_HOST]/controlpanel.php");
        exit;
    }
}