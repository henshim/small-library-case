@extends('layout.master')
@section('title','book list')
@section('content')

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <a href="{{route('book.add') }}" class="btn btn-success">Add book</a>
    <table class="table table-hover">
        @forelse($books as $book)
            <thead>
            {{--            <tr>--}}
            {{--                <th>Image</th>--}}
            {{--                <th>Name</th>--}}
            {{--                <th>Price</th>--}}
            {{--                <th>Category</th>--}}
            {{--                <th>Author</th>--}}
            {{--            </tr>--}}
            {{--            </thead>--}}
            <tbody class="">
            <tr id="book-{{ $book->id }}">
                <th scope="col"><img width="100" src="{{asset("storage/$book->img") }}" alt="{{ $book->img }}"></th>
                <th scope="col">{{ $book->name }}</th>
                <td scope="col">
                    {{number_format($book->price) }} VND<br>
                    {{--                </td>--}}
                    {{--                <td>--}}
                    Category:{{ $book->cateName }}<br>
                    {{--                </td>--}}
                    {{--                <td>--}}
                    Author: {{ $book->authorName }}
                </td>
                <td scope="col">
                    <a href="{{ route('book.update',$book->id) }}" class="btn btn-warning">Update</a>
                    <a href="{{ route('book.delete',$book->id) }}" data-id="{{ $book->id }}"
                       class="delete btn btn-danger">Delete</a>
                </td>
            </tr>
            </tbody>
        @empty
            <div>
                No Book
            </div>
        @endforelse
    </table>
@endsection
