@extends('../layouts.app')
@section('title', 'Library - Edit a book')

@section('content')
@error('book')
<div class="row">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@enderror
@if(session()->has('success'))
<div class="row">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif
<div class="row w-100 d-flex justify-content-center">
    <form method="POST" action="{{url('/book' . '/' . $book->id . '/edit')}}" enctype="multipart/form-data" class="mt-4 d-flex flex-column w-75 justify-content-center align-items-center">
        @csrf
        @method('put')
        <h4>Add new book</h4>
        <div class="w-100 mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title of the book" value="{{$book->title}}">
            @error('title')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="w-100 mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" name="author" class="form-control" placeholder="Author of the book" value="{{$book->author}}">
            @error('author')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="w-100 mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" name="publisher"" class="form-control" placeholder="Publisher of the book" value="{{$book->publisher}}">
            @error('publisher')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="row g-3 w-100 mb-3 align-items-center justify-content-between">
            <div class="col-auto">
                <label for="publicationDate" class="form-label">Publication Date</label>
                <input type="date" name="publication_date" class="form-control" value="{{$book->publication_date}}">
                @error('publication_date')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="col-auto">
                <label for="pagesNumber" class="form-label">Number of Pages</label>
                <input type="number" name="pages_number" class="form-control" value="{{$book->pages_number}}">
                @error('pages_number')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="w-100 mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category" id="" class="form-select">
                <option selected>Select book category</option>
                @foreach($categories as $category)
                <option value="{{$category->category_name}}" {{$category->category_name === $book->category->category_name ? "selected" : ""}}>
                    {{$category->category_name}}
                </option>
                @endforeach
            </select>
            @error('category')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="w-100 mb-3">
            <label for="image" class="form-label">Image of the book</label>
            <input id="imgInp" type="file" name="image" class="form-control">
            @error('image')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="w-100 mb-3">
            <img src="{{asset('storage/books/'.$book->image->name)}}" id="preview" class="img-thumbnail" alt="">
        </div>
        <div class="w-100">
            <button type="submit" class="btn btn-dark">Update book</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const imgInp = document.getElementById('imgInp');
    const preview = document.getElementById('preview');
    imgInp.onchange = e => {
        const [file] = imgInp.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>
@endpush
