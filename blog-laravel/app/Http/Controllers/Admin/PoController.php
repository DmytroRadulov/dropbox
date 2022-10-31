<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PoController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category', 'tags', 'user'])->paginate(5);
        return view('admin/post/index', compact('posts'));
    }

    public function show($id)
    {
        $reviews = Review::all();
        $post = Post::find($id);
        return view('admin/post/show', compact('post', 'reviews'));

    }

    public function addReview(Request $request, $id)
    {
        $request->validate([
            'description' => [
                'required',
                'min:10'
            ],
        ]);
        $post = Post::find($id);
        $review = new Review();
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $post->reviews()->save($review);

        return redirect()->route('admin.posts.show', ['id' => $post->id]);
    }


    public function create()
    {
        $this->authorize('create', Post::class);
        $post = new Post();
        $isCreate = true;
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin/post/form', compact('post', 'categories', 'tags', 'users', 'isCreate'));

    }

    public function store(Request $request)
    {
        if (!$request->user()->can('store', Post::class)) {
            abort(403);
        }
        $request->validate([
            'title' => [
                'required',
                'unique:posts,title',
                'min:5',
            ],
            'body' => ['required',
                'min:4',
                'unique:posts,body',],
            'category_id' => ['exists:categories,id'],
            'user_id' => ['exists:users,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);

        $post = Post::create($request->all());
        $post->tags()->attach($request->input('tags'));
        return redirect()->route('admin.posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $isCreate = false;
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.post/form', compact('post', 'categories', 'tags', 'users', 'isCreate'));
    }

    public function update(Request $request)
    {
        $post = Post::find($request->input('id'));
        $request->validate([
            'title' => [
                'required',
                'min:5',
                Rule::unique('posts', 'title')->ignore($post->id),
            ],
            'body' => ['required',
                'min:4',
                Rule::unique('posts', 'body')->ignore($post->id),],
            'category_id' => ['exists:categories,id'],
            'user_id' => ['exists:users,id'],
            'tags' => ['required', 'exists:tags,id'],
        ]);
        $post->update($request->all());
        $post->tags()->sync($request->input('tags'));
        return redirect()->route('admin.posts');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts');
    }
}
