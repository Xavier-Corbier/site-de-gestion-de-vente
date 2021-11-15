<?php
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("model", "ModelCategorie.php"));
require_once File::build_path(array("model", "ModelFournisseur.php"));

class ControllerAccueil{
    protected static $object = 'accueil';
    public static function readAll() {
        // Liste de promotions
        $tab_Produit = ModelProduit::selectPromotion();
        $view='listPromotion';
        $pagetitle='Accueil';
        require (File::build_path(array("view","view.php")));
    }
}
?>