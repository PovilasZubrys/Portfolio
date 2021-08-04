<?php

$read = new Read;
$user = $read->getUser($userId);

if ($user[0]['id'] === $userId) {
    $userName = $user[0]['name'];
    $userSurname = $user[0]['surname'];
}