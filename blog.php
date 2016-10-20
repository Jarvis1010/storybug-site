<?php 

require $_SERVER["DOCUMENT_ROOT"] . '/includes/config.php';

if (isset($_GET['post'])){
    $sql=sprintf("SELECT * FROM blogContents WHERE postTitle=\"%s\" ORDER BY DATE DESC",htmlspecialchars($_GET["post"]));    
}else{
    $sql="SELECT * FROM blogContents ORDER BY DATE DESC";
}

$rows[]=$database->query($sql);
$items=$rows[0];

render("blogView.php",["title"=>"Blog","rows"=>$items]);


?>