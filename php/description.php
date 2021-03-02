<?php
session_start();

$_SESSION['description'] = $_POST['description'];
header('Loaction: http://localhost/portfolio/pages/controlpanel.php');
?>