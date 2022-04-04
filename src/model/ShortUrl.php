<?php
namespace App\Model;

use App\Database\AppConnection;

class ShortUrl 
{
    public function insert($data) {
    }

    public function update() {
    }

    public function getById($id) {
        $conn = AppConnection::getConnection();
        $queryBuilder = $conn->createQueryBuilder();
        return  $queryBuilder
                    ->select('*')
                    ->from('short_urls')
                    ->where('id = ?')
                    ->setParameter($id)
                    ->executeQuery()
                    ->fetchAssociative();
    }
}