@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
    <div class="row">
        <div class="col s12">
            <h1 class="mb-4 text-center" style="background-color: #00ff5573"><strong>LIST OF CATEGORIES</strong></h1>
            <hr class="mb-3">
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 btn-center">Create New Category</a>
                <a href="{{ route('articles.create') }}" class="btn btn-secondary mb-3 btn-center mx-2 ">Create New Article</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" width="100"></td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
