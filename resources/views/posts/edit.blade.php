@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<h1>Edit Artikel</h1>

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Judul Artikel</label>
        <input 
            type="text" 
            id="title" 
            name="title" 
            value="{{ old('title', $post->title) }}" 
            required
        >
    </div>

    <br>

    <div>
        <label for="content">Isi Artikel</label>
        <textarea 
            id="content" 
            name="content" 
            rows="8" 
            required
        >{{ old('content', $post->content) }}</textarea>
    </div>

    <br>

    <fieldset>
        <legend>Pilih Kategori Artikel</legend>

        @forelse ($categories as $category)
            <label>
                <input 
                    type="checkbox" 
                    name="categories[]" 
                    value="{{ $category->id }}"
                    @checked(
                        in_array(
                            $category->id,
                            old('categories', $selectedCategories)
                        )
                    )
                >
                {{ $category->name }}
            </label>
            <br>
        @empty
            <p>Belum ada kategori yang tersedia.</p>
        @endforelse
    </fieldset>

    <br>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('posts.show', $post) }}">Batal</a>
</form>
@endsection

