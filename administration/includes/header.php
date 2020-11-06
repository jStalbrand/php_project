<?php

    require_once '../classes/Database.php';
    require_once '../classes/Errors.php';
    require_once '../classes/Session.php';
    require_once '../classes/Time.php';
    require_once '../classes/User.php';
    require_once '../classes/Article.php';
    require_once '../classes/Articles.php';
   
    Session::exist('user') ? $user = Session::get('user') : header('Location: login.php');
    $articles = new Articles();
   
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../script.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/administration.css">
    <title>Administration</title>
</head>
<body>

    <header>

        <ul>
            <li><a href="administration.php?page=administration">Översikt</a></li>
            <li><a href="administration.php?page=add">Lägg till</a></li>
            <li><a href="logout.php">Logga ut</a></li>    
        </ul>

    <div id="test">

    </div>
        
        <a href="administration.php?page=administration" id="logo">cms</a>

        <div id="user">
            <img src="../images/user-2.png" id="pic" alt="">
            <p> 
                <?php  
                    echo $user->username;
                ?> 
            </p>
        </div>

    </header>