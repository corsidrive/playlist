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
class PlaylistSQLModel  extends ModelSQL
{
    
    public function __construct() {
        //connessione;
        parent::__construct('Playlist');
       
    }
    
    
       
}