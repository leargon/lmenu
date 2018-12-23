<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use BC\Laravel\DropboxDriver;

class DropController extends Controller
{
     public function index()
    {
        $menu = 'Тесты епт';
        Storage::disk('dropbox')->put('file.txt', 'Hello laravel ');
        return $menu;
    }
}
