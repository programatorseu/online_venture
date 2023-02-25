<?php 
namespace model;
use Core\App;
use Core\Database;

class Article {
    public static function getAll(): array 
    {
        $db = App::get('database');
        return $db->query('select a.id, a.title, a.body, a.creation_date, a.user_id, authors.name from articles a LEFT join authors on authors.id = a.user_id order by a.id DESC')->get('json');
    }   

    public static function get($id, $json = false)
    {
        $db = App::get('database');
        return $db->query('select a.id, a.title, a.body, a.creation_date, a.user_id, authors.name from articles a LEFT join authors on authors.id = a.user_id
         where a.id = :id', [
            'id' => $id])->findOrFail($json);
    }
    public static function create($array)
    {
        $db = App::get('database');
        $db->query('INSERT INTO articles (title, body, user_id, creation_date) VALUES(:title, :body, :user_id, :creation_date)', $array);
        return true;
    }

    public static function update($array)
    {
        $db = App::get('database');
        $db->query('UPDATE articles SET title = :title, body = :body, creation_date = :creation_date WHERE id = :id', $array);        
        return true;
    }
    public static function delete($array) 
    {
        $db = App::get('database');     
        $db->query('DELETE from articles where id = :id', $array);
     
    }
}