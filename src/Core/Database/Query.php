<?php 
namespace Core\Database;

class Query
{
    protected $pdo;
    protected $stmt;
    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }


    public function query($query, $params = [])
    {
        $this->stmt = $this->pdo->prepare($query);

        $this->stmt->execute($params);

        return $this;
    }

    public function get($json = false)
    {
        return $this->stmt->fetchAll();
        // if($json) {
        //     $data = [];
        //     $articles = $this->stmt->fetchAll();
        //     foreach($articles as $article) {
        //         $data[] = $article;
        //     }
        //     return $data;
        // } else {
        //     $this->stmt->fetchAll();
        // }
    } 
    public function find()
    {
        return $this->stmt->fetch();
    }

    public function findOrFail($json = false)
    {
        $result = $this->find();

        if (!$result && $json === false) {
            abort();
        } else if(! $result && $json === true) {
            return false;
        }

        return $result;
    }
}