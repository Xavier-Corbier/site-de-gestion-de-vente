<?php
require_once File::build_path(array("model", "Model.php"));

class ModelCategorie extends Model{
  private $id;
  private $valeur; // ajouter à la création par un <select>
  protected static $objet = 'Categorie';
  protected static $primary='id';
           
  public function __construct($v = NULL) {
    if (!is_null($v)) {
      $this->valeur = $v;
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