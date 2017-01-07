<?php
/**
 * Created by PhpStorm.
 * User: yobethoule
 * Date: 06/01/17
 * Time: 12:41
 *
 * Contient l'en tête de notre site
 */

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/Php/">Muses'Hic</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <?php
                if(!isset($_SESSION['login'])){
                    echo "<a style='color: #eea236' href=\"Vues/Connection.php\"><span>Login</span></a>";
                }
                else{
                    echo "<a style='color: #4cae4c'>".$_SESSION['login']."</a> ";
                    echo "<a style='color: #eea236' href=\"?action=seDeconnecter\" id=\"deconnexionButton\"><span>Déconnexion</span></a>";
                }
                ?>
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</nav>
