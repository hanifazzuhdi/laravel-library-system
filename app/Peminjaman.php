<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    public $table = "peminjaman";

    protected $guarded = ['id'];
}
