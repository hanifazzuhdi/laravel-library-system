<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Peminjaman extends Model
{
    public $table = "peminjaman";

    public $dates = ['returned_at'];

    protected $fillable = ['user_id', 'book_id', 'is_returned', 'returned_at'];

    public function scopeUserPinjam()
    {
        return $this->where('user_id', Auth::id())->where('is_returned', 0);
    }

    public function scopeUser()
    {
        return $this->where('user_id', Auth::id());
    }

    public function scopeBelumKembali()
    {
        return $this->where('is_returned', 0);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
