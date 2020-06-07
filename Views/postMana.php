<?php $title = 'adminPost'; ?>

<?php ob_start(); ?>
        <header>
            <ul cclass="nav justify-content-center">  
                <li class="nav-item"><a href="index.php?action=manaPost">Posts</a></li>
                <li class="nav-item"><a href="index.php?action=m">Commentaires</a></li>
                <li class="nav-item"><a href="index.php?action=AfficherConnexion">Déconnexion</a></li>
                
            </ul>
            
            
        </header>
        <div class="text" style="margin-top: 150px; margin-left: 75px;">
            <h3>Dernier billet du blog</h3>
            <a href="index.php?action=createPost">Create</a>
                <?php
                while($data = $manaposter->fetch())
                {
                ?>
                    <div class="news">
                        <h3>
                            <?php echo ($data['title']) ?></h3>
                        <p>
                            <?php echo ($data['content']) ?><br/>
                            <a href="index.php?action=updapost">Update</a>
                            <a href="index.php?action=suppPost&amp;id=<?= $data['id']?>">Delete</a>
                        <a href="index.php?action=comPost&amp;id=<?= $data['id']?>">Commentaires</a>

                 <?php           
                }
                $manaposter->closeCursor();
                ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>