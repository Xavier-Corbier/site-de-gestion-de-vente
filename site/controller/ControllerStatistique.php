<?php
require_once File::build_path(array("model", "ModelStatistique.php"));
require_once File::build_path(array("model", "ModelProduit.php"));

class ControllerStatistique {
    protected static $object = 'statistique';
    public static function readAll(){
        if (Session::is_admin()){
            // Permet une équivalence entre mois et numéro de mois
            $mois = array("01"=>'janvier', "02"=>'février', "03"=>'mars', "04"=>'avril', "05"=>'mai', "06"=>'juin', "07"=>'juillet', "08"=>'aout', "09"=>'septembre', "10"=>'octobre', "11"=>'novembre', "12"=>'décembre');
            $ca = ModelStatistique::calculerChiffreAffaires();
            $moyPanier = ModelStatistique::moyennePanier();
            if(!isset($_POST['debut'])||!isset($_POST['fin'])){
                // Par défaut le calcul se fera sur les 3 derniers mois
                $debut = date("Y-m-d",strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . " -3 month"));
                $fin = date("Y-m-d");
                $client = 0;
            } else {
                $debut=$_POST['debut'];
                $fin=$_POST['fin'];
                $client=$_POST['client'];
            }
            $caPeriode = ModelStatistique::caPeriode($debut,$fin,$client);
            $clients=ModelUtilisateur::selectAll();
            $maxCommande = ModelProduit::select(ModelStatistique::maxCommande())->get('nomProduit');
            $view='list';
            $pagetitle='Comptabilité';
            require (File::build_path(array("view","view.php")));
        } else {
            $control = 'ControllerAccueil';
            $page = 'readAll';
            $control::$page();
        }
    }
}
?>
