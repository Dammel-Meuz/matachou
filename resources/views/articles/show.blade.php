@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>{{ $article->title }}</h1>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img src="{{ asset('images/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid">
            </div>
            <div class="mb-3">
                <strong>Category:</strong> {{ $article->category->name }}
            </div>
            <div class="mb-3">
                <strong>Price:</strong> {{ $article->price }} CFA 
            </div>
            <div class="mb-3">
                <strong>Description:</strong>
                <p>{{ $article->content }}</p>
            </div>
            <div class="mb-3">
                <strong>Created At:</strong> {{ $article->created_at->format('d M Y, H:i:s') }}
            </div>
            <a href="{{ route('articles.index') }}" class="btn btn-primary">Back to Articles</a>
        </div>
    </div>
</div>
@endsection
