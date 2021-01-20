<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    public function index()
    {
        return view('pages.user.penulis', [
            'datas' => Author::with('books')->get()
        ]);
    }
}
