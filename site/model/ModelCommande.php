<?php
require_once File::build_path(array("model", "Model.php"));

class ModelCommande extends Model{
  private $idCommande;
  private $idFournisseur;
  private $idProduit; // ajouter à la création par un <select>
  private $quantite;
  private $prixCommande;
  private $date;
  protected static $objet = 'Commande';
  protected static $primary='idCommande';
           
  public function __construct($ic = NULL, $ip = NULL, $d = NULL, $pc = NULL, $q = NULL, $if = NULL) {
    if (!is_null($ic) && !is_null($ip) && !is_null($d) && !is_null($pc) && !is_null($q) && !is_null($if)) {
      $this->idCommande = $ic;
      $this->idFournisseur = $if;
      $this->idProduit = $ip;
      $this->quantite = $q;
      $this->prixCommande = $pc;
      $this->date = $d;
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
    public static function updateProduit(){
        $produit=ModelProduit::select($_GET['idProduit']);
        $data['quantite']=$produit->get('quantite')+$_GET['quantite'];
        $data['idProduit']=$_GET['idProduit'];
        ModelProduit::update($data);
        ModelCommande::delete($_GET['idCommande']);
    }
}
?>