<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../class/Importer.php';

$filename = '../dataset/errato.json';

try {
    $array = Importer::json2array($filename);
    print_r($array);
  
    //codice 
    
} catch (Exception $pippo) {
    echo $pippo->getMessage()."<br>";
//    echo "linea: ".$exc->getLine()."<br>";
//    echo "file: ".$exc->getFile()."<br>";
 //   echo $exc->getTraceAsString();
}







//$test = boolval(isset($array[0]['id']));
//
//var_dump($test);