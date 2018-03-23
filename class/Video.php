<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Video
 *
 * @author tss
 */
class Video {

    private $id;
    private $titolo ;
    private $id_autore;
    private $durata = 0;
    private $video_url;
    private $visualizzazioni;

    function __construct($data) {
        $this->setData($data);
    }

    
    public function getId_autore() {
        return $this->id_autore;
    }

    public function setId_autore($id_autore) {
        if(is_int($id_autore)){
             $this->id_autore = $id_autore;
        }else{
            $this->id_autore = "ccccc";
        }
       
    }

        public function setData($data) {
		
        //elenco proprieta della classe (video)
        $properties = get_object_vars($this);
       // echo "data";
      // print_r($data);
        
        foreach ($properties  as $proprety => $value) {
            
           //echo "$proprety ".$data[$proprety]."\n";
           //var_dump(boolval($data[$proprety])) ;
         // echo "-----------------------------------------\n";	
			
            if (isset($data[$proprety])) {
				
                $method = "set" . ucfirst($proprety);
                $this->$method($data[$proprety]);
				
            } else {
                //throw new Exception("$proprety non e definito");
            };
   
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {

        if(!empty($id) && !is_int($id)){
            throw new Exception('id deve essere un intero') ; 
        }else{
           
                $this->id = $id;
           
        }
        
    }

    
    
    public function getAutore() {
        return $this->autore;
    }

    public function setAutore($autore) {
        //Validate::name($name)
        if(is_int($autore)){
          $this->autore = $autore;
        }else{
          $this->autore = false;
        }
    }

    public function getVisualizzazioni() {
        return $this->visualizzazioni;
    }

    public function setVisualizzazioni($visualizzazioni) {
        $this->visualizzazioni = $visualizzazioni;
    }

    
    
    public function getTitolo() {
        
        return $this->titolo;
    }

    public function setTitolo($titolo) {
        $this->titolo = $titolo;
    }

    public function getDurata() {
        $durata = gmdate("i:s", $this->durata); // i -> 00 , s -> 00 00:00
        return $durata;
    }

    public function setDurata($durata) {

        if (isset($durata) && is_numeric($durata)) {
            $this->durata = $durata;
        }
    }

    public function getVideo_url() {
        return $this->video_url;
    }

    public function setVideo_url($video_url) {

        if (filter_var($video_url, FILTER_VALIDATE_URL)) {
            $this->video_url = $video_url;
        } else {
            $this->video_url = DEFAULT_VIDEO_URL;
            //die("indirizzo del video non e valido");
        };
    }

}
