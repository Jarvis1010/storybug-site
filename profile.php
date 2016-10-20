<?php 

//SELECT users.firstName, users.username FROM users INNER JOIN (select friends.friendId from friends inner join users on users.id = friends.userID where users.id = 5) as tablefriends ON tablefriends.friendID=users.id 
require $_SERVER["DOCUMENT_ROOT"] . '/includes/config.php';

if (isset($_SESSION["id"])){
    
    if(isset($_GET["username"])){
        $username = htmlspecialchars($_GET["username"]);
    }else{
        $username = $_SESSION["username"];
    }
    
    $sql = sprintf("SELECT * FROM users WHERE username = \"%s\"", $username);
    $rows=$database->query($sql);
    
    if (count($rows) == 1){
            
        $row = $rows[0];
        $sql = sprintf("SELECT friends.friendId from friends INNER JOIN users on users.id = friends.userID WHERE users.id = %s", $row['id']);
        $rows=$database->query("SELECT * FROM users INNER JOIN (".$sql.") as tablefriends ON tablefriends.friendID=users.id");
        $requests=$database->query("SELECT * FROM friendRequests WHERE accepted IS NULL AND recieverID = ".$_SESSION['id']);
        
        render("profileView.php",["rows"=>$row,"friends"=>$rows,"requests"=>$requests]);
            
    }else{
        
    }
}else{
    render("indexView.php");
}

?>