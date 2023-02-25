<?php 
namespace DevPiotrek\Controllers;
class PageController 
{
    public function index()
    {
        return view('index.view.php', []);
    }
}