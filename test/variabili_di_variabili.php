<?php

$nome = "roberto";

$$nome = "qualcosa"; // $roberto



echo $roberto."<br>";
echo $$nome;


class Auto {

    public $colore = "rosso";
    
    function __construct() {
        
    }
    public function avanti() {
        echo "<br>sono il metodo avanti";
    }
}

$auto = new Auto();

echo $auto->colore."<br>"; //rosso

$proprieta = "colore";
$metodo = "avanti";
echo $auto->$proprieta."<br>" ; // $auto->colore
echo $auto->$metodo() ; // $auto->avanti()