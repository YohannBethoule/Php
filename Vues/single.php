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
require_once('\templates\head.php');
?>
<!--//head-->

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">


<section>
    <!--mise en page-->
    <?php
    require_once('\templates\header.php');
    require_once('\templates\navbar.php');
    require_once('\templates\footer.php');

    require_once('\index.php');

    ?>

    <span style="text-align: center">
        <?php
        if(isset($res)){
            echo "<p> Nom du titre : ".$res['nomTitre']."</p>";
            echo "<p> Durée d'écoute : ".$res['duree']." secondes</p>";
            echo "<p> Avis Favorables : ".$res['nbAvisF']."</p>";
            echo "<p> Avis Indifférents : ".$res['nbAvisI']."</p>";
            echo "<p> Avis Défavorables : ".$res['nbAvisD']."</p>";
            echo "<p> Période de mise en ligne : ".$res['dateDebut']." - ".$res['dateFin']."</p>";
            echo "<p> Nom de l'artise :".$res['artiste']."</p>";
            echo "<p> Date de parution :".$res['parution']."</p>";
            echo "<p><img width='100px' height='100px' src=".$res['couv']."></p>";
            if(isset($res['comm'])){
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
                foreach ($res['comm'] as $row) {
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
        }
        ?>
        </table>

    </span>
</section>

</body>
</html>
