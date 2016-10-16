<?php 
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/includes/helper.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/database.php';
session_destroy();
header("location: /");

?>