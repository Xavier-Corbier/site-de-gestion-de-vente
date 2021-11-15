<?php
require_once File::build_path(array("model", "Model.php"));

class ModelCaisse extends Model {
    public static function login(){
        if(!isset($_SESSION['caisse'])){
            $_SESSION['caisse']=$_SESSION['login'];
            $_SESSION['login']="caisse";
            unset($_SESSION['panier']);
            unset($_SESSION['prix']);
        }
    }
    public static function add(){
        // Vérification stock
        $stock=ModelProduit::select($_POST['idProduit'])->get('quantite');
        if ($stock>$_POST['quantite']){
            $quantite=$_POST['quantite'];
        } else {
            $quantite=$stock;
        }
        // Ajout au panier
        $_SESSION['panier'][$_POST['idProduit']]=$quantite;
        // Calcul du prix total
        $prix=0;
        foreach ($_SESSION['panier'] as $key => $value){
            $produit=ModelProduit::select($key);
            if ($produit->get('promotion')!="0"){
                $prixp = $produit->get("prixProduit") * (1-$produit->get("promotion"));
            } else {
                $prixp = $produit->get("prixProduit");
            }
            $prix = $prix + ($prixp*$value);
        }
        $_SESSION['prix']=$prix;
    }
    public static function quit(){
        if (isset($_SESSION['caisse'])){
            $_SESSION['login']=$_SESSION['caisse'];
            unset($_SESSION['caisse']);
        }
    }
    public static function commande($idClient){
        // Construction de la commande à envoyer
        $data=array(
            'idCommandeClient'=>NULL,
            'idClient'=> $idClient,
            'dateCommande'=> date("Y/m/d"),
            'dateLivraison'=> date("Y/m/d"),
            'prixTotal'=> $_SESSION['prix'],
            'etatCommande'=> 2 );
        return $data;
    }
    public static function updateProduit(){
        foreach ($_SESSION['panier'] as $cle => $valeur){
            $produit=ModelProduit::select($cle);
            $stock=$produit->get('quantite');
            $data=array(
                'idProduit'=>$cle,
                'quantite'=> $stock-$valeur );
            ModelProduit::update($data);
        }
        unset($_SESSION['panier']);
        unset($_SESSION['prix']);
    }
}
?>
