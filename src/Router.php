<?php

namespace App;

class Router{

    public function execute(){
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        $path = parse_url($uri, PHP_URL_PATH) ?: '/';

        //normalise the path remove the trailing slash
        
        //end points
        //home
        if($method === 'GET' && $path === '/'){
            $shortener = new UrlShortener();
            $shortener->index();
            return;
        }
        //create the short url
        if($method === 'POST' && $path === '/'){
            $code = trim($path, '/');
            $shortener = new UrlShortener();
            $shortener->store();
            return;
        }

        //get the short url and redirect
        if($method === 'GET' && preg_match('#^/([A-Za-z0-9_-]+)$#', $path, $matches)){
            $code = $matches[1];
            $redirector = new UrlRedirector();
            $redirector->index($code);
            return;
        }

        include('views/404.php');
    }


}