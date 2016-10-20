<?php 

require $_SERVER["DOCUMENT_ROOT"] . '/includes/config.php';


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
                
                // remember that user's now logged in by storing user's info in session
                $_SESSION["id"] = $row["id"];
                $_SESSION["firstname"] = $row["firstName"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["blogUser"] = $row["blogUser"];
                
                //saves username for 7 days in a cookie
                setcookie("username", $row["username"], time()+60*60*24*7);
                
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