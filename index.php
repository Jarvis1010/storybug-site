<?php 

require $_SERVER["DOCUMENT_ROOT"] . '/includes/helper.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/database.php';

$database = new dataBase();
$database->servername = "sql202.byethost3.com";
$database->username = "b3_19018156";
$database->password = "Thai1413";
$database->dbname = "b3_19018156_blog";

$rows[]=$database->query("SELECT * FROM blogContents ORDER BY DATE DESC");
$items=$rows[0];

render("indexView.php",["title"=>"Blog","rows"=>$items]);


?>