@extends('layouts.app')
@section('title', 'Library - Find your favorite book')

@section('content')
@if(session()->has('success'))
<div class="row">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<div class="d-lg-flex my-5">
    <h3 class="fw-bold">Book List</h3>
    <div class="ms-auto d-sm-flex">
        <div class="col-auto">
            <a href="{{url('/book/add')}}" class="btn btn-dark p-2">Add Book</a>
            <a href="{{url('/category')}}" class="btn btn-dark p-2">Manage Categories</a>
        </div>
    </div>
    <form class="ms-auto d-sm-flex">
        <div class="col-auto me-3">
            <select class="form-select w-auto" name="category" id="statusSelect">
                <option selected>Select category</option>
                @foreach($categories as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto form-group">
            <input type="submit" class="btn btn-dark" value="Filter">
        </div>
    </form>
</div>
@if(request()->has('category'))
<h5 class="fw-bold">Category: {{request()->get('category')}}</h5>
@endif
<div class="row">
    @forelse($books as $book)
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
            <img src="{{asset('storage/books/'.$book->image->name)}}" class="card-img-top" alt="">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{$book->title}}</h5>
                <p class="card-text">Author: {{$book->author}}</p>
                <p class="card-text">Publisher: {{$book->publisher}}</p>
                <p class="card-text">Publication Date: {{$book->publication_date}}</p>
                <p class="card-text">Number of Pages: {{$book->pages_number}}</p>
                <p class="card-text">Category: {{$book->category->category_name}}</p>
            </div>
            <div class="card-footer d-flex flex-column align-items-center justify-content-center">
                <a href="{{url('/book' . '/' . $book->id)}}" class="btn btn-outline-dark w-100 shadow-0 mb-1">Show</a>
                <a href="{{url('/book' . '/' . $book->id . '/edit')}}" class="btn btn-dark w-100 shadow-0 mb-1">Edit</a>
                <form method="POST" class="w-100 mb-1" action="{{url('/book' . '/' . $book->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-dark w-100 shadow-0">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center p-4 mb-4 bg-light bg-gradient rounded-1">
            <h5>There is no book with that title or category</h5>
        </div>
    </div>
    @endforelse
</div>
@endsection