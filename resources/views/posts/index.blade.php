@extends('layouts.app')


@section('content')
<div class="wrapper">
    <ul class="container">
        @foreach ($posts as $post)
            <li class="m-5">
                <a class="title is-3" href="{{ $post->path() }}">{{ $post->title }}</a>
                <p class="subtitle is-5 m-3">{{ $post->excerpt }}</p>
                @auth
                <form method="POST" action="/delete/{{ $post->id }}">
                    @method('DELETE')
                    @csrf
                    <a class="button is-link" href="/edit/{{ $post->id }}">Edit</a>
                    <input class="button is-danger" type="submit" value="Delete" />
                </form>
                @endauth
            </li>
        @endforeach
    </ul>
</div>

@endsection