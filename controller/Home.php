<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *  
 * @author tss
 */
class Home { 
    private $twig ;
    public function __construct() {
       
        
        $loader = new Twig_Loader_Filesystem('./views');
        $this->twig = new Twig_Environment($loader);
        
        $this->index();
    }
   
    private function index(){
        
        // oggetto che rappersenta le informazioni della pagina
        $puivisti = new Playlist();
        $puivisti->setTitle('i più visti');
        
        $ultimi = new Playlist();
        $ultimi->setTitle('ultimi caricati');
        
        
        // chiamo il model che ha le informazioni
        $videoModel = new VideoSQLModel();
        
        $videoCollection = $videoModel->piuvisti();
        $videoCollectionUltimi = $videoModel->ultimiCaricati();
        
        
        
        $puivisti->setVideoCollection($videoCollection);
        $ultimi->setVideoCollection($videoCollectionUltimi);
        
        
        $data = array(
            'section' => 'home page',
            'site_name' => 'Playlist online',
            'home_playlist' => array(
                $puivisti,
                $ultimi
            )
            
        );
        echo $this->twig->render('home.twig',$data);
         
    }
    
}
