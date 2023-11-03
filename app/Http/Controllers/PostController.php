<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post_view')->only(['index', 'show']);
        $this->middleware('permission:post_create')->only(['create', 'store']);
        $this->middleware('permission:post_update')->only(['edit', 'update']);
        $this->middleware('permission:post_delete')->only('destroy');
    }

    public function index()
    {

        /** @var User $user */
        $user = auth()->user();
        $posts = Post::when(!$user->hasRoles(['Super Admin', 'Admin']), function ($query) use ($user) {
            $query->where('user_id', '=', $user->id);
        })->paginate(10);

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->whereHas('roles', function($q) {
            $q->where('name', '=', 'Author');
        })->get();

        return view('posts.create', [
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        Post::query()->create($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $users = User::query()->whereHas('roles', function($q) {
            $q->where('name', '=', 'Author');
        })->get();

        $post = Post::query()->findOrFail($id);

        $this->authorize('update', $post);

        return view('posts.edit', [
            'post' => $post,
            'users' => $users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($data);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete ', $post);
        $post->delete();
        return back();
    }
}
