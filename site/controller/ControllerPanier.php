<?php
require_once File::build_path(array("model", "ModelPanier.php"));
class ControllerPanier{
    protected static $object = 'panier';
    public static function add(){
        ModelPanier::add();
        header('Location: ./index.php?controller=Panier&action=read');
        exit();
    }
    public static function read(){
        $view='detail';
        $pagetitle='Votre panier';
        require (File::build_path(array("view","view.php")));
    }
    public static function deleteAll(){
        ModelPanier::deleteAll();
        header('Location: ./index.php?controller=panier&action=read');
        exit();
    }
    public static function delete(){
        ModelPanier::deleteElement();
        header('Location: ./index.php?controller=panier&action=read');
        exit();
    }
}
?>