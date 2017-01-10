<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 07/12/2016
 * Time: 19:14
 *
 * En-tête de nos pages
 */

?>
<!-- signup -->

<!-- //signup -->

<!-- main content start-->
<div class="main-content">
    <!-- header-starts -->
    <div class="header-section">
        <!--notification menu start -->
        <div class="menu-right">
            <div class="profile_details">
                <div class="col-md-4 login-pop">
                    <div id="loginpop">
                        <?php
                            if(!isset($_SESSION['login'])){
                                echo "<a href=\"Vues/Connection.php\" id=\"loginButton\"><span>Login <i class=\"arrow glyphicon glyphicon-chevron-right\"></i></span></a>";
                            }
                            else{
                                echo $_SESSION['login'];
                                echo "<a href=\"?action=seDeconnecter\" id=\"deconnexionButton\"><span>Déconnexion<i class='arrow glyphicon glyphicon-log-out'></i></span></a>";
                            }
                        ?>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!-------->
        </div>
        <div class="clearfix"></div>
    </div>
    <!--notification menu end -->
    <!-- //header-ends -->