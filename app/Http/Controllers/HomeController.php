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
            ->orderByDesc('comments_count')
            ->latest('updated_at')
            ->get();

        // return $blogs;

        return view('home', compact('blogs'));
    }
}
