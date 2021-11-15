<div class="alert alert-success mx-5" role="alert">
  Le produit <?php echo htmlspecialchars(ModelProduit::select($_POST['idProduit'])->get("nomProduit")); ?> a bien été mis à jour !
</div>
   <?php
     require_once (File::build_path(array("view","produit","list.php")));
   ?>