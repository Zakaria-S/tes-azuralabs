@extends('../layouts/app')
@section('title', 'Library - Add Category')

@section('content')
@error('category')
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
    <form method="POST" action="{{url('/category/add')}}" class="mt-4 d-flex flex-column w-75 justify-content-center align-items-center">
        @csrf
        <h4>Add Category</h4>
        <div class="w-100 mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Name of the category">
            @error('category_name')
            <div class="form-text text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="w-100">
            <button type="submit" class="btn btn-dark">Add category</button>
        </div>
    </form>
</div>
@endsection