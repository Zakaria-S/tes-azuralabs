@extends('../layouts/app')
@section('title', 'Library - Manage categories')

@section('content')
<div class="d-lg-flex my-5">
    <h3 class="fw-bold">Categories List</h3>
    <div class="ms-auto d-sm-flex">
        <div class="col-auto">
            <a href="{{url('/category/add')}}" class="btn btn-dark p-2">Add Category</a>
        </div>
    </div>
</div>

<table class="table">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Number of Books</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{$loop->index + 1}}</td>
            <td>{{$category->category_name}}</td>
            <td>{{count($category->books)}}</td>
            <td>
                <a href="{{url('/category' . '/' . $category->id)}}" class="btn btn-dark">
                    Show
                </a>
                <a href="{{url('/category' . '/' . $category->id . '/edit')}}" class="btn btn-outline-dark">Edit</a>
                <form method="POST" action="{{url('/category' . '/' . $category->id)}}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-dark">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <div class="col-12">
            <div class="text-center p-4 mb-4 bg-light bg-gradient rounded-1">
                <h5>There is no data</h5>
            </div>
        </div>
        @endforelse
    </tbody>
</table>
@endsection