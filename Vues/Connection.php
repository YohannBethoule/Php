<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 07/12/2016
 * Time: 19:25
 */

?>
<!DOCTYPE HTML>
<html>

<?php
require_once('\templates\head.php');
?>

<!-- /w3layouts-agile -->
    <body class="sticky-header left-side-collapsed">
        <section>
            <?php
            require_once('\templates\header.php');
            //require_once('\templates\footer.php');
            ?>
            <div class=" center-block text-center">
                <?php
                if(isset($res)) {
                    echo "<p style='color: #ac2925'>$res</p>";
                }
                ?>
                <form action="http://localhost/Php/" method="post">
                    <label id="labelLogin">Login :</label> <br>
                    <input type="text" name="login"> <br><br>
                    <label id="labelMdp">Mot de passe :</label> <br>
                    <input type="password" name="password"> <br> <br>
                    <input type="submit" value="Connexion">
                    <input type="hidden" name="action" value="seConnecter">
                </form>
            </div>
        </section>
    </body>
</html>