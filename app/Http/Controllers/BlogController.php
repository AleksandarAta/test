<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        abort_if(Gate::denies('edit_blogs'), 403);

        $blogs = Blog::all();

        return view('blogs.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(Gate::denies('edit_blogs'), 403);

        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('edit_blogs'), 403);

        return view('blogs.view', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function upload(Request $request)
    {
        abort_if(Gate::denies('edit_blogs'), 403);

        $image_path = request()->file('file')->store('images');

        return response()->json([
            'location' => url($image_path)
        ]);
    }
    public function list()
    {
        $blogs = Blog::where('published', true)->get();

        return view('blogs.list', ['blogs' => $blogs]);
    }

    public function list_blog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();


        return view('blogs.blog_list', ['blog' => $blog]);
    }
}
