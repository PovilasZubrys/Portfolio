<?php

// Read user database
$read = new Read;
$data = $read->readUsers();
foreach($data as $key) {
    if ($key['id'] === $userId) {
        $userName = $key['name'];
        $userSurname = $key['surname'];
    }
}