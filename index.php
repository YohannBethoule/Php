<html lang="fr">

<body>

<?php
    require_once(__DIR__.'/config/config.php');
    require_once(__DIR__.'/config/Autoload.php');
    session_start();
    Autoload::charger();
    $cont = new FrontController();
?>

</body>
</html>
