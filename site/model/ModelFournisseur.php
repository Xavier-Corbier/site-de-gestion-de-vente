<?php
require_once File::build_path(array("model", "Model.php"));

class ModelFournisseur extends Model{
  private $idFournisseur;
  private $nomFournisseur;
  private $telephoneFournisseur;
  private $adresseFournisseur;
  protected static $objet = 'Fournisseur';
  protected static $primary='idFournisseur';

  public function __construct($if = NULL, $nf = NULL, $tf = NULL, $af = NULL) {
    if (!is_null($if) && !is_null($nf) && !is_null($tf) && !is_null($af)) {
      $this->idFournisseur = $if;
      $this->nomFournisseur = $nf;
      $this->telephoneFournisseur = $tf;
      $this->adresseFournisseur = $af;
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
}
?>