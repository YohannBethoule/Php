
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
            new FrontController();
        ?>

   </section>

</body>
</html>