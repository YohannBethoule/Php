<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 07/12/2016
 * Time: 19:26
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
require('\templates\head.php');
?>

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>

    <?php require ('\templates\header.php');
    require('\templates\navbar.php');
    require('\templates\footer.php');
    ?>

    <div id="page-wrapper">
        <div class="inner-content">
            <!-- /error_page -->
            <div class="error-top">
                <img src="/Php/Vues/images/pic_error.png" alt="" />
                <h3>Erreur....<h3>
                        <?php
                        foreach($dVueErreur as $erreur){
                            echo ($erreur);
                        }
                        ?>
                        <div class="clearfix">
                        </div>
                        <div class="error">
                            <a class="not" href="/Php/">Back To Home</a>
                        </div>

                        <!-- //error_page -->
            </div>

            <div class="clearfix"></div>
            <!--body wrapper end-->
        </div>

</section>
</body>
</html>
