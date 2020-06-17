<?php $title = $post['title']; ?>

<?php ob_start(); ?>
        <header>
        <ul class="navbar">  
                <li class="nav-item active">
                <a class="nav-link" href="index.php?action=AfficherAccueil">Accueil</a></li>
                <li class="nav-item active">
                <a class="nav-link" href="index.php?action=GetPost">Posts</a></li>
                
            
            
        </header>
        
        <p><a href="index.php?action=get_post">Retour à la liste des billets</a></p>
        
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
                <input type="text" id="author" name="author"  />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" ></textarea>
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
            <p><strong><?= htmlspecialchars($dete['author']) ?></strong></p>
            <p><?= nl2br(htmlspecialchars($dete['comment'])) ?></p>
            <?php
            }
            
            ?>
        </div>

        <footer>
            <p>Bienvenue sur mon blog professionel, vous pouvez visiter nos posts <a href="index.php?action=GetPost">ici</a></p>
            <div>
                <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
                <script type="IN/Share" data-url="linkedin.com/in/thomas-da-silva-seabra"></script>
            </div>      
            <a href="index.php?action=AfficherConnexion">Connexion</a>
        </footer>
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>