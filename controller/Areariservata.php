<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Areariservata
 *
 * @author tss
 */

// ?controller=areariservata&action=profilo
class Areariservata {
    public function __construct() {
        echo "<h1>Area Riservata</h1>";
    }
    
    public function profilo() {
        echo "<h2>profilo utente</h2>";
    }
    
    public function myvideo() {
        echo "<h2>I tuoi video</h2>";
    }
}
