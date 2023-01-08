<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class TaController
{
    public function index()
    {
        $tags = Tag::with(['posts'])->paginate(5);
        return view('admin/tag/index', compact('tags'));
    }

    public function create()
    {
        $tag = new Tag();
        $isCreate = true;
        return view('admin/tag/form', compact('tag', 'isCreate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'unique:tags,title',
                'min:4',
                'max:8',
            ],
            'slug' => [
                'required',
                'unique:tags,slug',
                'min:3',
                'max:6',
            ]
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $isCreate = false;
        return view('admin/tag/form', compact('tag', 'isCreate'));
    }

    public function update(Request $request)
    {
        $tag = Tag::find($request->input('id'));

        $request->validate([
            'title' => [
                'required',
                'min:4',
                'max:8',
                Rule::unique('tags', 'title',)->ignore($tag->id),
            ],
            'slug' => ['required',
                'min:3',
                'max:6',
                Rule::unique('tags', 'slug',)->ignore($tag->id),
            ],
            'post_id' => ['exists:posts,id'],
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags');
    }
}
