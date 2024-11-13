@extends('layouts.app')

@section('content')
    <div class="container py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>{{ __("Welcome to your dashboard!") }}</p>
                    <p>{{ __("Click ") }}<a href="{{ route('articles.index') }}" class="text-blue-500 hover:underline"><strong><i><u>{{ __("here to continue to the articles") }}</a></stong></p>
                </div>
            </div>
        </div>
    </div>
@endsection
