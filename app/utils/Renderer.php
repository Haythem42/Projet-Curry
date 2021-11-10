<?php

    namespace app\utils;


    /**
     * Renderer Interface which allows to concatenate a view with data
     * 
     * @author haythem
     */
class Renderer
{

    /**
     * Function which returns a view.
     * 
     * @param file  $file
     * @param array $data
     * 
     * @return string $content
     */
    public static function render($file, array $data = null) : string
    {

        $path = __DIR__ . DIRECTORY_SEPARATOR . "../views" . DIRECTORY_SEPARATOR . $file ; //chemin vers le fichier   //je suis pas sûr
        ob_start();
        if ($data != null) {

            extract($data); // récupère les données et les prapare pour les fusionner avec la page

        }

        include $path;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;

    }
        
}

?>
