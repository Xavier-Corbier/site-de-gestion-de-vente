<div class="alert alert-success mx-5" role="alert">
<?php
echo 'L utilisateur '. htmlspecialchars($_GET['login']). ' a bien été supprimé !';
?>
</div>

   <?php
     require_once (File::build_path(array("view","utilisateur","list.php")));
   ?>