<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  @stack('css')
</head>

<body>

  <div class="header" id="header">
    <div class="header__logo" id="header__logo">
      <div class="header__menu" id="header__menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </div>
      <h1 class="header__title" id="header__title">Rese</h1>
    </div>

    <div class="header__nav" id="header__nav">
      @auth
      <ul>
        <li><a href="/">Home</a></li>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <li><a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit()">Logout</a></li>
        </form>
        <li><a href="/mypage">Mypage</a></li>
        @can('storemanager')
        <li><a href="/storemanager">店舗代表者</a></li>
        @endcan
        @can('administor')
        <li><a href="/administor">管理者画面</a></li>
        @endcan
      </ul>
      @else
      <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/register">Registration</a></li>
        <li><a href="/login">Login</a></li>
      </ul>
      @endauth
    </div>
  </div>

  <div class="content">
    @yield('content')
  </div>

  <script src=" {{ asset('js/header.js') }}"></script>
</body>

</html>