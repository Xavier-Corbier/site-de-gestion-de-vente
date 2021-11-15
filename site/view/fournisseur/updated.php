<div class="alert alert-success mx-5" role="alert">
<?php
echo 'Le fournisseur '.htmlspecialchars($_POST['nomFournisseur']).' a bien été mis à jour !</p>';
?>
</div>
   <?php
     require_once (File::build_path(array("view","fournisseur","list.php")));
   ?>