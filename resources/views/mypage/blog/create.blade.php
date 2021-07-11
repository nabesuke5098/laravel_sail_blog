@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
function ajaxSubmit(form) {
  axios.post('/mypage/blogs/create', 
    new FormData(form)
  )
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });

  return false;
}
</script>

<h1>マイブログ新規登録</h1>

<form method="post" enctype="mltipart/form-data" onsubmit="return ajaxSubmit(this)">
<!-- <form method="post" enctype="multipart/form-data"> -->
@csrf

@include('inc.error')

@include('inc.message')

タイトル：<input type="text" name="title" style="width: 400px" value="{{ old('title') }}">
<br>
本文：<textarea name="body" style="width: 600px; height: 200px;">{{ old('body') }}</textarea>
<br>
公開する：<label><input type="checkbox" name="is_open" value="1" {{ old('is_open') ? 'checked' : '' }}>公開する</label>

<br><br>
<input type="submit" value="送信する">

</form>

@endsection