<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 07/12/2016
 * Time: 19:25
 */

?>


<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php
require_once('\templates\head.php');
?>

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed"">
<section>

    <?php
    global $rep;
    require_once('\templates\header.php');
    require_once('\templates\navbar.php');
    require_once('\templates\footer.php');
    require_once('\index.php');
    ?>


    <div class="table table-responsive  pricing-table">
        <table>
            <tr>
                <th>Nom</th>
                <th>Couverture</th>
                <th>Période de mise en ligne</th>
                <th>Nb favorables</th>
                <th>Nb indifférents</th>
                <th>Nb défavorables</th>
                <th>+ d'Infos</th>
            </tr>
            <?php
                if(isset($res)) {
                    //var_dump($res);
                    foreach ($res as $row) {
                        echo "<tr>";
                        echo "<th>" . $row['titre'] . "</th>";
                        echo "<th><img width='100px' height='100px' src=" . $row['couverture'] . "></th>";
                        echo "<th>" . $row['date_debut'] . "--" . $row['date_fin'] . "</th>";
                        echo "<th>" . $row['avisF'] . "</th>";
                        echo "<th>" . $row['avisI'] . "</th>";
                        echo "<th>" . $row['avisD'] . "</th>";
                        echo "<th> <a href=\"?idT=" . $row['idTitre'] . "&action=detailTitre\">+</a></th>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </div>

</section>

</body>
</html>
