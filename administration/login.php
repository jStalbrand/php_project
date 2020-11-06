<?php 
    require_once '../classes/Database.php';
    require_once '../classes/User.php';
    require '../classes/Session.php';
    require '../classes/Errors.php';

     if(isset($_POST['login-submit'])){
        
        $user = new User($_POST['username'],$_POST['password']);
        if($user->log_in()){
            Session::add('user', $user);
            header('Location: administration.php?page=administration');
        }
        else{
            Errors::get();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <div id="form-wrapper">
        <h1>Logga in</h1>

        <form id="form-signup" action="" method="post">
            <input type="text" name="username" placeholder="Användarnamn">
            <input type="password" name="password" placeholder="lösenord">
            <button type="submit" name="login-submit">registrera</button>
        </form>
    </div>

</body>
</html>