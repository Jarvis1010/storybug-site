<?php
session_start();
require $_SERVER["DOCUMENT_ROOT"] . '/includes/helper.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/database.php';

$database = new dataBase();
$database->servername = "sql202.byethost3.com";
$database->username = "b3_19018156";
$database->password = "Thai1413";
$database->dbname = "b3_19018156_blog";
?>