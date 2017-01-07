<html lang="fr">
<?php
require_once(__DIR__.'/Vues/templates/head.php');
?>

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
