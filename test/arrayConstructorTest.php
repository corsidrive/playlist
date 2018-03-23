<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../class/Importer.php';
include '../class/Video.php';
//include '../dataset/playlist_video.json';
$playlist_video = Importer::json2array('../dataset/playlist_video.json');
$video_array = $playlist_video[0];


$video_array = 
[
    'id' => 1,
    'autore' => 252,
    
    'titolo' => '',
    'video_url' => 'http://dummyimage.com/300x250.png/ff4444/ffffff',
    'visualizzazioni' => 1959
];


$video = new Video($video_array);
$video->setData($video_array);
//print_r($video_array);