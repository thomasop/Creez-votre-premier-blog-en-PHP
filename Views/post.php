<?php $title = 'Post'; ?>

<?php ob_start(); ?>
<header>
            <ul class="nav justify-content-center">  
                <li class="nav-item"><a href="index.php?action=AfficherAccueil">Accueil</a></li>
                <li class="nav-item"><a href="index.php?action=GetPost">Posts</a></li>
                <li class="nav-item"><a href="index.php?action=AfficherConnexion">Connexion</a></li>
                
            </ul>
            
            
        </header>
        <div class="text" style="margin-top: 150px; margin-left: 75px;">
            <h3>Dernier billet du blog</h3>
                <?php
                while($data = $poster->fetch())
                {
                ?>
                    <div class="news">
                        <h3>
                            <?php echo htmlspecialchars($data['title']) ?></h3>
                        <p>
                            <?php echo nl2br(htmlspecialchars($data['content'])) ?><br/>
                        <a href="index.php?action=Post&amp;id=<?= $data['id']?>">Commentaires</a>

                 <?php           
                }
                $poster->closeCursor();
                ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>