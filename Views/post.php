<?php $title = 'Post'; ?>

<?php ob_start(); ?>
<header>
            <ul class="navbar">  
                <li class="nav-item active">
                <a class="nav-link" href="index.php?action=AfficherAccueil">Accueil</a></li>
                <li class="nav-item active">
                <a class="nav-link" href="index.php?action=get_post">Posts</a></li>
                
            
            
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
                        <a href="index.php?action=post&amp;id=<?= $data['id']?>">Commentaires</a>

                 <?php           
                }
                $poster->closeCursor();
                ?>
        </div>
        <footer>
            <p>Bienvenue sur mon blog professionel, vous pouvez visiter nos posts <a href="index.php?action=GetPost">ici</a></p>
            <div>
                <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
                <script type="IN/Share" data-url="linkedin.com/in/thomas-da-silva-seabra"></script>
            </div>      
            <a href="index.php?action=admin">Connexion</a>
        </footer>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>