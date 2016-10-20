<?php 

//SELECT users.firstName, users.username FROM users INNER JOIN (select friends.friendId from friends inner join users on users.id = friends.userID where users.id = 5) as tablefriends ON tablefriends.friendID=users.id 
require $_SERVER["DOCUMENT_ROOT"] . '/includes/config.php';

$request = [];

$sqlsub = sprintf("SELECT id FROM users WHERE username = \"%s\"", htmlspecialchars ($_GET["username"]));
    
if (isset($_GET["querytype"])){
    
    if($_GET["querytype"]=="select"){
        $sql = sprintf("SELECT * FROM friends WHERE userId = %s AND friendID=(%s)",$_SESSION["id"],$sqlsub);
        $rows=$database->query($sql);

        if(!$rows){
            $sql = sprintf("SELECT * FROM friendRequests WHERE (requesterID = %s AND recieverID in (%s)) OR (recieverID = %s AND requesterID in (%s))",$_SESSION["id"],$sqlsub,$_SESSION["id"],$sqlsub);
            $rows=$database->query($sql);
            
            if(count($rows)>0){
                foreach($rows as $row){
                    $request[] =[
                        "id" => $row["id"],
                        "requesterID" => $row["requesterID"],
                        "recieverID" => $row["recieverID"],
                        "accepted" => $row["accepted"]
                    ];
                }
            }
        }else if(count($rows)>0){
            $request[] =[
                "accepted" => 1
            ];   
        }
    }else if($_GET["querytype"]=="insert"){
        
        $sql = sprintf("INSERT INTO friendRequests (requesterID, recieverID, accepted) VALUES (\"%s\",(%s), null)", $_SESSION['id'], $sqlsub);
        $rows=$database->query($sql); 
        
        $request[] =[
                "accepted" => null
            ];
    }else if($_GET["querytype"]=="delete"){
        
    }
}

// output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    
    print(json_encode($request, JSON_PRETTY_PRINT));

?>