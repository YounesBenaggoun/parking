<?php
if (isset($hideFooter) && $hideFooter)
{
    return false;
}
?>
<footer id="footer" class="top-space">

    <div class="footer1">
        <div class="container">
            <div class="row">

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Contact</h3>
                    <div class="widget-body">
                        <p>+33 782511151<br>
                            <!-- <a href="mailto:#">some.email@somewhere.com</a><br> -->
                            <br>
                            6 Place Lucie Aubrac, Bagneux, 92220 - France

                        </p>
                    </div>
                </div>

                <div class="col-md-3 widget">
                    <h3 class="widget-title">Follow me</h3>
                    <div class="widget-body">
                        <p>Younes.Benaggoun3@gmail.com</p>
                        <!-- <p class="follow-me-icons">
                            <a href=""><i class="fa fa-twitter fa-2"></i></a>
                            <a href=""><i class="fa fa-dribbble fa-2"></i></a>
                            <a href=""><i class="fa fa-github fa-2"></i></a>
                            <a href=""><i class="fa fa-facebook fa-2"></i></a>
                        </p> -->
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <h3 class="widget-title">Description</h3>
                    <div class="widget-body">
                        <p>Avec le dérèglement climatique, la réduction des émissions de gaz à effet de serre est devenue un enjeu mondial majeur. Les transports représentent une part significative de ces émissions, notamment en milieu urbain.

                            Selon plusieurs études, la recherche d’une place de stationnement représente environ 30 % du trafic en ville, ce qui</p>

                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </div>

    <div class="footer2">
        <div class="container">
            <div class="row">

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="simplenav">
                            <a href="<?= ROOT ?>">Acceuil</a> |
                            <a href="<?= ROOT ?>/contact">Contact</a> |
                            <b><a href="<?= ROOT ?>/user">Sign up</a></b>
                        </p>
                    </div>
                </div>

                <div class="col-md-6 widget">
                    <div class="widget-body">
                        <p class="text-right">
                            Copyright &copy; 2026
                        </p>
                    </div>
                </div>

            </div> <!-- /row of widgets -->
        </div>
    </div>

</footer>