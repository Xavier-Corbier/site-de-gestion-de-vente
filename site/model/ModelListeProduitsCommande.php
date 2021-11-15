<?php
require_once File::build_path(array("model", "Model.php"));
require_once File::build_path(array("model", "ModelProduit.php"));

class ModelListeProduitsCommande extends Model{
    
    //private $etatCommande (passée/payée/livrée)
    private $idCommandeClient;    
    private $idProduit;
    private $quantite;
    protected static $objet = 'ListeProduitsCommande';
    protected static $primary='idCommandeClient';
    
    
    public function __construct($idC = NULL, $prod = NULL, $qte=NULL){
        if (!is_null($idC) && !is_null($dC)){
            $idCommande=$idC;
            $idProduit=$idProd;
            $quantite=$qte;
        }    
    }
    
    public static function selectMore($primary_value,$key) {
      $table_name = ucfirst(static::$objet);
      $class_name = 'Model'.$table_name;      
      $primary_key = ucfirst(static::$primary);
      try{
      $sql = "SELECT idProduit,quantite from $table_name WHERE $key=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
          "nom_tag" => $primary_value,
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);
      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_NUM);
      $tab = $req_prep->fetchAll();
      }catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab)){
          return false;
      }
      //transformation en un tableau produit-> quantite
      $retTab=array();
      foreach($tab as $listObj){
      $retTab[$listObj[0]]=$listObj[1];
      }
      return $retTab;      
   }
    
}
