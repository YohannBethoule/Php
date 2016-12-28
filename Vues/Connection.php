<!DOCTYPE HTML>
<html>
<?php
require_once('/templates/head.php');
?>

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">
<section>

    <?php
    require_once('/templates/header.php');
    require_once('/templates/navbar.php');
    require_once('/templates/footer.php');
    ?>

    <div class="connection_form main-content center-block text-center">
        <form method="post">
            <label id="labelLogin">Login :</label> <br>
            <input type="text" name="pseudo"> <br><br>
            <label id="labelMdp">Mot de passe :</label> <br>
            <input type="password" name="mdp"> <br> <br>
            <input type="submit" value="Connexion">
        </form>
    </div>

</section>

</body>
</html>