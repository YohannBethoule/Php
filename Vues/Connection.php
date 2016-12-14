<!DOCTYPE HTML>
<html>
<?php
require('\templates\head.php');
?>

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>

    <?php require ('\templates\header.php');
    require('\templates\navbar.php');
    require('\templates\footer.php');
    ?>

    <div class="connection_form">
        <form method="post">
            <input type="text" name="pseudo">
            <input type="password" name="mdp">
            <input type="submit" name="Se connecter">
        </form>
    </div>

</section>

</body>
</html>