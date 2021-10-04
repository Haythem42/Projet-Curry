<?php

    namespace app\utils;


/**
 * Description of Renderer interface
 * 
 * @author haythem
*/
class Renderer {

    /**
     * 
     * 
    */
    public static function render($file, array $data = null) : string {
        $path = "../app/views/".$file ; //chemin vers le fichier   //je suis pas sûr
        ob_start();
        if ($data != null) {
            extract ($data); // récupère les données et les prapare pour les fusionner avec la page
        }
        include $path;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}

?>