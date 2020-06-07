<?php $title = 'Admin'; ?>

<?php ob_start(); ?>
<header>
            <ul lass="nav justify-content-center">  
                <li class="nav-item"><a href="index.php?action=manaPost">Posts</a></li>
                <li class="nav-item"><a href="index.php?AfficherConnexion">Déconnexion</a></li>
                
            </ul>
            
            
        </header>
        
        <div class="createformpost" style="margin-top: 200px;">
            <p>
                <?php 
                    
                    $date = date("d-m-Y");
                    $heure = date("H:i");
                    
                    
                    echo 'Salut ' . $pseudo . '. Nous sommes le ' . $date . ' et il est ' . $heure;
                    $_SESSION['pseudo'] = $_POST['pseudo'];
                    if($_SESSION['pseudo']){
                        echo($_SESSION['pseudo']);
                       
                    }

                    else{
                        echo 'salut';
                    }
                ?>
            </p>
            <!--
            <p>create post</p>
            <form action="index.php?action=addPost>" method="post" >
            <div>
                <label for="title">Title</label><br />
                <input type="text" id="author" name="title" />
            </div>
            <div>
                <label for="content">Content</label><br />
                <textarea id="comment" name="content"></textarea>
            </div>
            <div>
                <input type="submit" />
            </form> 
            -->
        </div>
        
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>