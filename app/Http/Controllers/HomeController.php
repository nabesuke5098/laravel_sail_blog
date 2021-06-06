<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->get();

        return view('home', compact('blogs'));
    }
}
