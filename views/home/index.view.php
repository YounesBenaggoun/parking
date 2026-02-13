<?php

$pageTitle = "index-Home ... Ma Page Title";



ob_start();

?>

<h2>BienVenue page Accreil  </h2>




<?php

$content = ob_get_clean();

include("./views/includes/template.php"); 








