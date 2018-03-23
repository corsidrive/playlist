<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoSQLModel
 *
 * @author tss
 */
class VideoSQLModel  extends ModelSQL
{
    
    public function __construct() {
        //connessione;
        parent::__construct();
    }
    
    public function create() {
        
      //...
        
    }
    
    public function read($id_video = false) {
        
        // 1. scrivere la query 
        // 2. quali sono i valori che devo passare al metodo per comporre la query
        $sql = "SELECT
                    v.titolo,
                    v.id_autore,
                    v.durata,
                    v.video_url,
                    v.visualizzazioni,
                    a.nome,
                    a.cognome

                    FROM video as v 
                    JOIN autore as a 
                    ON v.id_autore = a.id";
        
        
        
        if($id_video){
            $sql = $sql."WHERE v.id = :id_video;";
        }
        
        $stmt = $this->pdo->prepare($sql);
        
        if($id_video){
            
        // 3.impostare i parametri della query    
            
             $stmt->bindParam(':id_video', $id_video,PDO::PARAM_INT); 
        }
      
        
        $stmt->execute();
        
        $resultset = $stmt->fetchAll();
        
        
        return $resultset;
    }
    
    public function update(Video $video) {
        
        $sql = "UPDATE video (Video 
                    SET 
                           `id_autore` = :id_autore, 
                           `durata` = :durata, 
                           `titolo` = :titolo, 
                           `video_url` = :video_url, 
                           `visualizzazioni` = :visualizzazioni
                           
                     WHERE `video`.`id` = :video_id";
           
        
        
        $stmt->bindParam(':id_autore',$video->getId() ,PDO::PARAM_INT); 
        $stmt->bindParam(':durata', $video->getDurata(),PDO::PARAM_INT); 
        $stmt->bindParam(':titolo', $id_video,PDO::S); 
        $stmt->bindParam(':id_video', $id_video,PDO::PARAM_INT); 
        $stmt->bindParam(':video_url', $id_video,PDO::PARAM_INT); 
        $stmt->bindParam(':video_id', $id_video,PDO::PARAM_INT); 
          
    }
    
    public function delete() {
        
    }
    //put your code here
}
