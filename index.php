<?php 

//SELECT users.firstName, users.username FROM users INNER JOIN (select friends.friendId from friends inner join users on users.id = friends.userID where users.id = 5) as tablefriends ON tablefriends.friendID=users.id 
require $_SERVER["DOCUMENT_ROOT"] . '/includes/config.php';

if (isset($_SESSION["id"])){
    render("mainView.php");    
}else{
    render("indexView.php");
}

?>