<div class="alert alert-success mx-5" role="alert">
  La catégorie <?php echo $_POST['valeur']; ?> a bien été mis à jour !
</div>
   <?php
     require_once (File::build_path(array("view","categorie","list.php")));
   ?>