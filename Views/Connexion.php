<?php


session_destroy();

?>
<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
        <header>
            <ul class="nav justify-content-center">
                <li class="nav-item"><a class="nav-link active" href="index.php?action=AfficherAccueil">accueil</a></li>
                <li class="nav-item"><a class="nav-link active" href="index.php?action=GetPost">post</a></li>
                <li class="nav-item"><a class="nav-link active" href="">connexion</a></li>
            </ul>
        </header>
        <div class="dropdown-menu">
            <form class="px-4 py-3" action="index.php?action=connexion" method="post" style="margin-top: 150px;">
                <div class="form-group">
                    <label>Pseudo : </label>
                    <input type="text" name="pseudo" class="form-control" ></br>
                </div>
                <div class="form-group">
                    <label>Password : </label>
                    <input type="password" name="motdepasse" class="form-control"></br>
                </div>
                <input type="submit" name="checkconnexion" value="Se connecter" class="btn btn-primary">
                <label class="form-check-label">Se souvenir de moi ?<input type="checkbox" class="form-check-input" name="souvenir"></label><br />


            </form>
        </div>
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


