<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 07/12/2016
 * Time: 19:26
 */

?>


<!DOCTYPE HTML>
<html>

<!--head-->
<?php
require_once('templates/head.php');
?>
<!--//head-->

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">


<section>
    <!--mise en page-->
    <?php
    require_once('templates/header.php');
    require_once('templates/footer.php');
    ?>

    <span style="text-align: center">
        <?php
        if(isset($resSingle)){
            echo "<p> Nom du titre : ".$resSingle['nomTitre']."</p>";
            echo "<p> Durée d'écoute : ".$resSingle['duree']." secondes</p>";
            echo "<p> Avis Favorables : ".$resSingle['nbAvisF']."</p>";
            echo "<p> Avis Indifférents : ".$resSingle['nbAvisI']."</p>";
            echo "<p> Avis Défavorables : ".$resSingle['nbAvisD']."</p>";
            echo "<p> Période de mise en ligne : ".$resSingle['dateDebut']." - ".$resSingle['dateFin']."</p>";
            echo "<p> Nom de l'artise :".$resSingle['artiste']."</p>";
            echo "<p> Date de parution :".$resSingle['parution']."</p>";
            echo "<p><a href=\"?idTitre=".$resSingle['idTitre']."&action=nouveauCommentaire\">Ajouter un commentaire</a></p>";
            echo "<p><img width='100px' height='100px' src=".$resSingle['couv']."></p>";
            if(isset($resSingle['comm'])){
        ?>
        <table width="500px" align="center">
            <tr>
                <th>Note</th>
                <th>Commentaire</th>
                <th>Pseudo</th>
                <?php
                    if(isset($_SESSION['role']) && $_SESSION['role']=='admin')
                        echo "<th>Gestion commentaire</th>";
                ?>
            </tr>
                <?php
                foreach ($resSingle['comm'] as $row) {
                    echo "<tr>";
                    echo "<th >" . $row['note'] . "</th>";
                    echo "<th style=\"text-align: center\">" . $row['commentaire'] . "</th>";
                    echo "<th style=\"text-align: center\">" . $row['user'] . "</th>";
                    if(isset($_SESSION['role']) && $_SESSION['role']=='admin'){
                        echo "<th><form action=\"\" method=\"post\">
                                 <input type=\"hidden\" name=\"action\" value=\"supprimerCommentaire\">
                                 <input type=\"hidden\" name=\"idAvis\" value=\"".$row['idAvis']."\">
                                 <input type=\"submit\" value=\"Supprimer\">
                             </form></th>";
                    }
                    echo "</tr>";
                }
            }
            else{
                    echo "<h2>Erreur d'appel dans la page single.php</h2>";
                }
        }
        ?>
        </table>

    </span>
</section>

</body>
</html>
