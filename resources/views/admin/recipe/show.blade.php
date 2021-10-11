<!DOCTYPE html>
<html lang="ja">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ルセット詳細く</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/show.css') }}" rel="stylesheet">
        <link href="src: url('../fonts/Corporate-Logo.ttf')" />
        <script src="https://kit.fontawesome.com/0462175492.js" crossorigin="anonymous"></script>
</head>
<header id="global-head">
<i class="fas fa-bread-slice fa-lg"></i>
    <h1 id="brand-logo">パンを焼く</h1>
</header>
 
<aside id="sidebar">
    <nav id="global-nav">
        <ul>
            <li class="sub-menu"><ul class="sub-menu-nav"></ul>
            <li><a href="/">Home</a></li>
            <li><a href="{{ action('Admin\RecipeController@index', ['user_id' => Auth::user()->id]) }}">ルセット一覧</a></li>
            <li><a href="/admin/recipe/create">ルセット作成</a></li>
            <li><a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">ルセット編集</a></li>
        </ul>
            <div class="log-btn">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
</aside>

<div class="container-fluid">
<body>
    <div class="row">
    <div class=product-box>
        <div class="details">
			<div><a href="{{ action('Admin\RecipeController@edit', ['id' => $recipe->id]) }}">edit</a></div>	
		</div>     
  <div class="wrapper">
    <div class="product-img">
      @if ($recipe->image_path)
        <img src="{{ asset('storage/image/' . $recipe->image_path) }}">
      @endif
    </div>
    <div class="product-info">
      <div class="product-text">
          <div class="product_title">
            <h1>{{ str_limit($recipe->title, 150) }}</h1>
        </div>
        <div class="category_name">
            <h2>カテゴリー : {{ str_limit($recipe->category_name, 150) }}</h2>
        </div>
        <h5>材料</h5>
        <p class="product_text" class="text-prewrap">{{ str_limit($recipe->material, 1000) }}</p>
      </div>
    </div>
  </div>
  </div>
  <bside>
<div class="side-box">
    <h3 id="box-title"><i class="fas fa-clipboard-list"></i> Notes</h3>
    <p class="text-prewrap">{{ str_limit($recipe->memo, 1000) }}</p>
    </div>
</bside>
</div>
 <div class="card">
     <h3>作り方</h3>
    <p class="text-prewrap">{{ str_limit($recipe->body, 1000) }}</p>
</div>

</body>


</div>













{{--    <div class="container">    
    <ul class="cards">
  <li class="cards__item">
    <div class="card">
        <div class="image col-md-6 text-right mt-4">
                                @if ($recipe->image_path)
                                    <img src="{{ asset('storage/image/' . $recipe->image_path) }}"class="rounded">
                                @endif
                           </div>
      
      <div class="card__content">
          <div class="category_name">
            <h5>カテゴリー : {{ str_limit($recipe->category_name, 150) }}</h5>
          </div>
        <div class="card__title">
            <h1>{{ str_limit($recipe->title, 150) }}</h1>
        </div>
        <h3>材料</h3>
        <p class="card__text" class="text-prewrap">{{ str_limit($recipe->material, 500) }}</p>
        <h3>作り方</h3>
        <p class="card__text" class="text-prewrap">{{ str_limit($recipe->body, 500) }}</p>
        <a type="button" href="{{ action('Admin\RecipeController@index', ['user_id' => Auth::user()->id]) }}" class="btn py-1" role="button">一覧に戻る</a>
      </div>
    </div>
  </li>
    </div>
  </li>
</ul>--}}
    
    
    
    
       {{-- <div class="row">
            <div class=box-show>
            <div class="col-md-12 mx-auto">
                <div class="category_name">
                    <h5>カテゴリー : {{ str_limit($recipe->category_name, 150) }}</h5>
                   <div class="text-right col-md-5">
                    <a href="{{ action('Admin\RecipeController@index', ['user_id' => Auth::user()->id]) }}">＜ 一覧に戻る</a>
                   </div>
                </div>
                <div class="title">
                    <h1>{{ str_limit($recipe->title, 150) }}</h1>
                </div>  
 <hr color="#c0c0c0">
    <div class="row">
        <div class="recipes col-md-10 mx-auto">
            <div class="recipe">
                <div class="row">
                    <div class="text col-md-8">
                           <div class="image col-md-6 text-right mt-4">
                                @if ($recipe->image_path)
                                    <img src="{{ asset('storage/image/' . $recipe->image_path) }}"class="rounded">
                                @endif
                           </div>
                        <table border="1">
                        <tr class="body mt-5">
                        <th>材料</th>
                        <td class="text-prewrap">{{ str_limit($recipe->material, 500) }}</td>
                        </table>
                        <table border="1">
                        <tr class="body mt-5">
                        <th>作り方</th>
                        <td class="text-prewrap">{{ str_limit($recipe->body, 500) }}</td>
                        </tr>
                        </table>
                    </div>   
                </div>
            </div> 
        </div>
    </div>--}}
</html>
