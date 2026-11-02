@extends('layouts.app')

@section('title', 'Daftar Blog')

@section('content')

    <h2>Daftar Blog</h2>

    @foreach ($posts as $post)
        <article>
            <h3>{{ $post->title }}</h3>

            <p>{{ $post->content }}</p>

            <small>
                Ditulis oleh {{ $post->author }}
            </small>

            <br>

            <a href="/blog/{{ $post->id }}">
                Lihat Detail
            </a>
        </article>

        <hr>
    @endforeach

@endsection