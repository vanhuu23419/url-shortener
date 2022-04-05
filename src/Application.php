<?php
require getcwd() . '/src/model/ShortUrl.php';
require getcwd() . '/src/Shortener.php';

use Spatie\Url\Url;

class Application 
{
    public static function listen()
    {

        $uri = $_SERVER['REQUEST_URI'];
        $shortCode = explode('/', parse_url($uri)['path'])[2];
        $shortener = new Shortener();
        $model = new ShortUrl();

        if ($shortCode) {
            $id = $shortener->shortCodeToId($shortCode);
            $data = $model->getById($id);
            if ($data) {
                header('Location: '. $data['full_url']);
                exit;
            }
        }
        else {
            if (isset($_GET['url']) && !empty($_GET['url'])) {
                $id = time();
                $shortCode = $shortener->idToShortCode($id);
                $model->insert([
                    'id' => $id,
                    'shortcode' => $shortCode,
                    'full_url' => $_GET['url'],
                ]);

                $message = "Your short url is: localhost/url-shortener/{$shortCode}";
            }
            require getcwd() . '/templates/home.php';
        }
    }
}