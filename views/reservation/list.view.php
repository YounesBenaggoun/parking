<?php

$pageTitle = "Sign IN";
$hideHeader = true;

ob_start();

?>

<header id="head" class="secondary"></header>

<div class="container">

    <ol class="breadcrumb">
        <li><a href="<?= ROOT ?>">Home</a></li>

    </ol>

    <div class="row">

        <!-- Article main content -->
        <article class="col-xs-12 maincontent">
            <header class="page-header">
                <h1 class="page-title">Mes Réservation</h1>
            </header>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Adresse</th>
                        <th>De</th>
                        <th>à</th>
                        <th>Prix</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $park)
                    {

                    ?>
                        <tr>
                            <td><?= $park->name ?></td>
                            <td><?= $park->address ?></td>
                            <td><?= $park->start_reservation ?></td>
                            <td><?= $park->end_reservation ?></td>
                            <td><?= $park->price ?></td>
                            <!-- <td><a href="<?= ROOT ?>/parking/update/<?= $park->id ?>">Modifier</a></td> -->
                            <td><a href="<?= ROOT ?>/reservation/remove/<?= $park->id ?>">Supprimer</a></td>
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
