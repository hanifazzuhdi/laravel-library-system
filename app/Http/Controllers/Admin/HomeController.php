<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.admin.home');
    }

    public function author()
    {
        return view('pages.admin.authors', [
            'datas' => Author::orderBy('name', 'ASC')->paginate(10)
        ]);
    }
}
