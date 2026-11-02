<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([ 'title' => ['required', 'string', 'max:255'], 
        'content' => ['required', 'string'], 
        'categories' => ['sometimes', 'array'], 
        'categories.*' => [ 'integer', 
        'distinct', 
        'exists:categories,id', 
        ], 
        ]); 
        $post = new Post(); 
        $post->title = $validated['title']; 
        $post->content = $validated['content']; 
        $post->user_id = $request->user()->id; $post->save(); 
        $post->categories()->sync( $validated['categories'] ?? [] ); 
        return redirect()->route('posts.index') ->with('success', 'Artikel berhasil dibuat.'); 
    }
public function edit(Post $post) { $categories = Category::orderBy('name')->get(); $selectedCategories = $post->categories() ->pluck('categories.id') ->all(); return view( 'posts.edit', compact('post', 'categories', 'selectedCategories') ); } 
public function destroy(Request $request, Post $post): RedirectResponse
{
    $this->authorizePost($request, $post);

    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Artikel berhasil dihapus.');
}

private function authorizePost(Request $request, Post $post): void
{
    $user = $request->user();

    abort_unless(
        $user->role === 'admin' || (int) $post->user_id === (int) $user->id,
        403,
        'Kamu tidak memiliki akses ke artikel ini.'
    );
}
}