@extends('layouts.app')

@section('content')

<h1>ブログ一覧</h1>

<ul>
  @foreach($blogs as $blog)
  <li><a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a> {{ $blog->user->name }} 
        ({{ $blog->comments_count }}件のコメント) <small>{{ $blog->updated_at }}</small></li>
  @endforeach
</ul>

@endsection