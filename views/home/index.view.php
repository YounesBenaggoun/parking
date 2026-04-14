<?php

$pageTitle = "index-Home ... Ma Page Title";



ob_start();

?>

<div class="container text-center">
    <br> <br>
    <h2 class="thin">Le Meilleur Moyen Pour réserver une Place a Paris</h2>
    <p class="text-muted">
        Avec le dérèglement climatique, la réduction des émissions de gaz à effet de serre est devenue un enjeu mondial majeur. Les transports représentent une part significative de ces émissions, notamment en milieu urbain.
    </p>
</div>
<div class="jumbotron top-space">
    <div class="container">

        <h3 class="text-center thin">Les raison pour nous utilisé</h3>

        <div class="row">
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption">
                    <h4><i class="fa  fa-5"></i>Géolocalisation des parkings</h4>
                </div>
                <div class="h-body text-center">
                    <p>La géolocalisation des parkings repose sur l’utilisation de technologies comme le GPS, les capteurs connectés et les applications mobiles pour aider les automobilistes à trouver rapidement une place disponible.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption">
                    <h4><i class="fa  fa-5"></i>Réservation à l’heure</h4>
                </div>
                <div class="h-body text-center">
                    <p>La réservation à l’heure permet aux usagers de planifier précisément l’utilisation d’un service, notamment pour les parkings, en ne payant que pour la durée réellement nécessaire. Grâce aux applications mobiles et aux plateformes en ligne.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption">
                    <h4><i class="fa  fa-5"></i>Paiement sécurisé</h4>
                </div>
                <div class="h-body text-center">
                    <p>Le paiement sécurisé est un élément essentiel des services numériques, notamment dans le domaine des parkings connectés, car il garantit la protection des données personnelles et bancaires des utilisateurs.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption">
                    <h4><i class="fa  fa-5"></i>Suivi des réservations et revenus</h4>
                </div>
                <div class="h-body text-center">
                    <p>Le suivi des réservations et des revenus est une fonctionnalité clé pour les gestionnaires de parkings, permettant d’avoir une vision claire et en temps réel de l’activité.</p>
                </div>
            </div>
        </div> <!-- /row  -->

    </div>
</div>




<?php

$content = ob_get_clean();

include("./views/includes/template.php");
