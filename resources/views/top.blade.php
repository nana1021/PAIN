<!DOCTYPE html>
<html lang="ja">  
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>パンを焼く</title>
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        <link href="{{ secure_asset('css/admin.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('css/top.css') }}" rel="stylesheet">
</head>
   <body>
    <div class="site-overlay"></div>
      <header id="home">
        <div class="container-fluid">
          <div id="app">
            <nav class="navbar navbar-expand-md navbar-laravel">
                <div class="container">
                    <a class="navbar-brand mr-auto" href="{{ url('/') }}">
                        {{ config('app.name', 'パンを焼く') }}
                    </a>
                    <div class="nav-link">
                      @guest
                        <a href="{{ action('Admin\RecipeController@index') }}">ルセット検索</a>
                      @else
                        <a href="{{ action('Admin\RecipeController@index', ['user_id' => Auth::user()->id]) }}">ルセット検索</a>
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
                        <a class="btn btn-primary btn-lg" href="/login" role="button"> ログイン </a>
                        <a target="_blank" href="/register" class="btn btn-lg btn-warning" role="button">ユーザー登録</a>
                    </p>
                </div>
            </div>
        </div>
      </header>
  </body>
</html>
{{--    
<body class="pushy-active"><div style="position:fixed;top:0px;left:0px;width:0;height:0;" id="scrollzipPoint"></div>
    <!-- Pushy Menu -->
    <nav class="pushy pushy-open">
        <ul class="list-unstyled">
            <li><a href="#home">Home</a></li>
            <li><a href="#feat">Features</a></li>
            <li><a href="#about">About me</a></li>
            <li><a href="#news">My Blog</a></li>
            <li><a href="#history">My History</a></li>
            <li><a href="#photos">Look my Photos</a></li>
            <li><a href="#contact">Get in Touch!</a></li>
            <li><a href="http://www.themeinthebox.com/ourtheme/mountain-king-bootstrap-template/" target="_blank">Download</a></li>
        </ul>
    </nav>

    <!-- Site Overlay -->
    <div class="site-overlay"></div>

    <header id="home">
        <div class="container-fluid">
            <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
            <div class="container">
                <div class="row">
                    <div class="col-8 col-sm-6">
                        <a href="#" class="logo">
                            <img src="images/your_logo.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-4 col-sm-6 text-end">
                        <div class="menu-btn"><span class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></span></div>
                    </div>
                </div>
                <div class="jumbotron">
                    <h3 class="display-4 mb-0">In the hall of the</h3>
                    <h1 class="display-1 mb-0"><strong>Mountain King</strong></h1>
                    <h4 class="mb-5">Bootstrap 5.0.0 Beta-1</h4>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for<br>
                        calling extra attention to featured content or information.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        <a target="_blank" href="http://www.themeinthebox.com/ourtheme/mountain-king-bootstrap-template/" class="btn btn-lg btn-danger" role="button">Download</a>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section id="feat">-->
        <div class="container">
            <div class="row features justify-content-center">
                <div class="col-sm-6 col-md-4 text-center wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <span class="typcn typcn-pencil x3"></span>
                    <h4>Consectetur Risus</h4>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
                <div class="col-sm-6 col-md-4 text-center wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <span class="typcn typcn-camera-outline x3"></span>
                    <h4>Ultricies Aenean</h4>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
                <div class="col-sm-6 col-md-4 text-center wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                    <span class="typcn typcn-bookmark x3"></span>
                    <h4>Cras Sollicitudin</h4>
                    <p>Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas faucibus mollis interdum.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="number wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
        <!-- change the image in style.css to the class .number .container-fluid [approximately row 102] -->
        <div class="container-fluid">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-10 col-lg-6 opaline">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3>Ligula Mattis Ornare Ultricies</h3>
                                <h5>Pellentesque Cursus Amet Parturient Etiam</h5>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                        <div class="row text-center">
                            <!-- set the numbers in assets/js/scripts.js  -->
                            <div class="col-sm-6 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <div class="boxes">
                                    <h5>Cities</h5>
                                    <h3 class="numscroller roller-title-number-1 scrollzip isShown" data-min="1" data-max="278" data-delay="5" data-increment="3" data-slno="1">278</h3>
                                </div>
                            </div>
                            <div class="col-sm-6 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                <div class="boxes">
                                    <h5>Kilometres</h5>
                                    <h3 class="numscroller roller-title-number-2 scrollzip isShown" data-min="0" data-max="512702" data-delay="22" data-increment="2083" data-slno="2">512702</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="news" class="blog wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec sed odio dui. Curabitur blandit tempus porttitor. Nullam id dolor id nibh ultricies vehicula ut id elit. Etiam porta sem malesuada magna mollis euismod.</p>
                    <p>Donec id elit non mi porta gravida at eget metus. Donec id elit non mi porta gravida at eget metus. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nulla vitae elit libero, a pharetra augue.</p>
                    <a class="btn btn-danger btn-lg mb-5" href="#">Take a Look <i class="fa fa-arrow-circle-o-right"></i> </a>
                </div>
                <div class="col-sm-12 col-md-5">
                    <a href="#">
                        <img src="https://unsplash.it/1200/1200?image=839" alt="" class="img-fluid">
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="history" class="story wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
        <!-- change the image in style.css to the class .story .container-fluid [approximately row 141] -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-6 opaline">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="lead"><i>Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</i></p>
                                <p><i>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</i></p>
                                <h6 class="lead"> – Fermentum Dapibus</h6>
                                <p><small>Nibh Etiam Risus Bibendum<br>
                                        Nullam id dolor id nibh ultricies vehicula ut id elit.</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="photos" class="gallery wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12 text-center">
                    <div class="btn-group filter-button-group text-center" role="group" aria-label="filter">
                        <button class="btn btn-link" data-filter="">ALL</button>
                        <button class="btn btn-link" data-filter=".landscape">LANDSCAPE</button>
                        <button class="btn btn-link" data-filter=".equipment">EQUIPMENT</button>
                        <button class="btn btn-link" data-filter=".travel">TRAVEL</button>
                        <button class="btn btn-link" data-filter=".sunset">SUNSET</button>
                        <button class="btn btn-link" data-filter=".music">MUSIC</button>
                    </div>
                </div>
            </div>

            <div class="masonry image-gallery" style="position: relative; width: 1294.65px; height: 1356.59px;">
                <div class="grid-sizer" style="position: absolute; left: 0px; top: 0px;"></div>
                <div class="gutter-sizer" style="position: absolute; left: 431.55px; top: 0px;"></div>
                <div class="item item-width2 music" style="position: absolute; left: 0%; top: 0px;">
                    <a href="https://unsplash.it/1000/600?image=529">
                        <img src="https://unsplash.it/600/300?image=529" alt="">
                    </a>
                </div>
                <div class="item landscape travel" style="position: absolute; left: 66.599%; top: 0px;">
                    <a href="https://unsplash.it/1000/600?image=523">
                        <img src="https://unsplash.it/320/776?image=523" alt="">
                    </a>
                </div>
                <div class="item travel" style="position: absolute; left: 0%; top: 446px;">
                    <a href="https://unsplash.it/600/1000?image=503">
                        <img src="https://unsplash.it/500/800?image=503" alt="">
                    </a>
                </div>
                <div class="item sunset landscape travel" style="position: absolute; left: 33.2995%; top: 446px;">
                    <a href="https://unsplash.it/1000/600?image=505">
                        <img src="https://unsplash.it/400/400?image=505" alt="">
                    </a>
                </div>
                <div class="item equipment travel" style="position: absolute; left: 33.2995%; top: 877.112px;">
                    <a href="https://unsplash.it/800/800?image=454">
                        <img src="https://unsplash.it/4403/2476?image=454" alt="">
                    </a>
                </div>
                <div class="item landscape" style="position: absolute; left: 66.599%; top: 1003.01px;">
                    <a href="https://unsplash.it/800/800?image=515">
                        <img src="https://unsplash.it/585/444?image=515" alt="">
                    </a>
                </div>
                <div class="item item-width2 travel sunset" style="position: absolute; left: 0%; top: 1132.58px;">
                    <a href="https://unsplash.it/1000/600?image=451">
                        <img src="https://unsplash.it/600/140?image=451" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="clients wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="images/logo-sample-01.jpg" class="img-fluid">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="images/logo-sample-02.jpg" class="img-fluid">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="images/logo-sample-03.png" class="img-fluid">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="images/logo-sample-04.jpg" class="img-fluid">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="images/logo-sample-05.jpg" class="img-fluid">
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <img src="images/logo-sample-06.png" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="prefooter wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
        <!-- change the image in style.css to the class .prefooter .container-fluid [approximately row 154] -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <h3>Maecenas sed diam eget risus varius<br> blandit sit amet non magna.</h3>
                        <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Cras mattis consectetur purus sit amet fermentum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control" placeholder="Your Email Here...">
                                <br>
                                <button type="button" class="btn btn-danger">Submit Newsletter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h3>Your Logo</h3>
                    <p>© 2016 Your Company. Designed and Developed by <a target="_blank" href="http://www.themeinthebox.com">ThemeintheBox.com</a></p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <p class="text-md-end social">
                        <a href="https://www.facebook.com/ThemeInTheBox/" target="_blank"><i class="typcn typcn-social-facebook-circular"></i></a>
                        <a href="https://twitter.com/ThemeintheBox" target="_blank"><i class="typcn typcn-social-twitter-circular"></i></a>
                        <i class="typcn typcn-social-tumbler-circular"></i>
                        <i class="typcn typcn-social-github-circular"></i>
                        <i class="typcn typcn-social-dribbble-circular"></i>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
	<div id="test-popup" class="white-popup text-center mfp-hide">
		<img class="img-fluid" src="mountain-king-bootstrap-free-html-template-580x435.jpg" alt="mountain-king-bootstrap-free-html-template-580x435">
		<h1 class=""><small>Now available with</small><br>Bootstrap 5.0.0</h1>
		<a class="btn btn-dark" href="https://www.themeinthebox.com/product/mountain-king-premium-license/">Find out more</a>
	</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script><script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <script src="assets/js/pushy.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/numscroller-1.0.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <script src="popup.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-113563761-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-113563761-1');
	</script>






</body>   
    
    
    
{{--<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>パンを焼く</title>

    <!-- Bootstrap 5.0.0 beta-1 core CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
    <link href="popup.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700,100" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,700,900,500" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/typicons.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/pushy.css">
    <link rel="stylesheet" href="assets/css/masonry.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

</head>
<body><div style="position:fixed;top:0px;left:0px;width:0;height:0;" id="scrollzipPoint"></div>
    <!-- Pushy Menu -->
    <nav class="pushy pushy-left">
        <ul class="list-unstyled">
            <li><a href="#home">Home</a></li>
            <li><a href="#feat">Features</a></li>
            <li><a href="#about">About me</a></li>
            <li><a href="#news">My Blog</a></li>
            <li><a href="#history">My History</a></li>
            <li><a href="#photos">Look my Photos</a></li>
            <li><a href="#contact">Get in Touch!</a></li>
            <li><a href="http://www.themeinthebox.com/ourtheme/mountain-king-bootstrap-template/" target="_blank">Download</a></li>
        </ul>
    </nav>

    <!-- Site Overlay -->
    <div class="site-overlay"></div>

    <header id="home">
        <div class="container-fluid">
            <!-- change the image in style.css to the class header .container-fluid [approximately row 50] -->
            <div class="container">
                <div class="row">
                    <div class="col-8 col-sm-6">
                        <a href="#" class="logo">
                            <img src="" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-4 col-sm-6 text-end">
                        <div class="menu-btn"><span class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></span></div>
                    </div>
                </div>
                <div class="jumbotron">
                    <h3 class="display-4 mb-0">In the hall of the</h3>
                    <h1 class="display-1 mb-0"><strong>パンを焼く</strong></h1>
                    <h4 class="mb-5">Bootstrap 5.0.0 Beta-1</h4>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for<br>
                        calling extra attention to featured content or information.</p>
                    <p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                        <a target="_blank" href="http://www.themeinthebox.com/ourtheme/mountain-king-bootstrap-template/" class="btn btn-lg btn-danger" role="button">Download</a>
                    </p>
                </div>
            </div>
        </div>
    </header>

    <section id="feat">
        <div class="container">
            <div class="row features justify-content-center">
                <div class="col-sm-6 col-md-4 text-center wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <span class="typcn typcn-pencil x3"></span>
                    <h4>Consectetur Risus</h4>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                </div>
                <div class="col-sm-6 col-md-4 text-center wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <span class="typcn typcn-camera-outline x3"></span>
                    <h4>Ultricies Aenean</h4>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Donec ullamcorper nulla non metus auctor fringilla.</p>
                </div>
                <div class="col-sm-6 col-md-4 text-center wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                    <span class="typcn typcn-bookmark x3"></span>
                    <h4>Cras Sollicitudin</h4>
                    <p>Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Maecenas faucibus mollis interdum.</p>
                </div>
            </div>
        </div>
    </section>
   

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <h3>Your Logo</h3>
                    <p>© 2016 Your Company. Designed and Developed by <a target="_blank" href="http://www.themeinthebox.com">ThemeintheBox.com</a></p>
                </div>
                <div class="col-sm-12 col-md-4">
                    <p class="text-md-end social">
                        <a href="https://www.facebook.com/ThemeInTheBox/" target="_blank"><i class="typcn typcn-social-facebook-circular"></i></a>
                        <a href="https://twitter.com/ThemeintheBox" target="_blank"><i class="typcn typcn-social-twitter-circular"></i></a>
                        <i class="typcn typcn-social-tumbler-circular"></i>
                        <i class="typcn typcn-social-github-circular"></i>
                        <i class="typcn typcn-social-dribbble-circular"></i>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
	<div id="test-popup" class="white-popup text-center mfp-hide">
		<img class="img-fluid" src="../images/baguettes-gce4470054_1920.jpg" alt="mountain-king-bootstrap-free-html-template-580x435">
		<h1 class=""><small>Now available with</small><br>Bootstrap 5.0.0</h1>
		<a class="btn btn-dark" href="https://www.themeinthebox.com/product/mountain-king-premium-license/">Find out more</a>
	</div>
   
</body>
</html>












    
{{--
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>パンを焼く</title>

  <meta name="description" content="A playful and open source Bootstrap theme.">

  
  <link rel="stylesheet" href="/bootstrap-themes/demo/theme-machine/bubblegum/css/bootstrap4-bubblegum.min.css">
  
  <link rel="stylesheet" href="/bootstrap-themes/demo/css/styles.css?cache=94616">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  
  <link href="https://fonts.googleapis.com/css?family=Chicle|Open+Sans" rel="stylesheet">
  
  <form>
  @csrf
  <body class="ht-body">
<div class="ht-tm-navbar bg-light text-white navbar-dark">
  <div class="container">
      <nav class="ht-tm-nav">
        @guest
        <a href="{{ action('Admin\RecipeController@index') }}">ルセット検索</a>
        @else
        <a href="{{ action('Admin\RecipeController@index', ['user_id' => Auth::user()->id]) }}">ルセット検索</a>
        @endguest
        <a href="/admin/recipe/create" class="text-decoration-none text-danger">　　ルセット作成</a>
      </nav>
    </div>
  </div>
</div>
<div class="ht-main">
<div id="ht-tm-jumbotron">
  <div class="jumbotron bg-danger text-white mb-0 radius-0 ht-tm-jumbotron">
    <div class="container">
      <div class="ht-tm-header">
        <h1 class="display-1 text-light">パンを焼く</h1>
        <span class="lead text-light">RECETTE管理</span>
        <div class="mt-4">
          <a href="/login" class="btn btn-light btn-lg my-2 mr-2 btn-wide text-danger js-ht-download-link" data-type="theme" data-id="86">ログイン</a>
          <a href="/register" class="btn btn-light btn-lg my-2 mr-2 btn-wide text-danger js-ht-download-link" data-type="theme" data-id="86">ユーザー登録</a>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
</html>
--}}