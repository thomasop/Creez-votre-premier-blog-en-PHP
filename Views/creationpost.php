<?php $title = 'creation post'; ?>

<?php ob_start(); ?>
<header>
            <ul class="" >  
                <li><a href="index.php?action=manaPost">Posts</a></li>
                <li><a href="index.php?action=m">Commentaires</a></li>
                <li><a href="index.php?action=AfficherConnexion">Déconnexion</a></li>
                
            </ul>
            
            
        </header>
<p>creation post</p>
<form class="formcom" action="index.php?action=addPost" method="post" style="margin-top: 100px;">
            <div>
                <label for="title">titre</label><br />
                <input type="text" id="title" name="title" />
            </div>
            <div>
                <label for="content">content</label><br />
                <textarea id="content" name="content"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>