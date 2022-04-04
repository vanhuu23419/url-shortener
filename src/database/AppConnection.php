<?php
namespace App\Database;

use \Doctrine\DBAL\DriverManager;

class AppConnection 
{
    public static function getConnection() {
        static $conn = null;
        if (isset($conn)) {
            $connectionParams = [
                'dbname' => 'url_shortener',
                'user' => 'root',
                'password' => '',
                'host' => 'localhost',
                'port' => '3306',
                'driver' => 'pdo_mysql',
            ];
            $conn = DriverManager::getConnection($connectionParams);
        }

        return $conn;
    }
}

