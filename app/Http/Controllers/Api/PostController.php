<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'categories'])->latest()->get();
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        $post->load(['user', 'categories']);
        return new PostResource($post);
    }


    public function create()
    {
        return view('posts.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['required', 'string'],
        'categories' => ['sometimes', 'array'],
        'categories.*' => ['integer', 'exists:categories,id'],
    ]);

    $categoryIds = $validated['categories'] ?? [];
    unset($validated['categories']);

    $post = $request->user()->posts()->create($validated);

    if (!empty($categoryIds)) {
        $post->categories()->sync($categoryIds);
    }

    $post->load(['user', 'categories']);
    
    return new PostResource($post)
        ->response()
        ->setStatusCode(201);
}
public function update(Request $request, Post $post)
{
    Gate::authorize('update', $post);
    $validated = $request->validate([
        'title' => ['sometimes', 'required', 'string', 'max:255'],
        'content' => ['sometimes', 'required', 'string'],
        'categories' => ['sometimes', 'array'],
        'categories.*' => ['integer', 'exists:categories,id'],
    ]);
    if (array_key_exists('categories', $validated)) {
        $post->categories()->sync($validated['categories']);
        unset($validated['categories']);
    }
    $post->update($validated);
    $post->load(['user', 'categories']);
    return new PostResource($post);
}
public function edit(Post $post) { $categories = Category::orderBy('name')->get(); $selectedCategories = $post->categories() ->pluck('categories.id') ->all(); return view( 'posts.edit', compact('post', 'categories', 'selectedCategories') ); } 

public function destroy(Post $post)
{
    Gate::authorize('delete', $post);
    $post->delete();
    return response()->json([
        'message' => 'Post berhasil dihapus.',
    ], 200);
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