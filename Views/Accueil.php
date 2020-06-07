<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>
        <header>
            <ul class="nav justify-content-center">  
                <li class="nav-item"><a href="index.php?action=AfficherAccueil">Accueil</a></li>
                <li class="nav-item"><a href="index.php?action=GetPost">Posts</a></li>
                
                
            </ul>
            
            
        </header>
        <article class="descrip-blog">
            <section class="descrip">
                <h4>Bonjour et bienvenue sur mon blog professionel, je suis Thomas DA SILVA et je suis le dévelloppeur qu'il vous faut</h4>
                <p>C'est mon tout premier blog et je vais vous presenter mes differents projets, articles et des nouvautées.</p>
                <p>Je suis en train de faire une formation openclassroom.</p>
            </section>
            <section class="photo">
                <img src="image/photomoi2.jpg">
            </section>
        </article>
        <p class="formcontact">Formulaire de contact</p>
        <form action="traitement.php" method="post">
            <div class="form-group">
                <label>Nom </label>
                <input type="text" name="nom" class="form-control"></br>
            </div>
            <div class="form-group">
                <label>Prénom </label> 
                <input type="text" name="prenom" class="form-control"></br>
            </div>
            <div class="form-group">
                <label>Email </label>
                <input type="text" name="email" class="form-control"></br>
            </div>
            <div class="form-group">
                <label>Message </label> 
                <input type="text" name="message" class="form-control"></br>
            </div>
            <input type="submit" value="Envoyé" class="btn btn-primary">
        </form>
        <a href="image/CVtype.png">Mon CV est disponible ici!</a>
        
        <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
        <script type="IN/Share" data-url="linkedin.com/in/thomas-da-silva-seabra"></script>

        <footer>
            <a href="index.php?action=AfficherConnexion">Connexion</a>
        </footer>

        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
    