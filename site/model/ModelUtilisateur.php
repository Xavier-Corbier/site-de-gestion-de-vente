<?php
require_once (File::build_path(array("model","Model.php")));

class ModelUtilisateur extends Model {

    private $login;
    private $nom;
    private $prenom;
    private $admin;
    private $email;
    private $nonce;
    private $idClient;
    protected static $objet = 'Utilisateur';
    protected static $primary='login';

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

    // un constructeur
    public function __construct($login = NULL, $nom = NULL, $prenom = NULL) {
        if (!is_null($login) && !is_null($nom) && !is_null($prenom)) {
            $this->login = $login;
            $this->nom = $nom;
            $this->prenom = $prenom;          
        }
    }

    public static function checkPassword($login,$mot_de_passe_chiffre){
          $sql = "SELECT * FROM `Utilisateur` WHERE login=:login AND mdp=:mdp";
          // Préparation de la requête
          $req_prep = Model::$pdo->prepare($sql);

          $values = array(
              "login" => $login,
              "mdp" => $mot_de_passe_chiffre,
          );
          // On donne les valeurs et on exécute la requête   
          $req_prep->execute($values);
          $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelTrajet');
          $result = $req_prep->fetchAll();
          if (empty($result)) {
            return false;
          } else {
            return true;
          }
    }
}