<?php
require_once File::build_path(array("config", "Conf.php"));;
class Model {
	public static $pdo;
  // Connexion base de données
	public static function Init() {
		$login = Conf::getLogin();
		$password = Conf::getPassword();
		$database_name = Conf::getDatabase();
		$hostname = Conf::getHostname();
		try{
		  self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name",$login,$password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")); 
		  self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
		  if (Conf::getDebug()) {
		    echo $e->getMessage(); // affiche un message d'erreur
		  } else {
		    echo 'Une erreur de connexion est survenue <a href=""> retour a la page d\'accueil </a>';
		  }
		  die();
		}	
	}
  // Select générique de toutes les lignes d'une table
	public static function selectAll(){
    	$table_name = ucfirst(static::$objet);
    	$class_name = 'Model'.$table_name;
        try{
    	$rep = Model::$pdo->query("SELECT * FROM $table_name");
    	$rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
    	$tab = $rep->fetchAll();
        }catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
        if (empty($tab)){
          return false;
      }
    	return $tab;
  } 
  // Select générique en fonction de la clé primaire
  public static function select($primary_value) {
      $table_name = ucfirst(static::$objet);
      $class_name = 'Model'.$table_name;      
      $primary_key = ucfirst(static::$primary);
      try{
      $sql = "SELECT * from $table_name WHERE $primary_key=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
          "nom_tag" => $primary_value,
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);
      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $tab = $req_prep->fetchAll();
      } catch(PDOException $e){
			echo $e->getMessage();
			die();
      }
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab)){
          return false;
      }
      return $tab[0];
   }
   public static function selectMore($primary_value,$key) {
      $table_name = ucfirst(static::$objet);
      $class_name = 'Model'.$table_name;      
      $primary_key = ucfirst(static::$primary);
      try{
      $sql = "SELECT * from $table_name WHERE $key=:nom_tag";
      // Préparation de la requête
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
          "nom_tag" => $primary_value,
      );
      // On donne les valeurs et on exécute la requête   
      $req_prep->execute($values);
      // On récupère les résultats comme précédemment
      $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
      $tab = $req_prep->fetchAll();
      }catch(PDOException $e){
			echo $e->getMessage();
			die();
		}
      // Attention, si il n'y a pas de résultats, on renvoie false
      if (empty($tab)){
          return false;
      }     
      return $tab;      
   }
   // Delete générique en fonction de la clé primaire
   public static function delete($primary_value) {
      $table_name = ucfirst(static::$objet);
      $primary_key = ucfirst(static::$primary);
      try {
        $sql = "DELETE from $table_name WHERE $primary_key=:nom_tag";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $primary_value,
        );
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);
      } catch (PDOException $e) {
          echo $e->getMessage();
        // Attention, si il y a une erreur, on renvoie false
        return false;
      }
   }
   // Update générique en fonction des données récupéré
   public static function update($data) {
      $val=""; 
      $primary_key = static::$primary;
      $table_name = ucfirst(static::$objet);
      // Création du contenu SET de la requète SQL
      foreach ($data as $cle => $valeur)
          $val=$val.$cle.'=:'.$cle.',';
      // Retrait de la dernière virgule en trop
      $val=rtrim($val,",");
      try {
        $sql = "UPDATE $table_name SET $val WHERE $primary_key=:$primary_key;";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        foreach ($data as $cle => $valeur)
          $values[$cle]=$valeur;
        // On donne les valeurs et on exécute la requête   
        $req_prep->execute($values);
      } catch (PDOException $e) {
        // Attention, si il y a une erreur, on renvoie false
        return false;
      }
    }
    // Save générique en fonction des données récupéré
    public static function save($data) {
      $val=""; 
      $insert="";
      $table_name = ucfirst(static::$objet);
      // Création du contenu VALUES de la requète SQL
      foreach ($data as $cle => $valeur){
          $val=$val.$cle.',';
          $insert=$insert.':'.$cle.',';
      }
      // Retrait de la dernière virgule en trop
      $insert=rtrim($insert,",");
      $val=rtrim($val,",");
      try {
        $sql = "INSERT INTO $table_name ($val) VALUES ($insert)";
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);
        foreach ($data as $cle => $valeur)
          $values[$cle]=$valeur;
        // On donne les valeurs et on exécute la requête
        $req_prep->execute($values);
      } catch (PDOException $e) {
          echo($e->getMessage());
        // Attention, si il y a une erreur, on renvoie false
        return false;
      }
    }    
}
Model::Init();
?>