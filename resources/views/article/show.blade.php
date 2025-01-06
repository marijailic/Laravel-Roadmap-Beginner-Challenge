@extends('layouts.page')

@section('content')
    <div class="w-full px-4 py-10">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$article->title}}</h2>
        <p class="mt-4 text-gray-500">{{$article->body}}</p>

        <br><br>
        <p>Category: {{ $article->category->name }}</p>
        <p>User: {{ $article->user->name }}</p>
    </div>
@endsection
