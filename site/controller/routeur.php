<?php
    $controller_default = 'Accueil';
    $action = 'readAll';
    $controller_class = "Controller" . ucfirst($controller_default);
    // Si une action est demandé
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    }
    // Si un controller est demandé
    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'];
        $controller_class = "Controller" . ucfirst($controller);
    }
    // Les controller sont a cette place car nous avons essayé d'utiliser des variables GLOBAL
require_once File::build_path(array("controller", "ControllerFournisseur.php"));
require_once File::build_path(array("controller", "ControllerProduit.php"));
require_once File::build_path(array("controller", "ControllerPanier.php"));
require_once File::build_path(array("controller", "ControllerCategorie.php"));
require_once File::build_path(array("controller", "ControllerAdmin.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerCommande.php"));
require_once File::build_path(array("controller", "ControllerAccueil.php"));
require_once File::build_path(array("controller", "ControllerFacture.php"));
require_once File::build_path(array("controller", "ControllerStatistique.php"));
require_once File::build_path(array("controller", "ControllerCaisse.php"));
    // Gestion des erreurs
    if (get_class_methods($controller_class)) {
        if (in_array($action,get_class_methods($controller_class))) {
            $controller_class::$action();
        } else {
            $pagetitle='Erreur de chargement';
            $error='404 not found !';
            require_once (File::build_path(array("view","error.php")));
        }
    } else {
        $pagetitle='Erreur de chargement';
        $error='Erreur controller';
        require_once (File::build_path(array("view","error.php")));
    }
?>