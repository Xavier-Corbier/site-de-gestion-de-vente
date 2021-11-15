<?php
require_once File::build_path(array("model", "ModelUtilisateur.php"));
require_once File::build_path(array("model", "ModelCommandeClient.php"));

class Session {
    public static function is_user($login) {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }
    public static function is_admin() {
	    return (!empty($_SESSION['admin']) && $_SESSION['admin']);
	}
	public static function is_connected() {
        return isset($_SESSION['login']);
    }
    public static function is_commande($idCommande) {
        if (Session::is_connected()){
            return ModelUtilisateur::select($_SESSION['login'])->get('idClient')===ModelCommandeClient::select($idCommande)->get('idClient');
        } else {
            return false;
        }
    }
}
?>