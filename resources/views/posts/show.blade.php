@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title">{{ $post->title }}</h3>
        <p>{{ $post->body }}</p>
        <a class="button is-link mt-3" href="/">Back</a>

        <div>
            <div class="subtitle is-5 mt-5">Kommentaarid</div>
            @foreach ($post->comments as $comment)
                <div class="is-flex">
                    <div class="box is-flex column">
                        <span class="column">
                            {{ $comment->body }}
                        </span>
                        <span class="column is-2">
                            {{ $comment->created_at }}
                        </span>
                    </div>
                    <div class="column is-1">
                        @auth
                            <form method="POST" action="/deletecomment/{{ $comment->id }}/{{ $post->id }}">
                                @method('DELETE')
                                @csrf
                                <input class="button is-danger" type="submit" value="Delete" />
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>

        <form method="POST" action="/{{ $post->id }}">
            @csrf

            <div class="field">
                <label class="label mt-3" for="body">New Comment</label>

                <div class="control">
                    <textarea 
                        class="textarea @error('body') is-danger @enderror" 
                        name="body" 
                        id="body"
                        value="{{ old('body') }}"></textarea>
                    
                    @error('body')
                        <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror
                </div>
                <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection