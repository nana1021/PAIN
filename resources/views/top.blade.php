<!DOCTYPE html>
<html lang="ja">  
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>パンを焼く</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
        <script src="https://kit.fontawesome.com/0462175492.js" crossorigin="anonymous"></script>
</head>
   <body>
    <div class="site-overlay"></div>
      <header id="home">
        <div class="container-fluid">
          <div id="app">
            <nav class="navbar navbar-expand-md navbar-laravel">
                <div class="container">
                  <i class="fas fa-bread-slice fa-2x"></i>
                    <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                        {{ config('app.name', 'パンを焼く') }}
                    </a>
                    <div class="nav-link">
                      @guest
                        <a href="{{ action('Admin\RecipeController@index') }}">ルセット一覧</a>
                      @else
                        <a href="{{ action('Admin\RecipeController@index', ['user_id' => Auth::user()->id]) }}">ルセット一覧</a>
                      @endguest
                        <a href="/admin/recipe/create">ルセット作成</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                        {{-- ログインしていなかったらログイン画面へのリンクを表示 --}}
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
            <div class="container">
                <div class="jumbotron">
                    <h6 class="display-4 mb-0">Enjoy RECETTE Management!</h6>
                    <h1 class="display-1 mb-0"><strong>パンを焼く</strong></h1>
                    <h4 class="mb-5">楽しくルセット管理</h4>
                    <p class="lead">初めての方はユーザー登録してください。<br>
                        登録されてる方はログインしてからご利用ください。</p>
                    <p>
                        <a class="btn btn-light btn-lg btn-sm" href="/login" role="button"> ログイン </a>
                        <a target="_blank" href="/register" class="btn btn-lg btn-light btn-sm" role="button">ユーザー登録</a>
                    </p>
                    <button class="btn btn-success btn-sm">
　　                 <a href="/login/guest" class="btn btn-light btn-sm">ゲストログイン</a>
                     </button>
                </div>
            </div>
        </div>
      </header>
  </body>
</html>