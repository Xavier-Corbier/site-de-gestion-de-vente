<?php
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("model", "ModelCaisse.php"));

class ControllerCaisse
{
    protected static $object = 'caisse';
    public static function readAll() {
        if (Session::is_admin()) {
            // Connexion
            ModelCaisse::login();
            // Liste Produits
            $tab_Produit = ModelProduit::selectAll();
            // Liste Utilisateurs
            $user=ModelUtilisateur::selectAll();
            $view='read';
            $pagetitle='Caisse';
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function add(){
        if (Session::is_admin()) {
            // Ajout du produit dans le panier
            ModelCaisse::add();
            self::readAll();
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function change(){
        if (Session::is_admin()) {
            $_SESSION['login']=$_POST['client'];
            self::readAll();
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function quit(){
        if (Session::is_admin()) {
            ModelCaisse::quit();
            header('Location: ./index.php?controller=admin');
            exit();
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function deleteAll(){
        if (Session::is_admin()) {
            // Suppression panier
            unset($_SESSION['panier']);
            self::readAll();
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function ValiderCommande(){
        if (Session::is_admin()) {
            // Récupération des données
            $Client=ModelUtilisateur::select($_SESSION['login']);
            $idClient=$Client->get('idClient');
            $ligneCommande = new ModelCommandeClient();
            $ligneCommande->set('dateCommande',date("Y/m/d"));
            $ligneCommande->set('idClient',$idClient);
            // Préparation commande
            $data=ModelCaisse::commande($idClient);
            // Vérification Commande
            if (ModelCommandeClient::save($data) === false || $ligneCommande->saveList()===false) {
                $view = 'error';
                $pagetitle = 'Erreur insertion';
                $error = 'Erreur : la Commande existe déjà / impossible d inserer';
            } else {
                // Mise à jour stock produit
                ModelCaisse::updateProduit();
                $view='created';
                $pagetitle = 'Liste des Commandes';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }

    }
}