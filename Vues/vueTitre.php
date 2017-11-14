<?php
/**
 * Created by PhpStorm.
 * User: samue
 * Date: 07/01/2017
 * Time: 15:55
 */
?>

<!DOCTYPE HTML>
<html>
    <?php
    require_once('templates/head.php');
    ?>


    <body class="sticky-header left-side-collapsed"">
        <section>

            <?php
                require_once('templates/header.php');
                require_once('templates/footer.php');

                if(isset($err)) {
                    echo "<p style='color: #ac2925'>$err</p>";
                }

                else if(isset($resTitre)){
                    echo "<form class=\"center-block margin-top text-center\" method=\"post\" action=\"?action=modifierTitre\">
                        <input type=\"hidden\" name=\"idTitre\" value=\"".$resTitre['idTitre']."\">
                        <label>Nom du titre :</label><br>
                        <input type=\"text\" name=\"nomTitre\" value=\"".$resTitre['nomTitre']."\"><br><br>
                        <label>Nom de l'artiste :</label><br>
                        <input type=\"text\" name=\"artiste\" value=\"".$resTitre['artiste']."\"><br><br>
                        <label>Nom de l'album :</label><br>
                        <input type=\"text\" name=\"nomAlbum\" value=\"".$resTitre['nomAlbum']."\"><br><br>
                        <label>Date de début de mise en ligne :</label><br>
                        <input type=\"date\" name=\"date_debut\" value=\"".$resTitre['date_debut']."\"><br><br>
                        <label>Date de fin de mise en ligne :</label><br>
                        <input type=\"date\" name=\"date_fin\" value=\"".$resTitre['date_fin']."\"><br><br>
                        <label>Durée du titre (en secondes) :</label><br>
                        <input type=\"number\" name=\"duree\" value=\"".$resTitre['duree']."\"><br><br>
                        <button type=\"submit\" formaction=\"/Php/\">Annuler</button>
                        <button type=\"submit\">Mettre à jour</button>
                    </form>";
                }
                else{
                    echo "<form class=\"center-block margin-top text-center\" method=\"post\" action=\"?action=modifierTitre\">
                        <input type=\"hidden\" name=\"idTitre\" value=\"\">
                        <label>Nom du titre :</label><br>
                        <input type=\"text\" name=\"nomTitre\" value=\"\"><br><br>
                        <label>Nom de l'artiste :</label><br>
                        <input type=\"text\" name=\"artiste\" value=\"\"><br><br>
                        <label>Nom de l'album :</label><br>
                        <input type=\"text\" name=\"nomAlbum\" value=\"\"><br><br>
                        <label>Date de début de mise en ligne :</label><br>
                        <input type=\"date\" name=\"date_debut\" value=\"\"><br><br>
                        <label>Date de fin de mise en ligne :</label><br>
                        <input type=\"date\" name=\"date_fin\" value=\"\"><br><br>
                        <label>Durée du titre (en secondes) :</label><br>
                        <input type=\"number\" name=\"duree\" value=\"\"><br><br>
                        <button type=\"submit\" formaction=\"/Php/\">Annuler</button>
                        <button type=\"submit\">Ajouter</button>
                    </form>";
                }
                ?>

        </section>
    </body>
</html>

