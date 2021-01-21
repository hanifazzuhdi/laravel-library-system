<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public $table = "peminjaman";

    public $dates = ['returned_at'];

    protected $fillable = ['user_id', 'book_id', 'is_returned', 'returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
