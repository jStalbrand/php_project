<?php
  
  require_once 'classes/Database.php';
  require_once 'classes/Errors.php';
  require_once 'classes/Time.php';
  require_once 'classes/Session.php';
  require_once 'classes/Articles.php';
  require_once 'classes/Article.php';

    $articles = new Articles();
    
      if(!isset($_GET['page'])){
        $_GET['page'] = 1;
      }

?>
<!DOCTYPE html>
<html lang="sv">
  <head>
  
    <title></title>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/newsPage.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
  </head>
  <header>

      <a href="index.php" id="logo">nyhetssida</a>

  </header>