@extends('layouts.app')

@section('title', 'Buat Artikel')

@section('content')
<h1>Buat Artikel Baru</h1>

<form action="{{ route('posts.store') }}" method="POST">
    @csrf

    <div>
        <label for="title">Judul Artikel</label>
        <input 
            type="text" 
            id="title" 
            name="title" 
            value="{{ old('title') }}" 
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
        >{{ old('content') }}</textarea>
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
                            old('categories', [])
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

    <button type="submit">Simpan Artikel</button>
    <a href="{{ route('posts.index') }}">Batal</a>
</form>
@endsection
```[cite: 4, 5]