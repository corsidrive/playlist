<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelSQL
 *
 * @author tss
 */
class ModelSQL {
   /**
    * @var PDO
    */
    protected $pdo;
    
    public function __construct() {
        try {
            //mysql:host=$servername;dbname=$myDB
            //driver:
            //indirizzo del database
            // nome del database
            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);
            // imposta le eccezioni come metodo per gestire gli errori
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $exc) {
            echo "abbiamo un problema: ". $exc->getMessage();
            echo $exc->getCOde();
        }
    }
    
    public function closeConnection() {
         $this->pdo->close();
    }
}
