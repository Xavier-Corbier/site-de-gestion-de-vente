<?php
require_once File::build_path(array("model", "ModelCommande.php"));
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("model", "ModelFournisseur.php"));
require_once File::build_path(array("modules","fpdf", "fpdf.php"));

class ControllerFacture {
    protected static $object = 'facture';
    public static function toPDF(){
        if (Session::is_admin()){
            $pag=ModelCommande::selectAll();    //on récupères les commandeFournisseur
            $id="idFournisseur";//on determine l'id du founisseur
            $tmp=0;// variable d'increment
            $total=0;// total de la commande
            foreach ($pag as $cle => $valeur) { // on parcourt la list des commande
                $date=substr($valeur->get('date'),0,7);// On ne prend en compte que le mois en cours
                $mois=substr($_POST["date"],0,7); // Mois séléctionné par l'admin

                if(!($date===$mois) || !($valeur->get($id)===$_POST["id"])){
                    // Si la mois de la commande ne corresponds pas ou l'id de commanditaire de corespond pas
                    unset($pag[$tmp]);// on supprime la commande de la liste à renvoyer pour créee la facture
                }else{
                    $total+=$valeur->get('prixCommande');// Sinon on ajoute la valeur au total de la commande
                }
                $tmp++;// On incrémente
            }
            require (File::build_path(array("view","facture","affichage.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function createFournisseur() {
        if (Session::is_admin()){
            $tab=ModelFournisseur::selectAll();
            $effect="toPDF";
            $view='updateFournisseur';
            $pagetitle='Création du PDF';
            $model="Fournisseur";
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
    public static function readAll(){
        if (Session::is_admin()){
            $view='create';
            $pagetitle="Création facture";
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
}