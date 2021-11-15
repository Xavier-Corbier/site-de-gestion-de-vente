<?php
require_once File::build_path(array("model", "Model.php"));

class ModelProduit extends Model{
   
  private $idProduit;
  private $nomProduit;
  private $categorieProduit; // ajouter à la création par un <select>
  private $descriptionProduit;
  private $prixProduit;
  private $quantite;
  private $idFournisseur;
  private $promotion;
  protected static $objet = 'Produit';
  protected static $primary='idProduit';

    public function __construct($ip = NULL, $np = NULL, $dp = NULL, $cp = NULL, $pp = NULL, $q = NULL, $if = NULL, $pro = NULL) {
        if (!is_null($ip) && !is_null($np) && !is_null($cp) && !is_null($dp) && !is_null($pp) && !is_null($q) && !is_null($if) && !is_null($pro)) {
            $this->idProduit = $ip;
            $this->nomProduit = $np;
            $this->categorieProduit = $cp;
            $this->descriptionProduit = $dp;
            $this->prixProduit = $pp;
            $this->quantite = $q;
            $this->idFournisseur = $if;
            $this->promotion = $pro;
        }
    }
  // Getter générique (pas expliqué en TD)
    public function get($nom_attribut) {
        if (property_exists($this, $nom_attribut))
            return $this->$nom_attribut;
        return false;
    }
    // Setter générique (pas expliqué en TD)
    public function set($nom_attribut, $valeur) {
        if (property_exists($this, $nom_attribut))
            $this->$nom_attribut = $valeur;
        return false;
    }
    public static function getEmpty(){
      $table_name = ucfirst(static::$objet);
      $class_name = 'Model'.$table_name;
      $rep = Model::$pdo->query("SELECT * FROM $table_name WHERE quantite<2");
      $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $tab = $rep->fetchAll();
      return $tab; 
    }
    public static function selectFournisseur($id){
      $table_name = ucfirst(static::$objet);
      $class_name = 'Model'.$table_name;
      $key = 'idFournisseur';
      $sql = "SELECT * from $table_name WHERE $key=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
          "nom_tag" => $id,
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);
      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $tab = $req_prep->fetchAll();
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab))
          return false;
      return $tab;
    }
    public static function selectPromotion(){
        $table_name = ucfirst(static::$objet);
        $class_name = 'Model'.$table_name;
        $rep = Model::$pdo->query("SELECT * FROM $table_name WHERE promotion != 0");
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $rep->fetchAll();
        return $tab;
    }
    public function toJSON(){
        $json = array(
            'name' => $this->get('nomProduit'),
            'id' => $this->get('idProduit'),
            'categorie' => $this->get('categorieProduit'),
            'prix' => $this->get('prixProduit')
        );
        return json_encode($json);
    }
    public static function selectProductSimilaire($categorie){
        $table_name = ucfirst(static::$objet);
        $class_name = 'Model'.$table_name;
        $rep = "SELECT * FROM ".$table_name." WHERE categorieProduit = :cat";
        $req_prep = Model::$pdo->prepare($rep);
        $values = array(
            "cat" => $categorie
        );
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $req_prep->fetchAll();
        return $tab;
    }
}
?>