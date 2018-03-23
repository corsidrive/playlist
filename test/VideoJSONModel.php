<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../class/Video.php';
include_once '../class/Importer.php';
include_once '../model/VideoJSONModel.php';


$file =  '../dataset/playlist_video.json';
$model = new VideoJSONModel($file);

