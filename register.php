<?php 

require $_SERVER["DOCUMENT_ROOT"] . '/includes/helper.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/database.php';

$database = new dataBase();
$database->servername = "sql202.byethost3.com";
$database->username = "b3_19018156";
$database->password = "Thai1413";
$database->dbname = "b3_19018156_blog";

// validate submission
if (empty($_POST["firstname"]))
{
    render("indexView.php",["error"=>"First Name cannot be blank"]);
}
else if (empty($_POST["username"]))
{
    render("indexView.php",["error"=>"Username cannot be blank"]);
}
else if (empty($_POST["password"]))
{
    render("indexView.php",["error"=>"Password cannot be blank"]);
}
else if ($_POST["password"] != $_POST["confirmpassword"])
{
    render("indexView.php",["error"=>"Passwords do not match"]);
}

// try to insert into database
$sql = sprintf("INSERT INTO users (firstName, username, hash, blogUser) VALUES (\"%s\",\"%s\", \"%s\", false)", htmlspecialchars ($_POST["firstname"]), htmlspecialchars ($_POST["username"]), password_hash($_POST["password"], PASSWORD_DEFAULT));
$rows=$database->query($sql);

if ($rows){
    $rows = $database->query("SELECT LAST_INSERT_ID() AS id");
    
    $id = $rows[0]["id"];
    session_start();
    // remember that user's now logged in by storing user's ID in session
    $_SESSION["id"] = $id;
    $_SESSION["firstname"] = $_POST["firstname"];
    $_SESSION["blogUser"] = false;
    header("location: /");
}else{
    render("indexView.php",["error"=>"Username already exists"]);
}

?>