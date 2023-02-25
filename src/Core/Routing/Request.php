<?php

namespace Core\Routing;

use Core\Api\ErrorHandler;
use DevPiotrek\Controllers\Api\ArticlesController;
use DevPiotrek\Controllers\ApiController;

class Request {

    public static function uri()
    {
        $path =  parse_url($_SERVER['REQUEST_URI'])['path'];
        if(! str_contains($path, "api")) {
          return $path;
        } else {
            set_error_handler('handleError');
            set_exception_handler('handleException');
            $path = ltrim($path, '/');
            $parts = explode('/', $path);

            $resource = $parts[1];
            $id = $parts[2] ?? null;
            // if($resource != "articles") {
            //     http_response_code(404);
            //     exit;
            // }
        
            $controller = new ApiController;
            $controller->process(self::method(), $id);
            exit;

        }
        // dd($path);
    }
    public static function method()
    {
        return $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
    }


}

