@extends('layout.master')
@section('title','book list')
@section('content')
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
