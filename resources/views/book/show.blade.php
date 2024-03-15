@extends('../layouts/app')
@section('title', 'Library - Show Book')

@section('content')
<div class="row">
    <h5 class="fw-bold d-flex justify-content-center align-items-center mb-4">Books information</h5>
    <div class="col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center align-items-center">
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
        </div>
    </div>
</div>
@endsection