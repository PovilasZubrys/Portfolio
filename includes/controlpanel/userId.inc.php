<?php

$userId = $_SESSION['id'];

if (!isset($userId)) {
    header("Location: https://$_SERVER[HTTP_HOST]");
    exit;
}