<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../config.php';
include '../model/ModelSQL.php';
include '../model/VideoSQLModel.php';

$videoModel = new VideoSQLModel();
$res = $videoModel->read();

print_r($res);