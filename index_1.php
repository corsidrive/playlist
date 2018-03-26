<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * framework mvc
 * 
 * 1) esiste un controller per ogni funzionalita / pagina della mia applicazione
 * 2) tutti i controller vengono chiamati dalla pagina index (routing)
 * 3) parametro "controller" nome della classe svogera il ruolo del Controller
 * 4) parametro "action" che rappresetera il metodo del cotroller da chiamare
 *  
 * 
 */

 //index.php?controller=home
$controller = filter_input(INPUT_GET ,'controller');
$action = filter_input(INPUT_GET ,'action');

//var_dump($controller);

if($controller=='home'){
    
    require './controller/Home.php';
    new Home(); //controller della home

} 
//?controller=areariservata&action=profilo
if($controller=='areariservata'){
    
    require './controller/Areariservata.php';
    $areaRiservata = new Areariservata(); //controller della area riservata
    
    if($action=='profilo'){
        $areaRiservata->profilo();
    }
    // myvideo
    
    
}



