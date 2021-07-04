<?php
    global $baseUrl;
    $pathInPieces = explode('/', $_SERVER['SCRIPT_NAME']);
    $baseUrl= 'https://'.$_SERVER["HTTP_HOST"] . '/'.$pathInPieces[1];
?>