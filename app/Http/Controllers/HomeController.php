<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')
            ->withCount('comments')
            ->onlyOpen()
            ->orderByDesc('comments_count')
            ->latest('updated_at')
            ->get();

        // return $blogs;

        return view('home', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        // $blog = Blog::first();
        // $blog->body = ['a', 'b'];
        // $blog->save();
        // return $blog->body->implode('-');
        // return 'OK';
        abort_unless($blog->is_open, 403);
        return view('blog.show', compact('blog'));
    }
}
