<?php
require_once File::build_path(array("model", "Model.php"));
require_once File::build_path(array("model", "ModelCommande.php"));
require_once File::build_path(array("model", "ModelProduit.php"));
require_once File::build_path(array("model", "ModelUtilisateur.php"));
require_once File::build_path(array("model", "ModelListeProduitsCommande.php"));


class ModelStatistique extends Model{

    private $chiffreAffaires; //Chiffre d'affaires
    protected static $objet = 'Statistique';
    protected static $primary='chiffreAffaires';

    public function __construct($ca = NULL) {
        if (!is_null($ca)) {
            $this->chiffreAffaires = $ca;
        }
    }

    public static function calculerChiffreAffaires() {
        $rep = Model::$pdo->query("SELECT SUM(prixTotal) AS res FROM CommandeClient WHERE etatCommande=2");
        $rep->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $rep->fetchAll();
        return $tab[0]['res'];
    }

    public static function moyennePanier() {
        $tab = ModelCommandeClient::selectAll();
        $resultat=0;
        $compteur=0;
        foreach ($tab as $valeur){
            $compteur++;
            $resultat = $resultat + $valeur->get('prixTotal');
        }
        return $resultat / $compteur;
    }

    public static function maxCommande() {
        $rep = Model::$pdo->query("SELECT idProduit, COUNT(idProduit) AS nb 
                                    FROM ListeProduitsCommande 
                                    GROUP BY idProduit 
                                    ORDER BY nb DESC 
                                    LIMIT 1 ");
        $rep->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $rep->fetchAll();
        return $tab[0]['idProduit'];
    }
    public static function caPeriode($debut,$fin,$client) {
        $datetime1 = new DateTime($debut);
        $datetime2 = new DateTime($fin);
        $interval = $datetime1->diff($datetime2);
        $diff= $interval->format('%m');
        for ($i = 0; $i < $diff; $i++) {
            if ($client=="0"){
                $sql = "SELECT SUM(prixTotal) AS res FROM CommandeClient WHERE dateCommande>:debut AND dateCommande<=:fin AND etatCommande=2";
            } else {
                $sql = "SELECT SUM(prixTotal) AS res FROM CommandeClient WHERE dateCommande>:debut AND dateCommande<=:fin AND etatCommande=2 AND  idClient=:idClient";
            }

            $rep = Model::$pdo->prepare($sql);
            $j=$i+1;
            $deb = date("Y-m-d",strtotime(date("Y-m-d", strtotime($debut)) . " +$i month"));
            $f = date("Y-m-d",strtotime(date("Y-m-d", strtotime($debut)) . " +$j month"));
            if ($client=="0"){
                $values = array(
                    "debut" => $deb,
                    "fin" => $f
                );
            } else {
                $cli=ModelUtilisateur::select($client)->get("idClient");
                $values = array(
                    "debut" => $deb,
                    "fin" => $f,
                    "idClient" => $cli,
                );
            }

            $rep->execute($values);
            $rep->setFetchMode(PDO::FETCH_ASSOC);
            $res=$rep->fetchAll();
            $tab[date("m",strtotime($deb))] = $res[0]["res"];
        }
        return $tab;
    }
}
?>
