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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Adresse</th>
                        <th>Occupation</th>
                        <th>Revenue</th>
                        <th>Type</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $park)
                    { ?>
                        <tr>
                            <td><?= $park->name ?></td>
                            <td><?= $park->adress ?></td>
                            <td><?= $park->lat ?></td>
                            <td><?= $park->lng ?></td>
                            <td><?= $park->spot ?></td>
                        </tr>
                    <?Php } ?>

                </tbody>

            </table>



        </article>
        <!-- /Article -->

    </div>
</div>


<?php

$content = ob_get_clean();
include("./views/includes/template.php");
