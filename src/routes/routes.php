<?php
$router->get('/', 'PageController@index');
$router->get('/articles', 'ArticlesController@index');
$router->get('/article', 'ArticlesController@show');


$router->get('/articles/create', 'ArticlesController@create');

$router->post('/articles/store', 'ArticlesController@store');
$router->get('/article/edit', 'ArticlesController@edit');
$router->patch('/article', 'ArticlesController@update');
$router->delete('/articles', 'ArticlesController@destroy');

$router->get('/authors/top-3', 'AuthorsController@index');

/** simple redirect */
$router->get('/api/articles', 'ApiController@process');
$router->get('/api/authors/top', 'ApiController@authors');