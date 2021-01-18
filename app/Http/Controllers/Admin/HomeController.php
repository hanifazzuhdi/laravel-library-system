<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.admin.home');
    }

    public function author()
    {
        return view('pages.authors', [
            'datas' => Author::get()
        ]);
    }
}
