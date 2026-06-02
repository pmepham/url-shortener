<?php
namespace App;

class UrlShortener{

    public function index(){
        include('views/home.php');
    }

    //POST
    //store the url entry into athe sqlite urls table
    public function store(){
        //check the data does it contain a valid url?
        $response = $this->validate($_POST);
        if($response['valid']){
            //show the new link nice and big
            $urlRepo = new UrlRepository();
            $code = $urlRepo->generateCode();
            //highly unlikely to clash but lets loop until we dont clash or we hit 5 tries
            for($i = 0; $urlRepo->getByCode($code) && $i < 5; $i++){
                $code = $urlRepo->generateCode();
            }
            $data = ['code' => $code, 'url' => $_POST['url']];

            $urlRepo->create($data);
            include('views/url.php');
        }else{
            //show the error on the form
            $errors = $response['errors'];
            include('views/home.php');
        }
    }
    
    //validates field within the post params assoc array
    private function validate($post){
        $errors = [];
        //is it empty
        if(empty($post['url'])){
            $errors['url'] = 'Please provide a URL to shorten';
        }

        //is it a valid url
        if(filter_var($post['url'], FILTER_VALIDATE_URL) === false && !empty($post['url'])){
            $errors['url'] = 'Please provide a valid URL to shorten';
        }

        if(empty($errors)){
            return ['valid' => true];
        }

        return ['valid' => false, 'errors' => $errors];
    }



}
