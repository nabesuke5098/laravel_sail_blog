<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブログ</title>
  <link type="text/css" rel="stylesheet" href="/css/style.css">

</head>
<body>

  <nav>
    <ul>
      <li><a href="/">TOP</a></li>

      @auth
        <li><a href="/mypage">マイブログ一覧</a></li>
        <li>
          <form method="post" action="/mypage/logout">
            @csrf
            <input type="submit" value="ログアウト">
          </form>
        </li>
      @else
        <li><a href="{{ route(('login')) }}">ログイン</a></li>
      @endauth
    </ul>
  </nav>

@yield('content')

</body>
</html>