<?php

require_once '../classes/Session.php';
    
    Session::delete('user');
    header('Location: login.php');
?>