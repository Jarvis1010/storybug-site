<?php 

require $_SERVER["DOCUMENT_ROOT"] . '/includes/helper.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/includes/database.php';

$database = new dataBase();
$database->servername = "sql202.byethost3.com";
$database->username = "b3_19018156";
$database->password = "Thai1413";
$database->dbname = "b3_19018156_blog";

// validate submission
if (empty($_POST["username"]))
{
    render("indexView.php",["loginerror"=>"Username cannot be blank"]);
}
else if (empty($_POST["password"]))
{
    render("indexView.php",["loginerror"=>"Password cannot be blank"]);
}else{

    // try to insert into database
    $sql = sprintf("SELECT * FROM users WHERE username = \"%s\"", htmlspecialchars ($_POST["username"]));
    $rows=$database->query($sql);
    
    if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];
            
            // compare hash of user's input against hash that's in database
            if (password_verify($_POST["password"], $row["hash"]))
            {
                session_start();
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row["id"];
                $_SESSION["firstname"] = $row["firstName"];
                $_SESSION["blogUser"] = $row["blogUser"];
                // redirect to portfolio
                header("location:/");
            }
            else
            {
                render("indexView.php",["loginerror"=>"Your Username and/or Password was incorrect"]);
            }
        }
}

?>