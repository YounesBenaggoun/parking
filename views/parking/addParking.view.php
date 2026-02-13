<?php

$pageTitle = "Sign IN";
$hideHeader = true;



ob_start();

?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Registration</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Ajouter un Parking</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="thin text-center">Register a new account</h3>
                        <p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.html">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
                        <hr>

                        <form method="post" action="<?= ROOT ?>/parking/addParking">
                            <div class="top-margin">
                                <label>Nom (Alias)</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Adresse</label>
                                <input type="text" name="adress" class="form-control">
                            </div>
                            <div class="row top-margin">
                                <div class="col-sm-6">
                                    <label>Latitude <span class="text-danger">*</span></label>
                                    <input type="text" name="lat" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Longitude <span class="text-danger">*</span></label>
                                    <input type="text" name="lng" class="form-control">
                                </div>
                            </div>
                            <div class="top-margin">
                                <label>Nombre de Spots</label>
                                <input type="number" name="spot" class="form-control">
                            </div>




                            <hr>

                            <div class="row">
                                <!-- <div class="col-lg-8">
                                    <label class="checkbox">
                                        <input type="checkbox">
                                        I've read the <a href="page_terms.html">Terms and Conditions</a>
                                    </label>
                                </div> -->
                                <div class="col-lg-4 text-right">
                                    <button class="btn btn-action" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </article>
        <!-- /Article -->

    </div>
</div>


<?php

$content = ob_get_clean();
include("./views/includes/template.php");
