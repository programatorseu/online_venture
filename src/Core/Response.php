<?php 

namespace Core;

class Response
{
    const CREATED = 201;
    const NOT_FOUND = 404;
    const FORBIDDEN = 403;
    const NOT_PROCESS = 422;

    
    public static function respondNotFound(string $id): void 
    {
        http_response_code(404);
        echo json_encode(["message"=>"Article with ID $id not found"]);
    }
    public static function respondUnprocessableEntity(array $errors): void
    {
        http_response_code(422);
        echo json_encode(["errors" => $errors]);
    }

    public static function respondCreated(): void
    {
        http_response_code(201);
        echo json_encode(["message" => "Article created"]);
    }
}
