<?php
/**
 * Created by PhpStorm.
 * User: yoyot
 * Date: 14/12/2016
 * Time: 15:00
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
require('templates/head.php');
?>

<!-- /w3layouts-agile -->
<body class="sticky-header left-side-collapsed" >
<section>

    <?php require ('templates/header.php');
    require('templates/footer.php');
    ?>

        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <div class="sign-grids">
                        <div class="sign">
                            <div class="sign-right">
                                <form action="#" method="post">
                                    <h3>Create your account </h3>
                                    <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                    <input type="submit" value="CREATE ACCOUNT" >
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

</body>
</html>
