<?php
class Upload {
    public static function image($nom,$id) {
        $pic_path = __DIR__ .DIRECTORY_SEPARATOR. "../upload/$nom";
        $allowed_ext = array("jpg", "jpeg", "png");
        $explosion = explode('.',$_FILES[$id]['name']);
        if (!in_array(end($explosion), $allowed_ext)) {
            echo "Mauvais type de fichier !";
        }else if (!move_uploaded_file($_FILES[$id]['tmp_name'], $pic_path)) {
            echo "La copie a échoué";
        }
    }
    public static function delete($nom) {
        $path= __DIR__ .DIRECTORY_SEPARATOR. "../upload/$nom";
        if (file_exists($path))
            unlink($path);
    }
}
?>