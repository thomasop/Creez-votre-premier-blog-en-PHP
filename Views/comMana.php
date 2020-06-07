<?php $title = 'adminComment'; ?>

<?php ob_start(); ?>
        <header>
            <ul class="">  
                <li><a href="index.php?action=AfficherAccueil">Accueil</a></li>
                <li><a href="index.php?action=GetPost">Posts</a></li>
                <li><a href="index.php?action=AfficherConnexion">Connexion</a></li>
                
            </ul>
            
            
        </header>
        
        <p><a href="index.php?action=GetPost">Retour à la liste des billets</a></p>
        
        <div class="new">
            <?php 
            
           
                echo htmlspecialchars($post['title']) . ': ';?></br></br>
                <?php  
                echo nl2br(htmlspecialchars($post['content']));
        
            ?>
                
        </div>
        <form class="formcom" action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
        <div class="com">
            <?php
            
            while ($dete = $comments->fetch())
            {
            ?>
            <p><strong><?= $dete['author'] ?></strong> <a href="index.php?action=Post">Update</a>
            <a href="index.php?action=suppCom&amp;id=<?= $dete['id']?>">Delete</a></p>
            <p><?= $dete['comment'] ?></p>
            <?php
            }
            
            ?>
        </div>
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>