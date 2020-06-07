<?php $title = 'updatePost'; ?>

<?php ob_start(); ?>
        <header>
            <ul class="nav justify-content-center">  
                <li class="nav-item"><a href="index.php?action=manaPost">Accueil</a></li>
                <li class="nav-item"><a href="index.php?action=AfficherConnexion">Déconnexion</a></li>
                
            </ul>
            
            
        </header>
        
        <form class="formcom" action="index.php?action=postUpdate&amp;id=<?= $post['id'] ?>" method="post" style="margin-top: 150px;" >
            <div>
                <label for="title">title</label><br />
                <input type="text" id="author" name="title" />
            </div>
            <div>
                <label for="content">content</label><br />
                <textarea id="comment" name="content"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
        <?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>