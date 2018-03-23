<!DOCTYPE html>
<html lang="en">
<head>
  <title>test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container">
    
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include "../config.php";
include "../class/Video.php";
include "../class/Validate.php";



$video = new Video(); //genererà solo un'istanza vuota


    
    $video_url_test = array(
        array('video_url','ciccio',DEFAULT_VIDEO_URL),
        array('video_url','http://www.miosito.it','http://www.miosito.it'),
        array('video_url','',DEFAULT_VIDEO_URL),
        array('video_url',100,DEFAULT_VIDEO_URL),
        array('durata',120,"02:00"),
        array('id',1,1),
        array('id',"1",1),
        array('id',"1",1),
        array('visualizzazioni',"1",1),
        array('visualizzazioni',"casa",1),
    );
    
//try {
//    
//} catch (Exception $exc) {
//    echo $exc->getMessage();
//}


foreach ($video_url_test as $v) {
    $controllo = $v[0];
    $imposto = $v[1];
    $aspetto = $v[2];
    
    $video->setVideo_url($video_url);
    $method = ucfirst($controllo); 
    
    
    $video->{"set".$method}($imposto);
    
   // $video->getVideo_url();
    $risultato = $video->{"get$method"}() == $aspetto ? "success": "danger";
    
    echo "<div class='text-$risultato'><b>$controllo</b> $imposto </div>";
   
}

?>

 </div>



</body>
</html>