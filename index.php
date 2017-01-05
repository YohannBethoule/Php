
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<?php
//require_once(__DIR__.'/Vues/templates/head.php');
?>
<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed">
<section>

    <?php
    //require_once(__DIR__.'/Vues/templates/header.php');
    //require_once(__DIR__.'/Vues/templates/navbar.php');
    //require_once(__DIR__.'/Vues/templates/footer.php');

    require_once(__DIR__.'/config/config.php');

    require_once(__DIR__.'/config/Autoload.php');
    session_start();
    Autoload::charger();

    $cont = new FrontController();
    ?>



</section>

</body>
</html>