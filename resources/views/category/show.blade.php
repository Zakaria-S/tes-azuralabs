@extends('../layouts/app')
@section('title', 'Library - Show Category')

@section('content')
<div class="row">
    <h4 class="fw-bold">Category Name: {{$category->category_name}}</h4>
    <h5 class="fw-bold d-flex justify-content-center align-items-center mb-4">Books in this Category</h5>
    @forelse($category->books as $book)
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class="card w-100 my-2 shadow-2-strong">
            <img src="{{asset('storage/books/'.$book->image->name)}}" class="card-img-top" alt="">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{$book->title}}</h5>
                <p class="card-text">Author: {{$book->author}}</p>
                <p class="card-text">Publisher: {{$book->publisher}}</p>
                <p class="card-text">Publication Date: {{$book->publication_date}}</p>
                <p class="card-text">Number of Pages: {{$book->pages_number}}</p>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="text-center p-4 mb-4 bg-light bg-gradient rounded-1">
            <h5>There is no book in this category</h5>
        </div>
    </div>
    @endforelse
</div>
@endsection