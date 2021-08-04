<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->select('books.id', 'books.name', 'books.img', 'books.price', 'books.description', 'authors.name as authorName', 'cates.name as cateName')
            ->join('cates', 'cates.id', '=', 'books.cate_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->orderByDesc('books.id');
        return view('book.list',compact('books'));
    }
}
