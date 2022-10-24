<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class CatController
{
    public function index()
    {
        $categories = Category::paginate(6);
        return view('admin/category/index', compact('categories'));
    }

    public function create()
    {
        $category = new Category();
        $isCreate = true;
        return view('admin/category/form', compact('category', 'isCreate'));
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

        Category::create($request->all());
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $isCreate = false;
        return view('admin/category/form', compact('category', 'isCreate'));
    }

    public function update(Request $request)
    {
        $category = Category::find($request->input('id'));
        $request->validate([
            'title' => [
                'required',
                'min:3',
                'max:10',
                Rule::unique('categories', 'title',)->ignore($category->id),
            ],
            'slug' => ['required',
                'min:2',
                'max:8',
                Rule::unique('categories', 'slug',)->ignore($category->id),
            ],
            'post_id' => ['exists:posts,id'],
        ]);
        $category->update($request->all());
        return redirect()->route('admin.categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories');
    }
}
