<?php
require_once getcwd() . './src/database/AppConnection.php';

class ShortUrl 
{
    public function insert($data) {
        $conn = AppConnection::getConnection();
        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->insert('short_url')
            ->values([
                'id' => '?',
                'shortcode' => '?',
                'full_url' => '?',
            ])
            ->setParameter(0, $data['id'])
            ->setParameter(1, $data['shortcode'])
            ->setParameter(2, $data['full_url'])
            ->executeQuery();
    }

    public function getById($id) {
        $conn = AppConnection::getConnection();
        $queryBuilder = $conn->createQueryBuilder();
        return  $queryBuilder
                    ->select('*')
                    ->from('short_url')
                    ->where('id = ?')
                    ->setParameter(0, $id)
                    ->executeQuery()
                    ->fetchAssociative();
    }
}