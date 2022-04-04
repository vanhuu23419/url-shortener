<?php 
class Shortener {
    
    private $base62;
    
    public function __construct() {
        $this->base62 = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
    }
    
    // Function to generate a short url from integer ID
    public function idToShortURL(int $id): string {
        // Map to store 62 possible characters
        $shorturl = '';
        // Convert given integer id to a base 62 number
        while ($id > 0)
        {
            // use above map to store actual character
            // in short url
            $shorturl = $this->base62[$id % 62] . $shorturl;
            $id = floor($id/62);
        }
    
        // Reverse shortURL to complete base conversion
        return $shorturl;
    }

    public function shortUrlToId(string $shortUrl): int {
        $id = 0;
        for($i = 0, $len = strlen($shortUrl); $i < $len; ++$i) {
            $index = array_search($shortUrl[$i], $this->base62);
            $id = $id * 62 + $index;
        }
        return $id;
    }
}
