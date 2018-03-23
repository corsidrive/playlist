<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../../config.php';
include '../../model/ModelSQL.php';
include '../../model/VideoSQLModel.php';
include '../../class/Video.php';
//include '../../model/ModelSQL.php';

try{
    
$videoModel = new VideoSQLModel();
$video = array(
           
            'id_autore' => 16,
            'durata' => 1667,
            'titolo' => 'creato adesso adesso',
            'video_url' => 'http://dummyimage.com/300x250.png/ff4444/ffffff',
            'visualizzazioni' => 91
        );
        
$video = new Video($video);
print_r($video);
 
/* $video->setTitolo('Sono un nuovo titolo'); */
$id = intval($videoModel->create($video));
var_dump($id);
$res = $videoModel->read($id);
print_r($res);
} catch (PDOException $exc){
    echo $videoModel->getLastQuery();
    echo $exc->getMessage(); 
}



//$stmt->fetchAll(PDO::FETCH_ASSOC)