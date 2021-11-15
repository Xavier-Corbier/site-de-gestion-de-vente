<?php
require_once File::build_path(array("model", "ModelProduit.php")); 
require_once File::build_path(array("model", "ModelFournisseur.php")); 
require_once File::build_path(array("model", "ModelCategorie.php"));
require_once File::build_path(array("lib", "Upload.php"));

class ControllerAdmin{
    protected static $object = 'admin';
    public static function readAll() {
        if (Session::is_admin()){
            // Produit à réaprovisionner
            $tab = ModelProduit::getEmpty();
            $view='list';
            $pagetitle='Administration';
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
        	$control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }

    }
    public static function carousel(){
        if (Session::is_admin()) {
            // Vérification fichier 1
            if (!empty($_FILES['nom-du-fichier1']) && is_uploaded_file($_FILES['nom-du-fichier1']['tmp_name'])) {
                Upload::delete("accueil1");
                Upload::image("accueil1",'nom-du-fichier1');
            }
            // Vérification fichier 2
            if (!empty($_FILES['nom-du-fichier2']) && is_uploaded_file($_FILES['nom-du-fichier2']['tmp_name'])) {
                Upload::delete("accueil2");
                Upload::image("accueil2",'nom-du-fichier2');
            }
            // Vérification fichier 3
            if (!empty($_FILES['nom-du-fichier3']) && is_uploaded_file($_FILES['nom-du-fichier3']['tmp_name'])) {
                Upload::delete("accueil3");
                Upload::image("accueil3",'nom-du-fichier3');
            }
            // Produit à réaprovisionner
            $tab = ModelProduit::getEmpty();
            $view='updated';
            $pagetitle='Administration';
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
}
?>