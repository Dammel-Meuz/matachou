@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4 text-center" style="background-color: #00ff5573"><strong>Articles</strong></h1>
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3 btn-center">Create New Article</a>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary mb-3 mx-2">Create New Category</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>

                            <td><img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" width="100"></td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->price }}</td>
                            <td>{{ $article->content }}</td>
                            <td>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline-block;" id="deleteForm{{$article->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
