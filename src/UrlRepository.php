<?php
namespace App;
use App\Database;
use DateTime;
use PDO;

class UrlRepository
{
    private $connection;

    //connect to the database
    public function __construct()
    {
        $this->connection = Database::getInstance()->connection();
    }

    //get the url row by the code but exclude expired 
    public function getByCode($code){
        $sql = "SELECT * FROM urls WHERE code = :code AND expires_at > :now";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['code' => $code, 'now' => date('Y-m-d H:i:s')]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //create the urls row. all urls will expire once over a year old
    public function create($post){
        $sql = "INSERT INTO urls (code, url, expires_at, created_at) VALUES (:code, :url, :expires_at, :created_at)";
        $stmt = $this->connection->prepare($sql);
        $expiresAt = new DateTime();
        $expiresAt->modify('+1 year');
        $expiresAt = $expiresAt->format('Y-m-d H:i:s');
        $stmt->execute(['code' => $post['code'], 'url' => $post['url'], 'expires_at' => $expiresAt, 'created_at' => date('Y-m-d H:i:s')]);
    }

    public function generateCode(){
        return substr(base64_encode(random_bytes(16)), 0, 4);
    }
}