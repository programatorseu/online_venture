<?php 
namespace DevPiotrek\Controllers;

use model\Article;
use model\Author;

class AuthorsController 
{
    public function index()
    {
        $authors = Author::getTop3();
        view("authors/index.view.php", [
            'heading' => 'All Authors',
            'authors' => $authors,
            'errors' => []
        ]);
    }
}