<p>
<?php
if (isset($error)){
	echo $error;
} else {
	echo "Erreur inconnu";
}  ?>
</p>
<div class="center" style="padding-top:40px;">
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Erreur</h4>
        <p class="mb-0">Vous vous êtes perdus ?  <a href="./index.php" class="alert-link">Cliquez ici </a> pour retrouver votre chemin.</p>
    </div>
</div>