@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')



<h1>Daftar Artikel</h1>

@auth
    <p>
        <a href="{{ route('posts.create') }}">Buat Artikel Baru</a>
    </p>
@endauth

@forelse ($posts as $post)
    <article>
        <h2>
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->title }}
            </a>
        </h2>

        <p>
            Penulis:
            {{ $post->user?->name ?? 'Penulis tidak tersedia' }}
        </p>

        <p>
            Kategori:
            @forelse ($post->categories as $category)
                {{ $category->name }}@unless ($loop->last), @endunless
            @empty
                Belum ada kategori
            @endforelse
        </p>

        <p>
            {{ \Illuminate\Support\Str::limit($post->content, 150) }}
        </p>

        <a href="{{ route('posts.show', $post) }}">
            Baca selengkapnya
        </a>
    </article>

    <hr>
@empty
    <p>Belum ada artikel.</p>
@endforelse

{{ $posts->links() }}
@endsection
