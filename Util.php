<?php

class Util {

    public static function getFileText($filename) {
        $file = fopen($filename, "rb");

        if(!file_exists($filename)) {
            echo "Erreur, fichier introuvable";
            exit();
        }
        $size = filesize($filename);
        $text = fread($file, $size);
        fclose($file);

        return $text;
    }
}