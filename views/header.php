<?php
session_start();
?>
<!DOCTYPE HTML SYSTEM>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script   src="http://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="\css\lavish-bootstrap.css" >
<link rel="stylesheet" href="\css\variables.scss" >
<?php if (isset($title)): ?>
    <title>Story Bug: <?= htmlspecialchars($title) ?></title>
<?php else: ?>
    <title>Story Bug</title>
<?php endif?>
</head>
<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/"><img class="img-responsive" src="/img/logo small.png"/></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">About <span class="sr-only">(current)</span></a></li>
        <li><a href="/blog.php">Blog</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php 
            if(isset($_SESSION['id'])){
                require $_SERVER["DOCUMENT_ROOT"] . '/views/profileMenu.php';
            }else{    
                print("<li><a class=\"disabled\" href=\"#\" data-toggle=\"modal\" data-target=\"#register\">Register</a></li>");
                print("<li><a class=\"disabled\" href=\"#\" data-toggle=\"modal\" data-target=\"#login\">Login</a></li>");
            }    
        ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container">		