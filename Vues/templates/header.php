<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 07/12/2016
 * Time: 19:14
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
                <div class="col-md-4 serch-part">
                    <div id="sb-search" class="sb-search">
                        <form method="post">
                            <input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 player">
                    <div class="audio-player">
                        <audio id="audio-player"  controls="controls">
                            <source src="/Php/Vues/media/Blue Browne.ogg" type="audio/ogg"></source>
                            <source src="/Php/Vues/media/Blue Browne.mp3" type="audio/mpeg"></source>
                            <source src="/Php/Vues/media/Georgia.ogg" type="audio/ogg"></source>
                            <source src="/Php/Vues/media/Georgia.mp3" type="audio/mpeg"></source></audio>
                    </div>


                </div>
                <div class="col-md-4 login-pop">
                    <div id="loginpop">
                        <?php
                            if(!isset($_SESSION['login'])){
                                echo "<a href=\"Vues/Connection.php\" id=\"loginButton\"><span>Login <i class=\"arrow glyphicon glyphicon-chevron-right\"></i></span></a><a class=\"top-sign\" href=\"#\" data-toggle=\"modal\" data-target=\"#myModal5\"><i class=\"fa fa-sign-in\"></i></a>";
                            }
                            else{
                                echo $_SESSION['login'];
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