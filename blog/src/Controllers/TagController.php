<?php

namespace web\Controllers;

use Illuminate\Http\RedirectResponse;
use web\Models\Tag;
use Illuminate\Validation\Rule;

class TagController
{
    public function index()
    {
        $tags = Tag::all();
        return view('tag/index', compact('tags'));
    }

    public function trash()
    {
        $tags = Tag::onlyTrashed()->get();
        return view('tag/trash', compact('tags'));
    }

    public function restore($id)
    {
        Tag::withTrashed()
            ->where('id', $id)
            ->restore();
        return new RedirectResponse('/tag');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tag/show', compact('tag'));
    }

    public function create()
    {
        $tag = new Tag();
        $isCreate = true;
        return view('tag/form', compact('tag', 'isCreate'));
    }

    public function store()
    {
        $data = request()->all();

        $validator = validator()->make($data, [
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

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }

        $tag = new Tag();
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $tag->save();
        $_SESSION['success'] = 'Record successfully added';
        return new RedirectResponse('/tag');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $isCreate = false;
        return view('tag/form', compact('tag', 'isCreate'));
    }

    public function update()
    {
        $data = request()->all();

        $tag = Tag::find($data['id']);
        $tag->title = $data['title'];
        $tag->slug = $data['slug'];
        $validator = validator()->make($data, [
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

        if ($validator->fails()) {
            $_SESSION['errors'] = $validator->errors()->toArray();
            $_SESSION['data'] = $data;
            return new RedirectResponse($_SERVER['HTTP_REFERER']);
        }
        $tag->save();
        $_SESSION['success'] = 'Record successfully updated';
        return new RedirectResponse('/tag');

    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $_SESSION['success'] = 'Record successfully deleted';
        return new RedirectResponse('/tag');
    }

    public function forceDelete($id)
    {
        $tag = Tag::find($id);
        $tag->forceDelete();
        $_SESSION['success'] = 'Record successfully deleted';
        return new RedirectResponse('/tag');
    }
}
