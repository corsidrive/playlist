<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoJSONModel
 *
 * @author tss
 */
class VideoJSONModel {
    private $file;
    private $datajson;
    private $dataset = array();
    
    public function __construct($file) {
       $this->file = $file;
       $this->datajson = Importer::json2array($file);
       
       $this->createList();
 
    }

    private function createList(){
        $this->dataset = array();
        foreach ($this->datajson as  $video) {
            //aggiunco oggetti video 
            $this->dataset[] = new Video($video);
        }
       // print_r($this->dataset);
    }
    
    public function getDataset() {
        return $this->dataset;
    }
}
