<?php 

use \Doctrine\DBAL\DriverManager;

$connectionParams = [
    'dbname' => 'url_shortener',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'port' => '3306',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);


