<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 07/01/2017
 * Time: 19:06
 */
?>


<!DOCTYPE HTML>
<html>
    <?php
    require_once('\templates\head.php');
    ?>

    <body class="sticky-header left-side-collapsed"">
        <section class="center-block text-center margin-top">

            <?php
            require_once('\templates\header.php');
            require_once('\templates\navbar.php');
            require_once('\templates\footer.php');
            /*require_once(dirname(dirname(__FILE__)).'/index.php');*/

            ?>

            <form style="align-content: center" method="post" action="?action=ajouterCommentaire">
                <?php
                    echo "<input type='hidden' name='idTitre' value=\"".$_GET['idTitre']."\">";
                ?>
                <label>Pseudo</label><br>
                <input type="text" name="pseudo"><br><br>
                <label>Note :</label><br>
                <input type="radio" name ="note" value="favorable"> Favorable
                <input type="radio" name ="note" value="indifferent"> Indifférent
                <input type="radio" name ="note" value="defavorable"> Défavorable<br><br>
                <label>Commentaire:</label><br>
                <textarea name="commentaire" rows="10" cols="60"></textarea><br><br>
                <button type="submit" formaction="/Php/">Annuler</button>
                <button type="submit">Valider</button>
            </form>


        </section>
    </body>
</html>
