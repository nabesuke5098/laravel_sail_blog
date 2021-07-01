@extends('layouts.app')

@section('content')

<h1>ユーザー登録</h1>

<form method="post">
@csrf

@include('inc.error')

名前：<input type="text" name="name" value="{{ old('name') }}">
<br>
メールアドレス：<input type="text" name="email" value="{{ old('email') }}">
<br>
パスワード：<input type="password" name="password">

<x-pref />

<br><br>
<input type="submit" value="送信">

</form>

@endsection