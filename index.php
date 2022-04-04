<?php 

require_once __DIR__ . '/vendor/autoload.php';

// get route 
// check matches with regex
// handle request
$uri = $_SERVER['REQUEST_URI'];
        
$matches = null;
preg_match('', $uri, &$matches);
dd(preg_match);


