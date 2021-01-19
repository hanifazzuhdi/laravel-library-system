<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $datas = User::where('email', '!=', 'admin@gmail.com')->paginate(10);
        return view('pages.admin.users', compact('datas'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()
            ->with('success', 'Data Berhasil dihapus');
    }
}
