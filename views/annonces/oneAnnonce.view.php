<?php

$pageTitle = "One Annonce";



ob_start();

?>

<h2>One Annonce </h2>

<div>
    mon Annonnce = 
</div>




<?php

$content = ob_get_clean();

include("./views/includes/template.php");
