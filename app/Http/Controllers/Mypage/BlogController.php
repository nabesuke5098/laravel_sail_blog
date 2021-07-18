<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogSaveRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('JpJsonResponse');
    }

    public function index(Request $request)
    {
        // $blogs = Blog::where('user_id', Auth::id())->get();
        $blogs = $request->user()->blogs;
        return view('mypage.index', compact('blogs'));
    }

    public function create()
    {
        return view('mypage.blog.create');
    }

    public function store(BlogSaveRequest $request)
    {
        $data = $request->proceed();

        $blog = $request->user()->blogs()->create($data);

        return redirect(route('mypage.blog.edit', $blog))->with('message', '新規登録しました');
    }

    public function edit(Blog $blog, Request $request)
    {
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }
        // abort_if($request->user()->isNot($blog->user), 403);
        $data = old() ?: $blog;
        // dd(data_get($data, 'body'));

        return view('mypage.blog.edit', compact('blog', 'data'));
    }

    public function update(Blog $blog, BlogSaveRequest $request)
    {
        if ($request->user()->isNot($blog->user)) {
            abort(403);
        }

        $data = $request->proceed();

        $blog->update($data);

        return redirect(route('mypage.blog.update', $blog))->with('message', '更新しました');
    }

    public function destroy(Blog $blog, Request $request)
    {
        abort_if($request->user()->isNot($blog->user), 403);

        // $blog->comments()->delete();
        // 画像と付属するコメントはイベントで削除 Models/Blog

        $blog->delete();

        return redirect('mypage');
    }
}
