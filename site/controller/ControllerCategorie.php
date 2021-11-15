<?php
require_once File::build_path(array("model", "ModelCategorie.php")); 
class ControllerCategorie{
    protected static $object = 'categorie';
    public static function readAll() {
        if (Session::is_admin()) {
            $tab_Categorie = ModelCategorie::selectAll(); 
            $view='list';
            $pagetitle='Liste des catégorie';
            require (File::build_path(array("view","view.php"))); 
        } else {
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function create() {
        if (Session::is_admin()) {
            $effect="created";
            $view='update';
            $pagetitle='Création d\'une catégorie';
            $v = new ModelCategorie();
            require (File::build_path(array("view","view.php")));
        } else {
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function created() {
         if (Session::is_admin()) {
            if (ModelCategorie::save($_POST)===false) {
                $view='error';
                $pagetitle='Erreur insertion';
                $error='Erreur : la catégorie existe déjà';
            } else {
                $tab_Categorie = ModelCategorie::selectAll();
                $view='created';
                $pagetitle='Liste des categories';
            }
            require (File::build_path(array("view","view.php")));
         } else {
             $control='ControllerAccueil';
             $page='readAll';
             $control::$page();
         }
    }
    public static function delete() {
        if (Session::is_admin()) {
            if (ModelCategorie::delete($_GET['id'])===false) {
                $view='error';
                $pagetitle='Erreur suppression';
                $error='Erreur : la catégorie n existe pas';
            } else {
                $tab_Categorie = ModelCategorie::selectAll();
                $view='deleted';
                $pagetitle='Liste des catégories';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function update() {
        if (Session::is_admin()) {
            $effect="updated";
            $v = ModelCategorie::select($_GET['id']);
            $view='update';
            $pagetitle='Mise à jour';
            require (File::build_path(array("view","view.php")));
        } else {
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function updated() {
        if (Session::is_admin()) {
            if (ModelCategorie::update($_POST)===false) {
                $view='error';
                $pagetitle='Erreur mise à jour';
            } else {
                $tab_Categorie = ModelCategorie::selectAll();
                $view='updated';
                $pagetitle='Liste des categories';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
}
?>