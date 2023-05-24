<?php

define('TEMPLATES_URL', __DIR__ . '/../templates/');

function incluirTemplate(string $nombre, bool $headerSinFoto = false){
    include TEMPLATES_URL . "$nombre.php";
   
    
}