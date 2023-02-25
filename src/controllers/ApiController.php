<?php 
namespace DevPiotrek\Controllers;

use Core\Response;
use model\Article;
use model\Author;

class ApiController {

    public function process(string $method, ?string $id) {
        if($id == null) {
            switch($method) {
                case "GET" :
                    echo json_encode(Article::getAll());
                    break;
                case "POST":
                    $data = (array) json_decode(file_get_contents("php://input"), true);   
                    $errors = $this->validationError($data);
                    if(! empty($errors)) {
                        Response::respondUnprocessableEntity($errors);
                        return;
                    }
                    $article = Article::create([
                        'title' => $data['title'],
                        'body' => $data['body'],
                        'user_id' => 1,
                        'creation_date' => date("Y-m-d H:i")
                    ]);
                    if($article == true) {
                        Response::respondCreated(1);
                    }
                    break;
          
                case "DELETE" :
                        http_response_code(405);
                        header("Allow: GET, POST");
                        break;    

            }
        } else {
            $article = Article::get($id, true);
            if($article == false) {
                Response::respondNotFound($id);
            }
            switch($method) {
                case "GET": 
                    echo json_encode($article);
                    break;
                case "PATCH":
                    $data = (array) json_decode(file_get_contents("php://input"), true);
                    $errors = $this->validationError($data, false);  
                    if ( ! empty($errors)) {
                        Response::respondUnprocessableEntity($errors);
                        return;
                    }
                    Article::update([
                        'title' => $data['title'],
                        'body' => $data['body'],
                        'id' => $id,
                        'creation_date' => date("Y-m-d H:i")
                    ]);
                    echo json_encode(["message" => "Article updated"]);
                    break;  
                    case "DELETE": 
                        Article::delete(['id' => $id]);
                        echo json_encode(["message" => "Article deleted"]);
                        break;
            }
        }
    }

    public function authors() {
        return json_encode(Author::getTop3());
    }

    private function validationError(array $data, bool $is_new = true): array
    {
        $errors = [];
        if ($is_new && empty($data["title"])) {
            $errors[] = "Title is required";
        }
        if ($is_new && empty($data["body"])) {
            $errors[] = "Body is required";
        }
        return $errors;
    }


}