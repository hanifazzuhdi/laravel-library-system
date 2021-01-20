<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public $table = "peminjaman";

    public $dates = ['returned_at'];

    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
