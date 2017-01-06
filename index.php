
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<!-- /w3layouts-agile -->
<body>

    <?php
    if(isset($rep)){
        var_dump($rep);
        require_once ($rep.'/config/config.php');
        require_once ($rep.'/config/Autoload.php');
    }
    else{
        require_once(__DIR__.'/config/config.php');
        require_once(__DIR__.'/config/Autoload.php');
    }
    session_start();
    Autoload::charger();

    $cont = new FrontController();
    ?>

</body>
</html>