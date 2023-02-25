<?php 

namespace DevPiotrek\Controllers;
use Core\App;
use Core\Database;
use Core\Validator;
use model\Article;
use model\Author;

class ArticlesController {
    public function index()
    {
        $articles =  Article::getAll();

        view("articles/index.view.php", [
            'heading' => 'All Articles',
            'articles' => $articles,
            'errors' => []
        ]);
    }
    public function show()
    {

        $article = Article::get($_GET['id']);        
        view("articles/show.view.php", [
            'heading' => 'All Articles',
            'article' => $article,
            'errors' => []
        ]);
    }
    public function create()
    {
        view("articles/create.view.php", [

            'heading' => 'Create Note',
            'authors' => Author::getAll(),
            'errors' => []
        ]);
    
    }
    
    public function store()
    {
        Article::create([
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'user_id' => $_POST['author'],
            'creation_date' => date("Y-m-d H:i")
        ]);
        header("Location: /articles");
    }

    public function edit()
    {
        $article = Article::get($_GET['id']);        
        if($article == false ) {
            abort(404);
        }
        view("articles/edit.view.php", [
            'heading' => 'Edit Note',
            'article' => $article,
            'errors' => []
        ]);
    }
    public function update()
    {
        $article = Article::get($_POST['id']);      
        $errors = [];
        if(! Validator::string($_POST['body'], 1, 1000)) {
            $errors['body'] = 'A body of no more than 1,000 characters is required.';
        }
        if(count($errors)) {
            return view('articles/edit.view.php', [
                'heading' => 'Edit Note',
                'errors' => $errors,
                'article' => $article
            ]);
        }
        Article::update([
            'title' => $_POST['title'],
            'body' => $_POST['body'],
            'id' => $_POST['id'],
            'creation_date' => date("Y-m-d H:i")
        ]);
        header("Location: /articles");
    }

    public function destroy() 
    {
        Article::delete(['id' => $_POST['id']]);
        header("Location: /articles");
    }

}

    
    