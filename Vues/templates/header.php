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
                            <source src="media/Blue Browne.ogg" type="audio/ogg"></source>
                            <source src="media/Blue Browne.mp3" type="audio/mpeg"></source>
                            <source src="media/Georgia.ogg" type="audio/ogg"></source>
                            <source src="media/Georgia.mp3" type="audio/mpeg"></source></audio>
                    </div>


                </div>
                <div class="col-md-4 login-pop">
                    <div id="loginpop"> <a href="#" id="loginButton"><span>Login <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a><a class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-sign-in"></i></a>
                        <div id="loginBox">
                            <form action="#" method="post" id="loginForm">
                                <fieldset id="body">
                                    <fieldset>
                                        <label for="email">Pseudo</label>
                                        <input type="text" name="pseudo" id="pseudo">
                                    </fieldset>
                                    <fieldset>
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password">
                                    </fieldset>
                                    <input type="submit" id="login" value="Sign in">
                                    <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                                </fieldset>
                            </form>
                        </div>
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