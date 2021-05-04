<?php

// Reading database
$read = new Read;
$data = $read->readDb();

$description = $data[0]['description'];
$profilePicture = $data[0]['profile_picture'];