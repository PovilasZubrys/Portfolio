<?php

// Reading database
$db = new Read;
$data = $db->getDescription();

$description = $data[0]['description'];
$profilePicture = $data[0]['profile_picture'];