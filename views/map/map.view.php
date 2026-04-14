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
        <form method="post" action="<?= ROOT ?>/parking/addParking">
            <div class="top-margin">
                <label>Nom (Alias)</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="top-margin">
                <label>addresse</label>
                <input type="text" name="address" class="form-control">
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







<?php

$content = ob_get_clean();

include("./views/includes/template.php");
