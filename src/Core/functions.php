<?php 
 // odpowiednik dd z frameworkow np laravel
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}
function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    exit;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $data)
{
    extract($data);
    require base_path('views/' . $path);
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}
function output($text)
{
    return htmlspecialchars($text);
}

// FOR API  helper functions
function handleException(\Throwable $exception): void  {
    echo json_encode([
        "code" => $exception->getCode(),
        "message" => $exception->getMessage(),
        "file" => $exception->getFile(),
        "line" => $exception->getLine(),
    ]);
}

function handleError(
    int $errno,
    string $errstr,
    string $errfile,
    int $errline): void
{
    throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
}