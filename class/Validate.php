<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formatter
 *
 * @author saras
 */
class Validate {

    public static function nameString($name) {

        $name = filter_var($name, FILTER_SANITIZE_STRING); //""
        $name = ucfirst(strtolower($name));
        
		//controlla la lunghezza della striinga
        if (strlen($name) != 0) {
            return $name; //'' 
        } else {
            return FALSE;
        }
    }
    
    public static function email($email) {
		
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            return FALSE;
        }
    }
    
    public static function url($url) {
        
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $url;
        } else {
            return FALSE; 
        };
       
    }

    public static function id($int) {
        return filter_var($int, FILTER_VALIDATE_INT);
    }
    
    public static function integer($int) {
        return filter_var($int, FILTER_VALIDATE_INT);
    }
    
    public static function date($date_string) {
       return  new DateTime($date_string);
    }
    
    public static function boolean($value) {
     return filter_var($value, FILTER_VALIDATE_BOOLEAN);
     
    }
    
    
    
    

}
