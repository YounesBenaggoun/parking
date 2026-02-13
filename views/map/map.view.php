<?php

ob_start();

?>
<link href="<?= ROOT ?>/public/leaflet/leaflet.css" rel="stylesheet" />
<script src="<?= ROOT ?>/public/leaflet/leaflet.js" defer></script>


<script>

</script>


<header id="head" class="secondary"></header>

<div id="map" style="height: 100vh;">


</div>







<?php

$content = ob_get_clean();

include("./views/includes/template.php");
