<?php 
namespace model;
use Core\App;

class Author {
    public static function getAll(): array 
    {
        $db = App::get('database');
        return $db->query('select * from authors')->get();
    }   

    public static function get($id)
    {
        $db = App::get('database');
        return $db->query('select * from articles inner join authors on authors.id = articles.user_id where articles.id = :id', [
            'id' => $id])->findOrFail();
    }
    public static function getTop3(): array 
    {
        $db = App::get('database');
     return $db->query('select authors.id, authors.name, authors.email, 
        count(*) nums
        from authors
        INNER JOIN articles 
        on articles.user_id = authors.id
        WHERE articles.creation_date BETWEEN (NOW() - INTERVAL 7 DAY) AND NOW()
        GROUP BY authors.id
        ORDER BY nums DESC
        LIMIT 3')->get();

    }

}