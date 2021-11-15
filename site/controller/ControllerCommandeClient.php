<?php
require_once File::build_path(array("model", "ModelCommandeClient.php"));
require_once File::build_path(array("model", "ModelUtilisateur.php"));
require_once File::build_path(array("model", "ModelListeProduitsCommande.php"));
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("controller", "ControllerUtilisateur.php"));
require_once File::build_path(array("controller", "ControllerPanier.php"));
require_once File::build_path(array("lib", "Session.php"));

class ControllerCommandeClient{
    protected static $object='commandeClient';
    public static function readAll($effet=null) {
        $effect=$effet;
        if(Session::is_connected()){
            if (Session::is_admin()){
                $tab_client=ModelUtilisateur::selectAll();
                if (isset($_POST['idClient'])){
                    $idClient=$_POST['idClient'];
                    $tab_CommandeClient = ModelCommandeClient::selectMore($idClient,"idClient");
                } else {
                    $tab_CommandeClient = ModelCommandeClient::selectAll();
                }
                $view='list';
                $pagetitle='Liste des Commandes clients';
            } else {
                $login=$_SESSION['login'];
                $User=ModelUtilisateur::select($login);
                $idUser=$User->get('idClient');
                $tab_CommandeClient = ModelCommandeClient::selectMore($idUser,"idClient");
                $view='list';
                $pagetitle='Liste des Commandes';
            }
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function read(){
        if ((Session::is_connected()&&Session::is_commande($_GET['idCommandeClient']))||Session::is_admin()){
            $view='detail';
            $pagetitle='Detail commande client';
            if(isset($_GET['idCommandeClient'])){
                $idCommandeClient=$_GET['idCommandeClient'];
                $commandeClient=ModelCommandeClient::select($idCommandeClient);
                $listeProduits=$commandeClient->get('listeProduits');
            } else {
                $view='error';
            }
            require (File::build_path(array("view", "view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function created() {
        if (Session::is_connected()){
            if (!isset($_POST['commandeEnCours'])) {
                $tab_Commande = ModelCommandeClient::selectAll();
                $view='list';
                $pagetitle='Liste des Commandes';
            } else {
                $commandeClient=unserialize(base64_decode($_POST['commandeEnCours']));
                $commandeClient->set('dateLivraison',$_POST['dateLivraison']);
                //construction de la commande à envoyer
                $data=array(
                    'idCommandeClient'=>NULL,
                    'idClient'=> $commandeClient->get('idClient'),
                    'dateCommande'=> $commandeClient->get('dateCommande'),
                    'dateLivraison'=> $_POST['dateLivraison'],
                    'prixTotal'=> $commandeClient->get('prixTotal')
                );
                if (ModelCommandeClient::save($data) === false || $commandeClient->saveList()===false) {
                    $view = 'error';
                    $pagetitle = 'Erreur insertion';
                    $error = 'Erreur : la Commande existe déjà / impossible d inserer';
                } else {
                    setcookie("panier","",time()-1);
                    $view='created';
                    $pagetitle = 'Liste des Commandes';
                }
            }
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function create(){
        if (Session::is_connected()&&Session::is_user($_SESSION['login'])){
            $effect="created";
            $view='update';
            $pagetitle='Création d une Commande Client';
            $Client=ModelUtilisateur::select($_SESSION['login']);
            $idClient=$Client->get('idClient');
            $v = new ModelCommandeClient();
            $v->set('dateCommande',date("Y/m/d"));
            $v->set('idClient',$idClient);
            require (File::build_path(array("view","view.php")));
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function reiterate(){
        if (Session::is_commande($_GET['idCommandeClient'])){
            $commande = ModelCommandeClient::select($_GET['idCommandeClient']);
            setcookie ("panier", "", time() - 1);
            $panier=$commande->get('listeProduits');
            var_dump($panier);
            setcookie("panier", serialize($panier), time()+600);
            header('Location: ./index.php?controller=Panier&action=read');
            exit();
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function cancel(){
        if (Session::is_commande($_POST['idCommandeClient'])||Session::is_admin()){
            $effect="cancelled";
            $idCommande = $_POST['idCommandeClient'];
            $data=array(
                'idCommandeClient'=>$idCommande,
                'etatCommande'=>'3'
            );
            ModelCommandeClient::update($data);
            ControllerCommandeClient::readAll($effect);
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
    public static function directOrder(){
        $Produit=ModelProduit::select($_POST['idProduit']);
        $quantite=$_POST['quantite'];
        $prixTotal=($Produit->get('prixProduit'))*$quantite;
        $_SESSION['prix']=$prixTotal;
        $_SESSION['panier']=array($_POST['idProduit']=>$quantite);
        if (isset($_SESSION['login'])) {
            controllerCommandeClient::create();
        } else {
            controllerUtilisateur::connect('redirect');
        }
    }
    public static function checkLogged(){
        if (isset($_SESSION['login'])) {
            controllerCommandeClient::create();
        } else {
            controllerUtilisateur::connect('redirect');
        }
    }
    public static function send(){
        if (Session::is_commande($_GET['idCommandeClient'])||Session::is_admin()){
            $idCommandeClient=$_GET['idCommandeClient'];
            $commande=ModelCommandeClient::select($idCommandeClient);
            $etat=$commande->get('etatCommande');
            if ($etat==1){
                $listeProduits=$commande->get('listeProduits');
                foreach($listeProduits as $idProduit=>$quantite){
                    ModelCommandeClient::removeFromStock($idProduit,$quantite);
                }
            }
            $data=array(
                'idCommandeClient'=>$idCommandeClient,
                'etatCommande'=> $etat+1
            );
            ModelCommandeClient::update($data);
            ControllerCommandeClient::readAll();
        } else {
            // Redirection
            $control='ControllerAccueil';
            $page='readAll';
            $control::$page();
        }
    }
}