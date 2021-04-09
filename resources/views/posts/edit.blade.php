@extends('layouts.app')

@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Edit Post</h1>

        <form method="POST" action="/edit/{{ $post->id }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label class="label" for="title">Title</label>

                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="{{ $post->title }}">
                </div>
            </div>
            
            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>

                <div class="control">
                    <textarea class="textarea" name="excerpt" id="excerpt">{{ $post->excerpt }}</textarea>
                </div>
            </div>
            
            <div class="field">
                <label class="label" for="body">Body</label>

                <div class="control">
                    <textarea class="textarea" name="body" id="body">{{ $post->body }}</textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                    <a class="button is-link" href="/">Back</a>
                </div>
            </div>
        
        </form>
    </div>
</div>
@endsection