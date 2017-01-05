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

    require_once('..\index.php');

    ?>

    <?php
    if(isset($res)){
        echo "<p>".$res['nomTitre']."</p>";
        echo "<p>".$res['duree']."</p>";
        echo "<p>".$res['nbAvisF']."</p>";
        echo "<p>".$res['nbAvisI']."</p>";
        echo "<p>".$res['nbAvisD']."</p>";
        echo "<p>".$res['dateDebut']."</p>";
        echo "<p>".$res['dateFin']."</p>";
        echo "<p>".$res['artiste']."</p>";
        echo "<p>".$res['parution']."</p>";
        echo "<p><img src=".$res['couv']."></p>";
        if(isset($res['comm'])){
            foreach($res['comm'] as $row){
                echo "<p>".$row['note']."</p>";
                echo "<p>".$row['commentaire']."</p>";
                echo "<p>".$row['user']."</p>";
            }
        }
    }


    ?>

</section>

</body>
</html>
