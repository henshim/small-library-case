@extends('layout.master')
@section('title','add new book')
@section('content')
    <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Book Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" name="price">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select class="form-control" name="cate">
                @foreach($cates as $cate)
                    <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Author</label>
            <select class="form-control" name="author">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="img">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('book.list') }}" class="btn btn-secondary">Back</a>
    </form>
@endsection
