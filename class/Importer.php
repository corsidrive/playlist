<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Importer
 * 
 * @author saras
 */
class Importer {

    public static function json2array($filename) {

        //controllo se il file json esiste
        if (isset($filename) && file_exists($filename)) {
            $contenuto_stringa = file_get_contents($filename);

            
            $json = json_decode($contenuto_stringa, true);
            //se il formato del json non e corretto
            if (!is_null($json)) {
                return $json;
            } else {
               
                throw new Exception("il file $filename non  é un JSON");
            }
            
        } else {
            throw new Exception("il file $filename, non esiste");
        }
    }

}
