<?php 
require $_SERVER["DOCUMENT_ROOT"] . '/includes/config.php';
session_destroy();
header("location: /");

?>