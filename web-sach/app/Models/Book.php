<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'books';

    public function cate()
    {
        return $this->belongsTo(Cate::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
