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

require_once './config.php';
require './vendor/autoload.php';

// index.php?controller=pagina&action=valore
$controller = filter_input(INPUT_GET, 'controller');
$action = filter_input(INPUT_GET, 'action');



if (!file_exists('./controller/' . $controller . '.php') || is_null($controller)) {
    $controller = DEFAULT_CONTROLLER;
}

$controller = ucfirst($controller); //home -> Home | home.php -> Home.php
require './controller/' . $controller . '.php';

// $c = new Home();

$c = new $controller();

if (!is_null($action) && method_exists($c, $action)) {

    $c->$action();
}
