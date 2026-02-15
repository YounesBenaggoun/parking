<?php

$pageTitle = "Sign IN";
$hideHeader = true;



ob_start();

?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active">Parking</li>
    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Modifier le Parking</h1>
            </header>

            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">




                        <form method="post" action="<?= ROOT ?>/parking/updateParking">
                            <input type="hidden" name="id" value=" <?= $parking->id ?>" />

                            <div class="top-margin">
                                <label>Nom (Alias)</label>
                                <input type="text" value="<?= $parking->name ?>" name="name" class="form-control">
                            </div>
                            <div class="top-margin">
                                <label>Adresse</label>
                                <input type="text" value="<?= $parking->adress ?>" name="adress" class="form-control">
                            </div>
                            <div class="row top-margin">
                                <div class="col-sm-6">
                                    <label>Latitude <span class="text-danger">*</span></label>
                                    <input value="<?= $parking->lat ?>" type="text" name="lat" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label>Longitude <span class="text-danger">*</span></label>
                                    <input type="text" value="<?= $parking->lng ?>" name="lng" class="form-control">
                                </div>
                            </div>
                            <div class="top-margin">
                                <label>Nombre de Spots</label>
                                <input value="<?= $parking->spot ?>" type="number" name="spot" class="form-control">
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
                                    <button class="btn btn-action" type="submit">Enregister</button>
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
