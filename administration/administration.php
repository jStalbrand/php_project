<?php 
    require 'includes/header.php';

    if($_GET['page'] == 'administration'){

?>
        <div id="articles">
             <div id="titles">
             <div>Titel</div>
             <div>Skribent</div>
             <div>Datum</div>
             </div>
             <?php echo $articles->render_administration_view(); ?>
        </div>
<?php

    }
    else if($_GET['page'] == 'add'){

        if(isset($_POST['submit'])){
            
            $articles->add($_POST['title'],$_POST['category'],$_POST['ingress'], $_POST['text'], $user->username);
            header('Location: administration.php?page=administration');
        }
?>

    <form action="" method="post" id="form">
        <div id="response">Artikeln är uppladdad</div>
        <div class="input">
            <input type="text" name="title" placeholder="titel..." value=>
        </div>
        <div class="input">
            <input type="text" name="category" placeholder="kategori...">
        </div>
        <div class="input">
            <textarea name="ingress" placeholder="ingress..."></textarea>
        </div>
        <div class="input">
            <textarea name="text" placeholder="text..."></textarea>
        </div>
        <button type="submit" name="submit">Ladda upp</button>
    </form>
     
<?php
    }
    else if($_GET['page'] == 'edit'){

        $article = $articles->get_article($_GET['id']);

        if(isset($_POST['submit'])){
            print_r($_POST['title']);
?>
            <form action="" method="post" id="form">
                <div class='input' ><input type='text' value= <?php echo $_POST['title'] ?> name='title'></div>
                <div class='input' ><input type='text' value=<?php echo $_POST['category'] ?> name='category'></div>
                <div class='input' ><textarea name='ingress' id='ingress' cols='30' rows='10'> <?php echo $_POST['ingress'] ?> </textarea></div>
                <div class='input' ><textarea name='text' id='text' cols='30' rows='10'> <?php echo $_POST['text'] ?> </textarea></div>
                <button type='submit' name='submit'>Ändra</button>
            </form>
<?php
            $articles->edit_article($_GET['id'],$_POST['title'],$_POST['category'], $_POST['ingress'], $_POST['text']);
            echo '<div class="feedback"><p>artikeln är redigerad</p></div>';
        }
        else{
?>
            <form action='' method='post' id='form'>

                <div class='input' ><input type='text' value= <?php echo $article->title ?> name='title'></div>
                <div class='input' ><input type='text' value=<?php echo $article->category ?> name='category'></div>
                <div class='input' ><textarea name='ingress' id='ingress' cols='30' rows='10'> <?php echo $article->ingress ?> </textarea></div>
                <div class='input' ><textarea name='text' id='text' cols='30' rows='10'> <?php echo $article->text ?> </textarea></div>
<?php
            if($user->username == $article->author){
                echo "<button type='submit' name='submit'>Ändra</button>";
            }

        }
?>
        </form>
<?php
      
    }

    require 'includes/footer.php';
?>