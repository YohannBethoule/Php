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
    require_once('\templates\footer.php');
    require_once('\index.php');
    ?>

    <h2 class="sub-header">Nos titres</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Nom</th>
                <th>Couverture</th>
                <th>Période de mise en ligne</th>
                <th>Nb favorables</th>
                <th>Nb indifférents</th>
                <th>Nb défavorables</th>
                <th>+ d'Infos</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if(isset($res)) {
                //var_dump($res);
                foreach ($res as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['titre'] . "</td>";
                    echo "<td><img widtd='100px' height='100px' src=" . $row['couverture'] . "></td>";
                    echo "<td>" . $row['date_debut'] . "--" . $row['date_fin'] . "</td>";
                    echo "<td>" . $row['avisF'] . "</td>";
                    echo "<td>" . $row['avisI'] . "</td>";
                    echo "<td>" . $row['avisD'] . "</td>";
                    echo "<td> <a href=\"?idT=" . $row['idTitre'] . "&action=detailTitre\">+</a></td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>

</section>

</body>
</html>
