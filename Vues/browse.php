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
    require_once('\templates\header.php');
    require_once('\templates\navbar.php');
    require_once('\templates\footer.php');
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
                foreach($res as $row){
                    echo "<tr>";
                    echo "<th>".$row['titre']."</th>";
                    echo "<th><img src=".$row['couverture']."></th>";
                    echo "<th>".$row['date_debut']."--".$row['date_fin']."</th>";
                    echo "<th>".$row['avisF']."</th>";
                    echo "<th>".$row['avisI']."</th>";
                    echo "<th>".$row['avisD']."</th>";
                    echo "</tr>";
                }
            ?>
        </table>
        <!-- A remplacer par du traitement php.
        <div class="tittle-head two">
            <h3 class="tittle">New Releses <span class="new">New</span></h3>
            <a href="browse.html"><h4 class="tittle third">See all</h4></a>
            <div class="clearfix"> </div>
        </div>

        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v11.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Lootera</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v22.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Jaremy Cam</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v33.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Selah</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v44.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Jim Brickman</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v1.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Adele21</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v55.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Party Night</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v6.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Ellie Goluding</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v66.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Diana</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v6.jpeg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Fifty Shades</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v2.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Shomlock</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v3.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Lootera</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v4.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Stuck on a feeling</a>
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="browse">
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v10.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Fifty Shades</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v9.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Alan Jackson</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v77.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Cheristina aguilera</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v88.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Samsmith</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v1.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Adele21</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v99.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Big Duty</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v6.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Ellie Goluding</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v66.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Diana</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v6.jpeg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Fifty Shades</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v21.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Joe</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v3.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Lootera</a>
        </div>
        <div class="col-md-3 browse-grid">
            <a  href="single.html"><img src="images/v4.jpg" title="allbum-name"></a>
            <a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
            <a class="sing" href="single.html">Stuck on a feeling</a>
        </div>
        <div class="clearfix"> </div>
    </div>

        -->

    <!--//End-albums-->
    <!--//discover-view-->
    <!--//music-left-->
    </div>

</section>

</body>
</html>
