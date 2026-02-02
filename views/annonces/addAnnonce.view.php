<?php

$pageTitle = "Publication d'Annonce";



ob_start();

?>

<h2>Add Annonce View </h2>

<div>
    <form method="post" enctype="multipart/form-data" action="<?= ROOT ?>/Annonce/registerAnnonce">
        <p>
            Titre <input type="text" name="titre" />
        </p>
        <p>
            Prix <input type="text" name="prix" />
        </p>
        <p>
            Disponible <input type="text" name="disponible" />
        </p>
        <p>
            <input type="submit" value="Save" />
        </p>
    </form>
</div>

<?php

$content = ob_get_clean();
include("./views/includes/template.php");
