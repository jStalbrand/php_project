<?php 
    require 'includes/header.php';
?>
<body>
    
<?php

    if(isset($_GET['id'])){

        $article = $articles->get_article($_GET['id']);
        echo $article->render_all_HTML();
        
    }
    else{
            
        echo $articles->render($_GET['page'],6);
?>
            <div id="pagination">
            <li><a href=""><</a></li>
            <li><a href="?page=1">1</a></li>
            <li><a href="?page=2">2</a></li>
            <li><a href="">></a></li>
            </div>
<?php
    }    
   
    require 'includes/footer.php';
?>



