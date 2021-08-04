<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Cate;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::query()->select('books.id', 'books.name', 'books.img', 'books.price', 'books.description', 'authors.name as authorName', 'cates.name as cateName')
            ->join('cates', 'cates.id', '=', 'books.cate_id')
            ->join('authors', 'authors.id', '=', 'books.author_id')
            ->orderByDesc('books.id')->get();
//        dd($books);
        return view('book.list', compact('books'));
    }

    public function add()
    {
        $cates = Cate::all();
        $authors = Author::all();
        return view('book.add', compact('cates', 'authors'));
    }

    public function store(Request $request)
    {
        $path = $request->file('img')->store('images', 'public');
        $name = $request->name;
        $price = $request->price;
        $cate = $request->cate;
        $author = $request->author;
        $description = $request->description;
        $insert = ['description' => $description, 'img' => $path, 'name' => $name, 'price' => $price, 'cate_id' => $cate, 'author_id' => $author];
        Book::query()->insert($insert);
        toastr()->success('Add success new book');
        return redirect()->route('book.list');
    }

    public function update($id)
    {
        $book = Book::query()->findOrFail($id);
//        dd($book);
        $cates = Cate::all();
        $authors = Author::all();
        return view('book.update', compact('book', 'authors', 'cates'));
    }

    public function edit(Request $request)
    {
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('images', 'public');
            $id = $request->id;
            $name = $request->name;
            $price = $request->price;
            $cate = $request->cate;
            $author = $request->author;
            $description = $request->description;
            $update = ['description' => $description, 'img' => $path, 'name' => $name, 'price' => $price, 'cate_id' => $cate, 'author_id' => $author];
            Book::query()->where('id', $id)->update($update);
            toastr()->success('update book successful');
            return redirect()->route('book.list');
        } else {
            $id = $request->id;
            $name = $request->name;
            $price = $request->price;
            $cate = $request->cate;
            $author = $request->author;
            $description = $request->description;
            $update = ['description' => $description, 'name' => $name, 'price' => $price, 'cate_id' => $cate, 'author_id' => $author];
            Book::query()->where('id', $id)->update($update);
            toastr()->success('update book successful');
            return redirect()->route('book.list');
        }
    }

    public function delete($id)
    {
        Book::query()->where('id', $id)->delete();
        toastr()->success('delete book successful');
        return redirect()->route('book.list');
    }
}
