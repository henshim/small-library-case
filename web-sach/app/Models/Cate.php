<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    use HasFactory;
    public $timestamps = false;
    //protected $table = 'categories';

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
