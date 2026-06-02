<?php
namespace App;

class UrlRedirector{
    //fetch the url row with the code that has passed then redirect or if not found return the 404 page
    public function index($code){
        $urlRepo = new UrlRepository();
        $url = $urlRepo->getByCode($code);
        if($url){
            header('location: '.$url['url'], true, 302);
            return;
        }
        http_response_code(404);
        include('views/404.php');

    }

}