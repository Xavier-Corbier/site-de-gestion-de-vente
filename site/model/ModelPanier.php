<?php
require_once File::build_path(array("model", "Model.php"));
require_once File::build_path(array("model", "ModelProduit.php"));

class ModelPanier extends Model{
    public static function add(){
        if (empty(unserialize($_COOKIE['panier']))) {
            $panier[$_POST['idProduit']] = $_POST['quantite'];
        } else {
            $panier=unserialize($_COOKIE['panier']);
            $panier[$_POST['idProduit']] = $_POST['quantite'];
        }
        setcookie("panier", serialize($panier), time()+600);
    }
    public static function deleteAll(){
        setcookie("panier", "", time()-1);
        unset($_SESSION['codePromo']);
    }
    public static function deleteElement(){
        $panier=unserialize($_COOKIE['panier']);
        unset($panier[$_GET['idProduit']]);
        unset($_SESSION['codePromo']);
        setcookie("panier", serialize($panier), time()+600);
    }
}
?>