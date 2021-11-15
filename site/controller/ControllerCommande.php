<?php
require_once File::build_path(array("model", "ModelCommande.php")); 
require_once File::build_path(array("model", "ModelProduit.php")); 
require_once File::build_path(array("model", "ModelFournisseur.php")); 
class ControllerCommande{
    protected static $object = 'commande';
    public static function readAll() {
        if (Session::is_admin()){
            $tab_Commande = ModelCommande::selectAll();
            $view='list';
            $pagetitle='Liste des Commandes';
            require (File::build_path(array("view","view.php")));
        } else {
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function created() {
        if (Session::is_admin()){
            if (empty($_POST)) {
                $tab_Commande = ModelCommande::selectAll();
                $view='list';
                $pagetitle='Liste des Commandes';
            } else if (ModelCommande::save($_POST)===false) {
                $view='error';
                $pagetitle='Erreur insertion';
                $error='Erreur : le Commande existe déjà';
            } else {
                $tab_Commande = ModelCommande::selectAll();
                $view='created';
                $pagetitle='Liste des Commandes';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function delete() {
        if (Session::is_admin()){
            if (ModelCommande::delete($_GET['idCommande'])===false) {
                $view='error';
                $pagetitle='Erreur suppression';
                $error='Erreur : le Commande n existe pas';
            } else {
                $tab_Commande = ModelCommande::selectAll();
                $view='deleted';
                $pagetitle='Liste des Commandes';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function updated() {
        if (Session::is_admin()){
            if (empty($_POST)) {
                $tab_Commande = ModelCommande::selectAll();
                $view='list';
                $pagetitle='Liste des Commandes';
            }else if (ModelCommande::update($_POST)===false) {
                $view='error';
                $pagetitle='Erreur mise à jour';
            } else {
                $tab_Commande = ModelCommande::selectAll();
                $view='updated';
                $pagetitle='Liste des voitures';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function received(){
        if (Session::is_admin()){
            ModelCommande::updateProduit();
            $tab_Commande = ModelCommande::selectAll();
            $view='list';
            $pagetitle='Liste des Commandes';
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function createFournisseur() {
        if (Session::is_admin()){
            $tab=ModelFournisseur::selectAll();
            $effect="createProduit";
            $view='updateFournisseur';
            $pagetitle='Création d un Commande';
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function createProduit(){
        if (Session::is_admin()){
            $tab2=ModelProduit::selectFournisseur($_POST['idFournisseur']);
            $effect="create";
            $view='updateProduit';
            $pagetitle='Création d un Commande';
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function create(){
        if (Session::is_admin()){
            $effect="created";
            $view='update';
            $pagetitle='Création d un Commande';
            $v = new ModelCommande();
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function update() {
        if (Session::is_admin()){
            $effect="updated";
            $v = ModelCommande::select($_POST['idCommande']);
            $view='update';
            $pagetitle='Mise à jour';
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
}
?>