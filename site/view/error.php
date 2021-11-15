<?php
require File::build_path(array("css", "template", "header.php"));
if (isset($error)){
    echo '<p> <h2 class="text-center">'.$error.'</h2></p>';
} else {
    echo "Erreur inconnu";
}
echo '
</p>
    <div class="alert alert-danger text-center" role="alert">
        <h4 class="alert-heading">Erreur</h4>
        <p class="mb-0">Vous vous êtes perdus ?  <a href="./index.php" class="alert-link">Cliquez ici </a> pour retrouver votre chemin.</p>
    </div>
';
require File::build_path(array("css", "template", "footer.php"));
?>