<?php

ob_start();

?>

<script>
    var parkings = '<?= $parkings_json ?>';
</script>
<link href="<?= ROOT ?>/public/leaflet/leaflet.css" rel="stylesheet" />
<script src="<?= ROOT ?>/public/leaflet/leaflet.js" defer></script>




<script>

</script>


<header id="head" class="secondary"></header>


<div class="row">


    <div class="col-md-9">
        <div id="map" style="height: 100vh;">


        </div>
    </div>
    <div class="col-md-3">
        <h3>Réserve Ton Parking</h3>
        <form method="post" action="<?= ROOT ?>/Reservation/addReservation">
            <input type="hidden" value="" name="id_parking" id="id_parking" />
            <div class="top-margin">
                <label>addresse</label>
                <input type="text" name="address" id="address" class="form-control">
            </div>
            <div class="top-margin">
                <label>Prix </label>
                <input type="text" disabled name="name" id="price" class="form-control">
            </div>
            <div class="row top-margin">
                <div class="col-sm-11">
                    <label>Heure d'Arrivé <span class="text-danger">*</span></label>
                    <input type="datetime-local" value="" name="begin" class="form-control">
                </div>
            </div>
            <div class="top-margin">
                <label>Duration (Minutes)</label>
                <input type="number" name="duration" step="15" class="form-control">
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
                    <button class="btn btn-action" type="submit">Reserver</button>
                </div>
            </div>
        </form>
    </div>

</div>







<?php

$content = ob_get_clean();

include("./views/includes/template.php");
