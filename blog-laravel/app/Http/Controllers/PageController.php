<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Review;
use Illuminate\Http\Request;

class PageController
{
    public function index()
    {
        $pages = Page::all();
        return view('pages/index', compact('pages'));
    }

    public function show($id)
    {
        $reviews = Review::all();
        $page = Page::find($id);
        return view('pages/show', compact('page', 'reviews'));

    }

    public function addReview(Request $request, $id)
    {
        $request->validate([
            'description' => [
                'required',
                'min:10'
            ],
        ]);
        $page = Page::find($id);
        $review = new Review();
        $review->name = $request->input('name');
        $review->description = $request->input('description');
        $page->reviews()->save($review);

        return redirect()->route('page.show', ['id' => $page->id]);
    }
}
