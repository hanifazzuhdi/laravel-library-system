<?php

namespace App\Http\Controllers\Admin;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected function validated(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required'
        ]);

        return $data;
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        Author::create($data);

        return back()
            ->with('success', 'data berhasil ditambahkan');
    }

    public function show(Author $author)
    {
        json_decode($author);

        return $author;
    }

    public function update(Request $request, Author $author)
    {
        $data = $this->validated($request);

        $author->update($data);

        return back()
            ->with('success', 'data berhasil diubah');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return back()
            ->with('success', 'data berhasil dihapus');
    }
}
